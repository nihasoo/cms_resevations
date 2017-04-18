<?php

namespace App\Http\Controllers;

use App\Dto\ReservationDto;
use App\Event;
use App\Reservation;
use App\Resource;
use App\User;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use Google_Client;
use Google_Service_Calendar;

class ReservationController extends Controller
{
    /**
     * Show the All Events.
     *
     * @return Response
     */
    public function allReservations()
    {
        return view('reservations.allReservations');
    }

    /**
     * Show the All Events.
     *
     * @return Response
     */
    public function allUpcomingReservations()
    {
        return view('reservations.allUpcomingReservations');
    }


    public function getAllReservationsJson(){
        $reservations = Reservation::orderBy('event_date', 'asc')->get();

        $reservationDTOLst = array();

        foreach($reservations as $reservation ){
            array_push($reservationDTOLst, new ReservationDto($reservation));
        }

        $response = array(
            'aaData' => $reservationDTOLst,
            'iTotalRecords' => count($reservationDTOLst),
            'iTotalDisplayRecords' => count($reservationDTOLst)
        );

        return $response;
    }

    public function getAllUpcomingReservationsJson(){
        $reservations = Reservation::where('event_date', '>=', Carbon::today()->toDateString())->get();

        $reservationDTOLst = array();

        foreach($reservations as $reservation ){
            array_push($reservationDTOLst, new ReservationDto($reservation));
        }

        $response = array(
            'aaData' => $reservationDTOLst,
            'iTotalRecords' => count($reservationDTOLst),
            'iTotalDisplayRecords' => count($reservationDTOLst)
        );

        return $response;
    }

    public function getMyUpcomingReservationsJson(){
        $reservations = Auth::user()->reservations()->where('event_date', '>=', Carbon::today()->toDateString())->orderBy('event_date', 'desc')->get();

        $reservationDTOLst = array();

        foreach($reservations as $reservation ){
            array_push($reservationDTOLst, new ReservationDto($reservation));
        }

        $response = array(
            'aaData' => $reservationDTOLst,
            'iTotalRecords' => count($reservationDTOLst),
            'iTotalDisplayRecords' => count($reservationDTOLst)
        );

        return $response;
    }

    /**
     * Show the get New Event.
     *
     * @return Response
     */
    public function getNewReservation()
    {
        $events = Event::all();
        $resources = Resource::all();
        $allUsers = User::all();

        return view('reservations.newReservation',compact('events','resources','allUsers'));
    }

    /**
     * Show the All my Events.
     *
     * @return Response
     */
    public function myReservations()
    {
        return view('reservations.myUpcomingReservations');
    }

    /**
     * Delete Reservation
     */
    public function deleteReservation($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        Flash::message('Reservation and related records deleted!');
        return redirect()->action('EventController@allReservations');
    }

    /**
     * Show the Reservation Detail.
     *
     * @return Response
     */
    public function getReservationDetail($id)
    {
        $reservation = Reservation::findOrFail($id);

        return view('reservations.reservationDetail', compact('reservation'));
    }

    /**
     * Post New Reservation.
     *
     * @return Response
     */
    public function postNewReservation(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'resource' => 'required',
            'event' => 'required',
            'eventDate' => 'required',
            'startTime' => 'required',
            'endTime' => 'required',
        ]);

        // TODO Check availability
        $resource = $request->input('resource');
        $event = $request->input('event');
        $eventDate = $request->input('eventDate');
        $startTime = $request->input('startTime');
        $endTime = $request->input('endTime');
        $description = $request->input('description');
        $title = $request->input('title');
        //dd($request->input('informTo'));

        if(ReservationController::checkAvailability($resource, $eventDate, $startTime , $endTime)){
            try{
                $reservation = new Reservation([
                    'title' => $title,
                    'reserve_date' => Carbon::today(),
                    'event_date' => $eventDate,
                    'start_time' => $startTime,
                    'end_time' => $endTime,
                    'description' => $description,
                    'status' => 'Reserve',
                ]);

                $resource = Resource::FindOrFail($resource);
                $event = Event::FindOrFail($event);

                $reservation->resource()->associate($resource);
                $reservation->event()->associate($event);
                $reservation->user()->associate(Auth::user());
                $reservation->save();
                $user = Auth::user();
                $ccList = $request->input('informTo');

                Mail::send('email.reservation',['userName' => Auth::user()->name, 'title' => $reservation->title,
                    'resource' => $resource->name, 'event' => $event->type,
                    'eventDate' => $reservation->event_date , 'eventStartTime' => $reservation->start_time,
                    'eventEndTime'=> $reservation->end_time, 'description'=> $reservation->description,
                    'reservedOn' => $reservation->reserve_date ], function($message) use ($user,$ccList) {
                    $message->to( $user->email, $user->name)
                        ->subject('Verify your email address');
                    if($ccList != null && !$ccList->isEmpty()){
                        $message->cc($ccList);
                    }
                });

                Flash::message('Reservation added Successfully ');

                return redirect()->action('ReservationController@myReservations');
            } catch (Exception $ex){
                Flash::error('Error: '.$ex->getMessage());
            }
        } else {
            Flash::error('Selected resource is already reserve for given time frame!');
            $events = Event::all();
            $resources = Resource::all();
            $allUsers = User::all();

            return view('reservations.newReservation',compact('events','resources','reservation','allUsers'));
        }
    }

    public static function checkAvailability($resource, $eventDate, $startTime , $endTime){
        $reservation = Reservation::whereDate('event_date', '=', $eventDate)
                       ->whereBetween('start_time', array($startTime, $endTime))
                       ->whereBetween('end_time', array($startTime, $endTime))
                       ->whereHas('resource', function ($query) use ($resource, $eventDate, $startTime , $endTime){
                            $query->where('id', '=', $resource );
                       })->get();

        /*dd($reservation);*/
        return $reservation->isEmpty();
    }

    public static function checkOtherAvailability($id, $resource, $eventDate, $startTime , $endTime){
        $reservation = Reservation::whereDate('event_date', '=', $eventDate)
            ->where('id', '!=', $id)
            ->whereBetween('start_time', array($startTime, $endTime))
            ->whereBetween('end_time', array($startTime, $endTime))
            ->whereHas('resource', function ($query) use ($resource, $eventDate, $startTime , $endTime){
                $query->where('id', '=', $resource );
            })->get();

        /*dd($reservation);*/
        return $reservation->isEmpty();
    }

    /**
     * Show the get Edit Reservation.
     *
     * @return Response
     */
    public function getEditReservation($id)
    {
        $events = Event::all();
        $resources = Resource::all();
        $reservation = Reservation::findorFail($id);

        return view('reservations.editReservation',compact('events','resources','reservation'));
    }

    /**
     * Post Edit Reservation.
     *
     * @return Response
     */
    public function postEditReservation(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'resource' => 'required',
            'event' => 'required',
            'eventDate' => 'required',
            'startTime' => 'required',
            'endTime' => 'required',
        ]);

        // TODO Check availability
        $id = $request->input('reservation_id');
        $resource = $request->input('resource');
        $event = $request->input('event');
        $eventDate = $request->input('eventDate');
        $startTime = $request->input('startTime');
        $endTime = $request->input('endTime');
        $description = $request->input('description');
        $title = $request->input('title');

        if(ReservationController::checkOtherAvailability($id, $resource, $eventDate, $startTime , $endTime)){
            try{

                $reservation = Reservation::findOrFail($id);
                if($reservation != null){
                    $reservation->title = $title;
                    $reservation->reserve_date = Carbon::today();
                    $reservation->event_date = $eventDate;
                    $reservation->start_time = $startTime;
                    $reservation->end_time = $endTime;
                    $reservation->description = $description;
                    $reservation->status = 'Reserve';


                    $resource = Resource::FindOrFail($resource);
                    $event = Event::FindOrFail($event);

                    $reservation->resource()->associate($resource);
                    $reservation->event()->associate($event);
                    $reservation->user()->associate(Auth::user());
                    $reservation->update();

                    $user = Auth::user();

                    Mail::send('email.reservation',['userName' => Auth::user()->name, 'title' => $reservation->title,
                        'resource' => $resource->name, 'event' => $event->type,
                        'eventDate' => $reservation->event_date , 'eventStartTime' => $reservation->start_time,
                        'eventEndTime'=> $reservation->end_time, 'description'=> $reservation->description,
                        'reservedOn' => $reservation->reserve_date ], function($message) use ($user) {
                        $message->to( $user->email, $user->name)
                            ->subject('Verify your email address');
                    });

                    Flash::message('Reservation added Successfully ');
                }


                return redirect()->action('ReservationController@myReservations');
            } catch (Exception $ex){
                Flash::error('Error: '.$ex->getMessage());
            }
        } else {
            Flash::error('Selected resource is already reserve for given time frame!');
            $events = Event::all();
            $resources = Resource::all();

            return view('reservations.newReservation',compact('events','resources','reservation'));
        }
    }

    public function test()
    {
        //dd('test');
        $calendarId = 'cms.lk_v19v8gls7k3931ehvc0mjds664@group.calendar.google.com';

        /*$client = new Google_Client();

        // $credentialsJson should contain the path to the json file downloaded from the API site
        $credentials = $client->loadServiceAccountJson(
            'app/client_secret.json',
            'https://www.googleapis.com/auth/calendar'
        );
        $client->setAssertionCredentials($credentials);
        */

        $client = new Google_Client();
        $client->setApplicationName("cms-reservation");
        $client->setAuthConfig("F:\\PHP_Projects\\reservation\\app\\CMS-reservation-c700738bbae7.json");
        //$client->setScopes(array("https://www.googleapis.com/auth/calendar"));
        $client->setScopes(array(Google_Service_Calendar::CALENDAR));
        $client->setSubject("apps@cms.lk");

        $service = new Google_Service_Calendar($client);

        // $calendarId should contain the calendar id found on the settings page of the calendar
        $events = $service->events->listEvents($calendarId);

        dd($events);
    }
}
