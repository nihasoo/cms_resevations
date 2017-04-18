@extends('...layouts.app')

@section('header_title')
All Event Types
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
      All Event Types
    </div>
    <div class="table-responsive">
      <table ui-jp="dataTable" ui-options="{
          sAjaxSource: '{{ url('alleventsjson') }}',
          aoColumns: [
            { mRender: function(data, type, val){
                return '<a href={{ url('eventdetail') }}/'+val.id+' class=>'+val.type+'</a>';
            }},
            { mData: 'description' },
            { mRender: function(data, type, val){
                return '<a href=\'{{ url('deleteevent') }}/'+val.id+'\' class=\'delete-event\' data-title=\'Delete Event\' data-content=\'Are you sure you want to delete this Event? Related Records may delete\' onClick=\'onDelete(this); return false;\'><i class=\'mdi-action-delete i-32\' style=\'color: red;\'></i></a>';
            }}
          ]
        }" class="table table-striped b-t b-b">
        <thead>
          <tr>
            <th  style="width:20%">Type</th>
            <th  style="width:25%">Description</th>
            <th  style="width:25%"></th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <div class="panel-footer">
      <a href="{{ URL::previous() }}" class="btn btn-warning m-t">Back</a>
      <a href="{{ url('newEvent') }}" class="btn btn-info m-t">New Event Type</a>
    </div>
  </div>

@endsection