@extends('...layouts.app')

@section('header_title')
Edit Reservation
@endsection

@section('content')
<div class="box-row">
    <div class="box-cell">
        <div class="box-inner padding">
            <div class="padding-out">
              <div class="p-h-md p-v bg-white box-shadow pos-rlt">
                <h3 class="no-margin">Edit Reservation</h3>
              </div>
              <div class="box">
              <div class="col-md-9 b-l bg-white bg-auto">
                  @if (count($errors) > 0)
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

                  <div class="p-md bg-light lt b-b font-bold">Please fill the following form to edit Reservation</div>
                  <form role="form" class="p-md col-md-6" action="{{ url('editreservation') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="reservation_id" value="{{$reservation->id}}">
                    <div class="form-group">
                        <label>Title <span style="color: red; ">*</span></label>
                        <input type="text" class="form-control" name="title" value="{{Input::old('title') != ''? Input::old('title') : $reservation->title }}" required>
                    </div>
                    <div class="form-group">
                        <label>Resource/Venue <span style="color: red; ">*</span></label>
                        <select class="form-control" name="resource" required>
                            <option value="">Select Resource/Venue</option>
                            @foreach ($resources as $resource)
                                <option value="{{ $resource->id }}" @if(Input::old('role') || $reservation->resource->id == $resource->id) selected @endif>{{ $resource->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Type <span style="color: red; ">*</span></label>
                        <select class="form-control" name="event" required>
                            <option value="">Select Event Type</option>
                            @foreach ($events as $event)
                                <option value="{{ $event->id }}" @if(Input::old('role')|| $reservation->event->id == $event->id) selected @endif>{{ $event->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Date <span style="color: red; ">*</span></label>
                        <input type="text" class="form-control" name="eventDate" id="newEventDate" value="{{Input::old('eventDate')!= ''? Input::old('newEventDate') : $reservation->event_date}}" required>
                    </div>
                    <div class="form-group">
                        <label>Start Time <span style="color: red; ">*</span></label>
                        <input type="text" class="form-control" name="startTime" id="newEventStartTime" value="{{Input::old('startTime') != '' ? Input::old('newEventDate') : $reservation->start_time}}" required>
                    </div>
                    <div class="form-group">
                        <label>End Time <span style="color: red; ">*</span></label>
                        <input type="text" class="form-control" name="endTime" id="newEventEndTime" value="{{Input::old('endTime') != '' ?  Input::old('endTime') : $reservation-> end_time}}" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="5" name="description">{{Input::old('description') != '' ? Input::old('description') : $reservation->description}}</textarea>
                    </div>
                    <a href="{{ URL::previous() }}" class="btn btn-warning m-t">Back</a>
                    <button type="submit" class="btn btn-info m-t">Save</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection