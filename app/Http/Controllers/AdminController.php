<?php

namespace App\Http\Controllers;

use App\Event;
use App\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use App\Http\Requests;

class AdminController extends Controller
{
    /**
     * Show the All Resources.
     *
     * @return Response
     */
    public function allResources()
    {
        if (Auth::user()->is_admin) {
            return view('admin.allResources');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Show the All Resources JSON.
     *
     * @return Response
     */
    public function allResourcesJSON()
    {
        if (Auth::user()->is_admin) {
            $resources = Resource::all();

            $response = array(
                'aaData' => $resources,
                'iTotalRecords' => count($resources),
                'iTotalDisplayRecords' => count($resources)
            );

            return $response;
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
    /**
     * Show the All Events.
     *
     * @return Response
     */
    public function allEvents()
    {
        if (Auth::user()->is_admin) {
            return view('admin.allEvents');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Show the All Event JSON.
     *
     * @return Response
     */
    public function allEventsJSON()
    {
        if (Auth::user()->is_admin) {
            $event = Event::all();

            $response = array(
                'aaData' => $event,
                'iTotalRecords' => count($event),
                'iTotalDisplayRecords' => count($event)
            );

            return $response;
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Show the Get New Event.
     *
     * @return Response
     */
    public function getNewEvent()
    {
        if (Auth::user()->is_admin) {
            return view('admin.newEvent');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Show the Get Event Detail.
     *
     * @return Response
     */
    public function getEventDetail($id)
    {
        if (Auth::user()->is_admin) {
            $event = Event::find($id);
            return view('admin.eventDetail',compact('event'));
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Show the get New Resource.
     *
     * @return Response
     */
    public function getNewResource()
    {
        if (Auth::user()->is_admin) {
            return view('admin.newResource');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Show the get New Resource.
     *
     * @return Response
     */
    public function getResourcedetail($id)
    {
        if (Auth::user()->is_admin) {
            $resource = Resource::find($id);
            return view('admin.resourceDetail',compact('resource'));
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * post Edit Resource.
     *
     * @return Response
     */
    public function postEditResource(Request $request)
    {
        if (Auth::user()->is_admin) {
            $this->validate($request, [
                'name' => 'required',
                'location' => 'required',
            ]);

            $rid =  $request->input('resource_id');
            $name =  $request->input('name');
            $location =  $request->input('location');

            try{
                $resource = Resource::find($rid);

                if($resource != null){
                    $resource->name = $name;
                    $resource->location = $location;
                    $resource->update();
                }
                Flash::message('Resource updated!');
                return redirect('resourcedetail/'.$rid);
            } catch (Exception $ex){
                Flash::error('Error: '.$ex->getMessage());
            }
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Create a New Resource.
     *
     *
     * @return User
     */
    protected function postNewResource(Request $request)
    {
        if(Auth::user()->is_admin)
        {
            $this->validate($request, [
                'name' => 'required',
                'location' => 'required',
            ]);

            $resource = Resource::create([
                'name' => $request->input('name'),
                'location' => $request->input('location'),
            ]);
            //var_dump($user);

            Flash::message('Resource created!');

            return redirect()->action('AdminController@allResources');
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Create a New Event.
     *
     *
     * @return User
     */
    protected function postNewEvent(Request $request)
    {
        if(Auth::user()->is_admin)
        {
            $this->validate($request, [
                'type' => 'required',
                'description' => 'required',
            ]);

            $event = Event::create([
                'type' => $request->input('type'),
                'description' => $request->input('description'),
            ]);
            //var_dump($user);

            Flash::message('Event created!');

            return redirect()->action('AdminController@allEvents');
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * post Edit Event.
     *
     * @return Response
     */
    public function postEditEvent(Request $request)
    {
        if (Auth::user()->is_admin) {
            $this->validate($request, [
                'type' => 'required',
                'description' => 'required',
            ]);

            $eid =  $request->input('event_id');
            $type =  $request->input('type');
            $description =  $request->input('description');
            try{
                $event = Event::find($eid);

                if($event != null){
                    $event->type = $type;
                    $event->description = $description;
                    $event->update();
                }
                Flash::message('Event updated!');
                return redirect('eventdetail/'.$eid);
            } catch (Exception $ex){
                Flash::error('Error: '.$ex->getMessage());
            }
        } else {
            abort(403, 'Unauthorized action.');
        }
    }


    /**
     * Delete Resource
     */
    public function deleteResource($id)
    {
        if(Auth::user()->is_admin)
        {
            $resource = Resource::findOrFail($id);
            $resource->delete();

            Flash::message('Resource and related records deleted!');
            return redirect()->action('AdminController@allResources');
        }else {
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Delete Event
     */
    public function deleteEvent($id)
    {
        if(Auth::user()->is_admin)
        {
            $event = Event::findOrFail($id);
            $event->delete();

            Flash::message('Event and related records deleted!');
            return redirect()->action('AdminController@allEvents');
        }else {
            abort(403, 'Unauthorized action.');
        }
    }
}
