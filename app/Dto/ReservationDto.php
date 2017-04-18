<?php
/**
 * Created by PhpStorm.
 * User: wishwa
 * Date: 5/11/2016
 * Time: 4:55 PM
 */

namespace App\Dto;

class ReservationDto {
    public $id;
    public $title;
    public $resource;
    public $event;
    public $reserveDate;
    public $eventDate;
    public $startTime;
    public $endTime;

    public function __construct($reservation)
    {
        $this->id = $reservation->id;
        $this->title = $reservation->title;
        $this->resource = $reservation->resource()->first()->name;
        $this->event = $reservation->event()->first()->type;
        $this->reserveDate = $reservation->reserve_date;
        $this->eventDate = $reservation->event_date;
        $this->startTime = $reservation->start_time;
        $this->endTime = $reservation->end_time;
    }
} 