@extends('...layouts.app')

@section('header_title')
All Resources
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
      All Resources
    </div>
    <div class="table-responsive">
      <table ui-jp="dataTable" ui-options="{
          sAjaxSource: '{{ url('allresourcesjson') }}',
          aoColumns: [
            { mRender: function(data, type, val){
                return '<a href={{ url('resourcedetail') }}/'+val.id+' class=>'+val.name+'</a>';
            }},
            { mData: 'location' },
            { mRender: function(data, type, val){
                return '<a href=\'{{ url('deleteresource') }}/'+val.id+'\' class=\'delete-event\' data-title=\'Delete Resource\' data-content=\'Are you sure you want to delete this Resource?Related Records may delete\' onClick=\'onDelete(this); return false;\'><i class=\'mdi-action-delete i-32\' style=\'color: red;\'></i></a>';
            }}
          ]
        }" class="table table-striped b-t b-b">
        <thead>
          <tr>
            <th  style="width:20%">Name</th>
            <th  style="width:25%">Location</th>
            <th  style="width:25%"></th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <div class="panel-footer">
      <a href="{{ URL::previous() }}" class="btn btn-warning m-t">Back</a>
      <a href="{{ url('newResource') }}" class="btn btn-info m-t">New Resource</a>
    </div>
  </div>

@endsection