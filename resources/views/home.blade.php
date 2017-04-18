@extends('layouts.app')


@section('refreshMeta')
<meta http-equiv="refresh" content="30" />
@endsection

@section('header_title')
Dashboard
@endsection

@section('content')
<div class="box-row">
        <div class="box-cell">
            <div class="box-inner padding">
                <div class="row">
                    <div class="col-lg-9 col-md-6 col-sm-6">
                        <div class="row no-gutter">
                            <div class="col-xs-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row" ng-controller="ChartCtrl">
                                            <div class="">
                                              {{--<div id="calendar"></div>--}}

                                                <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=cms.lk_v19v8gls7k3931ehvc0mjds664%40group.calendar.google.com&amp;color=%2342104A&amp;ctz=Asia%2FColombo" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
                                        <div class="p-md">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="text-center">
                                </div>
                                <div class="p-md">

                            </div>
                        </div>
                    </div>
                </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-4">
      <div class="card">
        <div class="card-heading">
          <h2>My Upcoming Events</h2>
          <small></small>
        </div>
        <div class="card-body">
          <div class="streamline b-l b-warning m-b" style="border-left: 1px solid #4caf50">
            <div class="sl-item b-warning">
              <div class="sl-content b-warning">
                <div class="text-muted-dk">{{--\Carbon\Carbon::createFromTimeStamp(strtotime($job->date))->diffForHumans() --}} two hours</div>
                <p><a href="{{url('interviewdetails/')}}" class="text-warning">10</a> to <a href="{{url('candidatedetail/')}}" class="text-info">145</a>.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
          </div>
        </div>
      </div>
    </div>
@endsection
