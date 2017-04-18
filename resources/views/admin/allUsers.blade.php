@extends('...layouts.app')

@section('header_title')
All Users
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
      All Users
    </div>
    <div class="table-responsive">
      <table ui-jp="dataTable" ui-options="{
          sAjaxSource: '{{ url('allusersjson') }}',
          aoColumns: [
            { mRender: function(data, type, val){
                return '<a href={{ url('userdetail') }}/'+val.id+' class=>'+val.name+'</a>';
            }},
            { mData: 'email' },
            { mData: 'phone' },
            { mData: 'mobile' },
            { mRender: function(data, type, val){
                return '<label class=ui-switch m-t-xs m-r><input type=checkbox name=is_admin @if('+val.is_admin+') checked @endif disabled readonly><i></i></label>';
            }}
          ]
        }" class="table table-striped b-t b-b">
        <thead>
          <tr>
            <th  style="width:20%">User Name</th>
            <th  style="width:25%">Email</th>
            <th  style="width:25%">Phone</th>
            <th  style="width:15%">Mobile</th>
            <th  style="width:15%">Admin</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <div class="panel-footer">
      <a href="{{ URL::previous() }}" class="btn btn-warning m-t">Back</a>
    </div>
  </div>

@endsection