@extends('...layouts.app')

@section('header_title')
Add New Reservation
@endsection

@section('content')
    <style>
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            border: 1px solid #888;
            width: 50%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
            from {top:-300px; opacity:0}
            to {top:0; opacity:1}
        }

        @keyframes animatetop {
            from {top:-300px; opacity:0}
            to {top:0; opacity:1}
        }

        /* The Close Button */
        .close {
            color: white;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-header {
            padding: 2px 16px;
            background-color: #5cb85c;
            color: white;
        }

        .modal-body {padding: 2px 16px;}

        .modal-footer {
            padding: 2px 16px;
            background-color: #5cb85c;
            color: white;
        }
    </style>
<div class="box-row">
    <div class="box-cell">
        <div class="box-inner padding">
            <div class="padding-out">
              <div class="p-h-md p-v bg-white box-shadow pos-rlt">
                <h3 class="no-margin">New Reservation</h3>
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

                  <div class="p-md bg-light lt b-b font-bold">Please fill the following form to add a New Reservation</div>
                  <form role="form" class="p-md col-md-6" action="{{ url('newReservation') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Title <span style="color: red; ">*</span></label>
                        <input type="text" class="form-control" name="title" value="{{Input::old('title') != ''? Input::old('title') : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label>Resource/Venue <span style="color: red; ">*</span></label>
                        <select class="form-control" name="resource" required>
                            <option value="">Select Resource/Venue</option>
                            @foreach ($resources as $resource)
                                <option value="{{ $resource->id }}" @if(Input::old('role') == $resource->id) selected @endif>{{ $resource->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Type <span style="color: red; ">*</span></label>
                        <select class="form-control" name="event" required>
                            <option value="">Select Event Type</option>
                            @foreach ($events as $event)
                                <option value="{{ $event->id }}" @if(Input::old('role') == $event->id) selected @endif>{{ $event->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Date <span style="color: red; ">*</span></label>
                        <input type="text" class="form-control" name="eventDate" id="newEventDate" value="{{Input::old('newEventDate')}}" required>
                    </div>
                    <div class="form-group">
                        <label>Start Time <span style="color: red; ">*</span></label>
                        <input type="text" class="form-control" name="startTime" id="newEventStartTime" value="{{Input::old('newEventDate')}}" required>
                    </div>
                    <div class="form-group">
                        <label>End Time <span style="color: red; ">*</span></label>
                        <input type="text" class="form-control" name="endTime" id="newEventEndTime" value="{{Input::old('newEventDate')}}" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="5" name="description">{{Input::old('description')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Inform To</label>
                        <select multiple class="form-control" name="informTo[]">
                            @foreach($allUsers as $user)
                                <option value="{{$user->email}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                      {{--<div class="form-group">
                          <label class="col-sm-2 control-label">Repeat</label>
                          <div class="col-sm-10">
                              <label class="ui-switch ui-switch-md bg-info m-t-xs">
                                  <input type="checkbox" name="repeat" id="repeatChk">
                                  <i></i>
                              </label>
                          </div>
                      </div>--}}
                    <a href="{{ URL::previous() }}" class="btn btn-warning m-t">Back</a>
                    <button type="submit" class="btn btn-info m-t">Save</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>


<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">×</span>
            <h2>Repeat</h2>
        </div>
        <div class="modal-body">
            <form role="form" class="" action="" method="post" enctype="">
                <div class="form-group">
                    <label>Repeats</label>
                    <select class="form-control" name="resource">
                        <option value="Daily">Daily</option>
                        <option value="Weekly">Weekly</option>
                        <option value="Monthly">Monthly</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Repeat every</label>
                        <div style="clear: both;">
                        <select class="form-control" name="resource" style="width: 50%; text-align: right; clear: both; float:left; margin-right:15px;">
                            @for($i=1; $i<31;$i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        <label style="">Days</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Start on<span style="color: red; ">*</span></label>
                    <input type="text" class="form-control" name="eventDate" id="newEventDate" value="{{Input::old('newEventDate')}}" required>
                </div>
                <div class="form-group">
                    <label>Ends <span style="color: red; ">*</span></label>
                    <input type="text" class="form-control" name="eventDate" id="newEventDate" value="{{Input::old('newEventDate')}}" required>
                </div>
                <div class="form-group">
                    <label>Summary</label>
                    <label>Summary</label>
                </div>
                <div class="form-group">
                    <label>Inform To</label>
                    <select multiple class="form-control" name="informTo[]">
                        @foreach($allUsers as $user)
                            <option value="{{$user->email}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <a href="{{ URL::previous() }}" class="btn btn-warning m-t">Back</a>
            <button type="submit" class="btn btn-info m-t">Save</button>
        </div>
    </div>

</div>


<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("repeatChk");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
@endsection