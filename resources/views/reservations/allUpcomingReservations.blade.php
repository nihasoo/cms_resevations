@extends('...layouts.app')

@section('header_title')
All Upcoming Reservations
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
      All Upcoming Reservations
    </div>
    <div class="table-responsive">
      <table ui-jp="dataTable" ui-options="{
          sAjaxSource: '{{ url('allUpcomingReservationsJson') }}',
          aaSorting: [[ 4, 'asc' ]],
          aoColumns: [
            { mRender: function(data, type, val){
                return '<a href={{ url('reservationdetail') }}/'+val.id+' class=>'+val.title+'</a>';
            }},
            { mData: 'resource' },
            { mData: 'event' },
            { mData: 'reserveDate' },
            { mData: 'eventDate' },
            { mData: 'startTime' },
            { mData: 'endTime' },
            { mRender: function(data, type, val){
                return '<a href=\'{{ url('deletereservation') }}/'+val.id+'\' class=\'delete-event\' data-title=\'Delete Reservation\' data-content=\'Are you sure you want to delete this Reservation? Related Records may delete\' onClick=\'onDelete(this); return false;\'><i class=\'mdi-action-delete i-32\' style=\'color: red;\'></i></a>';
            }}
          ]
        }" class="table table-striped b-t b-b">
        <thead>
          <tr>
            <th  style="width:20%">Title</th>
            <th  style="width:15%">Resource</th>
            <th  style="width:15%">Event</th>
            <th  style="width:10%">Reserve Date</th>
            <th  style="width:10%">Event Date</th>
            <th  style="width:10%">Start Time</th>
            <th  style="width:10%">End Time</th>
            <th  style="width:10%"></th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <div class="panel-footer">
      <a href="{{ URL::previous() }}" class="btn btn-warning m-t">Back</a>
      <a href="{{ url('newReservation') }}" class="btn btn-info m-t">New Reservation</a>
    </div>
  </div>

@endsection