@extends('...layouts.app')

@section('header_title')
Edit User
@endsection

@section('content')
<div class="box-row">
    <div class="box-cell">
        <div class="box-inner padding">
            <div class="padding-out">
              <div class="p-h-md p-v bg-white box-shadow pos-rlt">
                <h3 class="no-margin">Edit User</h3>
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
                  <div class="p-md bg-light lt b-b font-bold">Please Edit User Infor and Save</div>
                  <form role="form" class="p-md col-md-6" action="{{ url('edituser') }}" method="post">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" name="name" value="{{Input::old('name') != '' ? Input::old('name') : $user->name }}">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{Input::old('phone') != '' ? Input::old('phone') : $user->phone }}">
                    </div>
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" class="form-control" name="mobile" value="{{Input::old('mobile') != '' ? Input::old('mobile') : $user->mobile }}">
                    </div>
                    <div class="form-group">
                        <label>Admin&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <label class="ui-switch m-t-xs m-r">
                            <input type="checkbox" name="is_admin" @if($user->is_admin) checked @else disabled readonly @endif>
                            <i></i>
                        </label>
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