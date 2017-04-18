<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>CMS Reservation</title>
  @yield('refreshMeta')
  <meta name="keywords" content="CMS, CMS.lk, vacancy, vacancies, jobs, Sri Lanka, Colombo, Kandy, careers, software, engineers, java, php, salesforce.com, .net, software engineers, senior software engineers, hiring, content, images, image, solutions, business intelligence, database, administrator, database administrator, system administrator, Content Management Solutions" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="{{ URL::asset('libs/assets/animate.css/animate.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('libs/assets/font-awesome/css/font-awesome.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('libs/jquery/waves/dist/waves.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('styles/material-design-icons.css') }}" type="text/css" />

  <link rel="stylesheet" href="{{ URL::asset('/libs/jquery/bootstrap/dist/css/bootstrap.css') }}" type="text/css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('styles/font.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('styles/app.css') }}" type="text/css" />

  <link rel="stylesheet" href="{{ URL::asset('styles/bootstrap-material-datetimepicker.css')}}" />
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
  <link rel="stylesheet" href="{{ URL::asset('/libs/select2/select2.min.css') }}"/>
  <link rel="stylesheet" href="{{ URL::asset('styles/fullcalendar.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('styles/fullcalendar.print.css') }}" media="print">
</head>
<body>
<div class="app">
  <!-- aside -->
  <aside id="aside" class="app-aside modal fade folded" role="menu">
    <div class="left">
      <div class="box bg-white">
        <div class="navbar md-whiteframe-z1 no-radius blue">
            <!-- brand -->
            <a class="navbar-brand">
                <img src="{{ url('images/cms-logo.png') }}" style="width:40px;height:40px;>
                <span class="hidden-folded m-l inline">  Reservation</span>
            </a>
            <!-- / brand -->
        </div>
        <div class="box-row">
          <div class="box-cell scrollable hover">
            <div class="box-inner">
              <div class="p hidden-folded blue-50" style="background-image:url({{ url('images/bg.png') }}); background-size:cover">
                <div class="rounded w-64 bg-white inline pos-rlt">
                  <img src="{{ URL::asset('images/profile/default.jpg') }}" class="img-responsive rounded" style="width:64px;height:64px;">
                </div>
                <a class="block m-t-sm" ui-toggle-class="hide, show" target="#nav, #account">
                  <span class="block font-bold">{{ Auth::user()->name }}</span>
                  <span class="pull-right auto">
                    <i class="fa inline fa-caret-down"></i>
                    <i class="fa none fa-caret-up"></i>
                  </span>
                  {{ Auth::user()->email }}
                </a>
              </div>
              <div id="nav">
                <nav ui-nav>
                  <ul class="nav">
                    <li class="nav-header m-v-sm hidden-folded">

                    </li>
                    <li>
                      <a md-ink-ripple href="{{ url('/home') }}">
                        <i class="pull-right"><b class="badge no-bg"></b></i>
                        <i class="icon mdi-action-settings-input-svideo i-20"></i>
                        <span class="font-normal">Dashboard</span>
                      </a>
                    </li>
                    <li>
                      <a md-ink-ripple>
                        <span class="pull-right text-muted">
                          <i class="fa fa-caret-down"></i>
                        </span>
                        <i class="pull-right up"></i>
                        <i class="icon mdi-maps-rate-review i-20"></i>
                        <span class="font-normal">Reservations</span>
                      </a>
                      <ul class="nav nav-sub">
                        <li>
                          <i class="pull-right up"><b class="badge bg-success"></b></i>
                          <a md-ink-ripple href="{{ url('newReservation') }}">Add Reservation</a>
                        </li>
                        <li>
                          <i class="pull-right up"><b class="badge bg-success"></b></i>
                          <a md-ink-ripple href="{{ url('myUpcomingReservations') }}">My Upcoming Reservations</a>
                        </li>
                        <li>
                          <i class="pull-right up"><b class="badge bg-success"></b></i>
                          <a md-ink-ripple href="{{ url('allUpcomingReservations') }}">All Upcoming Reservations</a>
                        </li>
                        <li>
                          <i class="pull-right up"><b class="badge bg-success"></b></i>
                          <a md-ink-ripple href="{{ url('allReservations') }}">All Reservations</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a md-ink-ripple>
                        <span class="pull-right text-muted">
                          <i class="fa fa-caret-down"></i>
                        </span>
                        <i class="pull-right up"></i>
                        <i class="icon mdi-image-flash-on i-20"></i>
                        <span class="font-normal">Event</span>
                      </a>
                      <ul class="nav nav-sub">
                        <li>
                          <a md-ink-ripple href="{{ url('newEvent') }}">New Event</a>
                        </li>
                        <li>
                          <a md-ink-ripple href="{{url('allEvents')}}">All Event</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a md-ink-ripple>
                        <span class="pull-right text-muted">
                          <i class="fa fa-caret-down"></i>
                        </span>
                        <i class="icon mdi-social-school i-20"></i>
                        <span class="font-normal">Resources / Venue</span>
                      </a>
                      <ul class="nav nav-sub">
                        <li>
                          <a md-ink-ripple href="{{ url('newResource') }}">New Resource</a>
                        </li>
                        <li>
                          <a md-ink-ripple href="{{ url('allResources') }}">All Resources</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a md-ink-ripple>
                        <span class="pull-right text-muted">
                          <i class="fa fa-caret-down"></i>
                        </span>
                        <i class="icon mdi-action-spellcheck i-20"></i>
                        <span class="font-normal">Admin</span>
                      </a>
                      <ul class="nav nav-sub">
                        <li>
                          <a md-ink-ripple href="{{url('allUsers')}}">Users</a>
                        </li>
                      </ul>
                    </li>
                    <li class="b-b b m-v-sm"></li>
                    <li>
                      <a md-ink-ripple ui-toggle-class="hide, show" target="#nav, #account">
                        <i class="icon mdi-action-settings i-20"></i>
                        <span>Settings</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
              <div id="account" class="hide m-v-xs">
                <nav>
                  <ul class="nav">
                    <li>
                      <a md-ink-ripple href="{{ url('userdetail/'.Auth::user()->id)}}">
                        <i class="icon mdi-action-perm-contact-cal i-20"></i>
                        <span>My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a md-ink-ripple href="{{ url('/logout') }}">
                        <i class="icon mdi-action-exit-to-app i-20"></i>
                        <span>Logout</span>
                      </a>
                    </li>
                    <li class="m-v-sm b-b b"></li>
                    <li>
                      <div class="nav-item" ui-toggle-class="folded" target="#aside">
                        <label class="md-check">
                          <input type="checkbox">
                          <i class="purple no-icon"></i>
                          <span class="hidden-folded">Folded aside</span>
                        </label>
                      </div>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <nav>
          <ul class="nav b-t b">
            <li>
              <a href="" target="_blank" md-ink-ripple>
                <i class="icon mdi-action-help i-20"></i>
                <span>Help &amp; Feedback</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </aside>
  <!-- / aside -->
  


  <!-- content -->
  <div id="content" class="app-content" role="main">
    <div class="box">
        <!-- Content Navbar -->
        <div class="navbar md-whiteframe-z1 no-radius blue">
            <!-- Open side - Naviation on mobile -->
            <a md-ink-ripple  data-toggle="modal" data-target="#aside" class="navbar-item pull-left visible-xs visible-sm"><i class="mdi-navigation-menu i-24"></i></a>
            <!-- / -->
            <!-- Page title - Bind to $state's title -->
            <div class="navbar-item pull-left h4">@yield('header_title')</div>
            <!-- / -->
            <!-- Common tools -->
            <!--<ul class="nav nav-sm navbar-tool pull-right">
                <!-- li  style="margin-top: 18%;">
                    <a md-ink-ripple ui-toggle-class="show" target="#search">
                        <i class="mdi-action-search i-24"></i>
                    </a>
                </li- ->
                <li class="dropdown">
                  <a md-ink-ripple data-toggle="dropdown">
                    <i class="mdi-social-person-outline i-24"></i><i class="pull-right up"><b class="badge bg-warning">3</b></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-scale pull-right pull-up text-color">
                    <li><a href>Notifications</a></li>
                    <li><a href>Notifications</a></li>
                    <li><a href>Notifications</a></li>
                    <li class="divider"></li>
                    <li><a href>Help &amp; feedback</a></li>
                  </ul>
                </li>
            </ul> -->
            <div class="pull-right" ui-view="navbar@"></div>
            <!-- / -->
            <!-- Search form -->
            <div id="search" class="pos-abt w-full h-full blue hide">
                <div class="box">
                    <div class="box-col w-56 text-center">
                        <!-- hide search form -->
                        <a md-ink-ripple class="navbar-item inline"  ui-toggle-class="show" target="#search"><i class="mdi-navigation-arrow-back i-24"></i></a>
                    </div>
                    <div class="box-col v-m">
                        <!-- bind to app.search.content -->
                        <input class="form-control input-lg no-bg no-border" placeholder="Search" ng-model="app.search.content">
                    </div>
                    <div class="box-col w-56 text-center">
                        <a md-ink-ripple class="navbar-item inline"><i class="mdi-av-mic i-24"></i></a>
                    </div>
                </div>
             </div>
        <!-- / -->
        </div>
    <!-- Content -->

    @include('flash::message')
    @yield('content')

  </div>
  <!-- / content -->
</div>
<script src="{{ URL::asset('libs/jquery/jquery/dist/jquery.js') }}"></script>
<script src="{{ URL::asset('/libs/jquery/bootstrap/dist/js/bootstrap.js') }}"></script>
<script src="{{ URL::asset('/libs/jquery/waves/dist/waves.js') }}"></script>

<script src="{{ URL::asset('scripts/ui-load.js') }}"></script>
<script src="{{ URL::asset('scripts/ui-jp.config.js') }}"></script>
<script src="{{ URL::asset('scripts/ui-jp.js') }}"></script>
<script src="{{ URL::asset('scripts/ui-nav.js') }}"></script>
<script src="{{ URL::asset('scripts/ui-toggle.js') }}"></script>
<script src="{{ URL::asset('scripts/ui-form.js') }}"></script>
<script src="{{ URL::asset('scripts/ui-waves.js') }}"></script>
<script src="{{ URL::asset('scripts/ui-client.js') }}"></script>

<script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('scripts/bootstrap-material-datetimepicker.js')}}"></script>
<script src="{{ URL::asset('scripts/appdatepicker.js') }}"></script>
<script src="{{ URL::asset('scripts/confirmation.js') }}"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<script src="{{ URL::asset('/libs/select2/select2.full.min.js') }}"></script>
<script src="{{ URL::asset('scripts/main.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ URL::asset('scripts/fullcalendar.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
</body>
</html>
