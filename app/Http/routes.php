<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

/*Admin Routes */
Route::group(['middleware' => 'auth'], function () {
    //Route::auth();

    /*User Routes*/
    Route::get('/allUsers', 'UsersController@allUsers');
    Route::get('/allusersjson', 'UsersController@allUsersJSON');
    Route::get('/userdetail/{id}', 'UsersController@getUserDetail');
    Route::get('/edituser/{id}', 'UsersController@getEditUser');
    Route::post('/edituser/', 'UsersController@postEditUser');


    /*Resources Routes*/
    Route::get('/allResources', 'AdminController@allResources');
    Route::get('/newResource', 'AdminController@getNewResource');
    Route::post('/addnewresource', 'AdminController@postNewResource');
    Route::get('/allresourcesjson', 'AdminController@allResourcesJSON');
    Route::get('/resourcedetail/{id}', 'AdminController@getResourcedetail');
    Route::post('/editresource', 'AdminController@postEditResource');
    Route::get('/deleteresource/{id}', 'AdminController@deleteResource');

    /*Event Routes*/
    Route::get('/allEvents', 'AdminController@allEvents');
    Route::get('/alleventsjson', 'AdminController@allEventsJSON');
    Route::get('/newEvent', 'AdminController@getNewEvent');
    Route::post('/newEvent', 'AdminController@postNewEvent');
    Route::get('/eventdetail/{id}', 'AdminController@getEventDetail');
    Route::post('/editevent', 'AdminController@postEditEvent');
    Route::get('/deleteevent/{id}', 'AdminController@deleteEvent');

    /*Reservation Routes*/
    Route::get('/allReservations', 'ReservationController@allReservations');
    Route::get('/allReservationsJson', 'ReservationController@getAllReservationsJson');
    Route::get('/allUpcomingReservations', 'ReservationController@allUpcomingReservations');
    Route::get('/allUpcomingReservationsJson', 'ReservationController@getAllUpcomingReservationsJson');
    Route::get('/myUpcomingReservations', 'ReservationController@myReservations');
    Route::get('/myUpcomingReservationsJson', 'ReservationController@getMyUpcomingReservationsJson');
    Route::get('/newReservation', 'ReservationController@getNewReservation');
    Route::get('/deletereservation/{id}', 'ReservationController@deleteReservation');
    Route::get('/reservationdetail/{id}', 'ReservationController@getReservationDetail');
    Route::post('/newReservation', 'ReservationController@postNewReservation');
    Route::get('/editreservation/{id}', 'ReservationController@getEditReservation');
    Route::post('/editreservation', 'ReservationController@postEditReservation');

    Route::get('/test/', 'ReservationController@test');
});

/*Reservation Routes * /
Route::group(['middleware' => 'web'], function () {
    Route::auth();

    /*Reservation Routes* /
    Route::get('/allReservations', 'EventController@allReservations');
    Route::get('/allReservationsJson', 'EventController@getAllReservationsJson');
    Route::get('/myUpcomingReservations', 'EventController@myReservations');
    Route::get('/newReservation', 'EventController@getNewReservation');
    Route::get('/deletereservation/{id}', 'EventController@deleteReservation');
}); */
