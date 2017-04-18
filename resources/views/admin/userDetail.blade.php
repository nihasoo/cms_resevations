@extends('...layouts.app')

@section('header_title')
{{ $user->name }}
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
                              <div class="text-muted-dk">Name</div>
                              <p>{{ $user->name }}</p>
                            </div>
                        </div>
                    <div class="sl-item b-info">
                      <div class="sl-content">
                        <div class="text-muted-dk">Email</div>
                        <p>{{ $user->email }}</p>
                      </div>
                    </div>
                    <div class="sl-item b-success">
                      <div class="sl-content">
                        <div class="text-muted-dk">Phone</div>
                        <p>{{ $user->phone}}</p>
                      </div>
                    </div>
                    <div class="sl-item b-info">
                      <div class="sl-content">
                        <div class="text-muted-dk">Mobile</div>
                        <p>{{ $user->mobile}}</p>
                      </div>
                    </div>
                    <div class="sl-item b-success">
                      <div class="sl-content">
                        <div class="text-muted-dk">Admin</div>
                        <p>
                            <label class="ui-switch m-t-xs m-r">
                                <input type="checkbox" name="is_admin" @if($user->is_admin) checked @endif disabled readonly>
                                <i></i>
                            </label>
                        </p>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
             </div>
             <div class="panel-footer">
                <a href="{{ URL::previous() }}" class="btn btn-warning m-t">Back</a>
                <a href="{{ url('edituser/'.$user->id) }}" class="btn btn-info m-t">Edit</a>
             </div>
          </div>



          </div>
        </div>
      </div>
    </div>
  </div>

@endsection