@extends('...layouts.app')

@section('header_title')
Add New Event
@endsection

@section('content')
<div class="box-row">
    <div class="box-cell">
        <div class="box-inner padding">
            <div class="padding-out">
              <div class="p-h-md p-v bg-white box-shadow pos-rlt">
                <h3 class="no-margin">New Event</h3>
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

                  <div class="p-md bg-light lt b-b font-bold">Please fill the following form to add a New Event Type</div>
                  <form role="form" class="p-md col-md-6" action="{{ url('newEvent') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Event Type</label>
                        <input type="text" class="form-control" name="type" value="{{Input::old('type')}}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" value="{{Input::old('description')}}">
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