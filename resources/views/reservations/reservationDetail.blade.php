@extends('...layouts.app')

@section('header_title')
{{ $reservation->title }}
@endsection

@section('content')
<div class="box-row">
    <div class="box-cell">
        <div class="box-inner padding">
            <div class="col-sm-12">
                <div class="panel panel-card clearfix">
                  <div class="p-h b-b b-light">
                    <ul class="nav nav-lines nav-md b-info">
                      <li class="active"><a href>Details</a></li>
                    </ul>
                  </div>
                  <div class="p-h-lg m-b-lg">
                    <div class="streamline b-l p-v m-l-xs">
                        <div class="sl-item b-success">
                            <div class="sl-content">
                              <div class="text-muted-dk">Title</div>
                              <p>{{ $reservation->title }}</p>
                            </div>
                        </div>
                    <div class="sl-item b-info">
                      <div class="sl-content">
                        <div class="text-muted-dk">Description</div>
                        <p>{{ $reservation->description }}</p>
                      </div>
                    </div>
                    <div class="sl-item b-info">
                      <div class="sl-content">
                        <div class="text-muted-dk">Resource</div>
                        <p>{{ $reservation->resource()->first()->name }}</p>
                      </div>
                    </div>
                    <div class="sl-item b-success">
                      <div class="sl-content">
                        <div class="text-muted-dk">Event</div>
                        <p>{{ $reservation->event()->first()->type}}</p>
                      </div>
                    </div>
                    <div class="sl-item b-info">
                      <div class="sl-content">
                        <div class="text-muted-dk">Reserve Date</div>
                        <p>{{ $reservation->reserve_date}}</p>
                      </div>
                    </div>
                    <div class="sl-item b-info">
                      <div class="sl-content">
                        <div class="text-muted-dk">Event Date</div>
                        <p>{{ $reservation->event_date}}</p>
                      </div>
                    </div>
                    <div class="sl-item b-info">
                      <div class="sl-content">
                        <div class="text-muted-dk">Start Time</div>
                        <p>{{ $reservation->start_time}}</p>
                      </div>
                    </div>
                    <div class="sl-item b-info">
                      <div class="sl-content">
                        <div class="text-muted-dk">End Time</div>
                        <p>{{ $reservation->end_time}}</p>
                      </div>
                    </div>
                    <div class="sl-item b-info">
                      <div class="sl-content">
                        <div class="text-muted-dk">Status</div>
                        <p>{{ $reservation->Status}}</p>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
             </div>
             <div class="panel-footer">
                <a href="{{ URL::previous() }}" class="btn btn-warning m-t">Back</a>
                <a href="{{ url('editreservation/'.$reservation->id) }}" class="btn btn-info m-t">Edit</a>
             </div>
          </div>



          </div>
        </div>
      </div>
    </div>
  </div>

@endsection