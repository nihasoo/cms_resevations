<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>CMS Reservation System</title>
  <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="../libs/assets/animate.css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../libs/assets/font-awesome/css/font-awesome.css" type="text/css" />
  <link rel="stylesheet" href="../libs/jquery/waves/dist/waves.css" type="text/css" />
  <link rel="stylesheet" href="styles/material-design-icons.css" type="text/css" />

  <link rel="stylesheet" href="../libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="styles/font.css" type="text/css" />
  <link rel="stylesheet" href="styles/app.css" type="text/css" />

</head>
<body>
<div class="app">
  

  <div class="center-block w-xxl w-auto-xs p-v-md">
    @include('flash::message')
    <div class="navbar">
      <div class="navbar-brand m-t-lg text-center">
          <img src="images/cms-logo.png" style="width:80px;height:80px;>
          <span class="m-l inline">  Reservations</span>
      </div>
    </div>

    <div class="p-lg panel md-whiteframe-z1 text-color m">
      <div class="m-b text-sm">
        Sign in with your Reservation Account
      </div>
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}" name="form">
                              {!! csrf_field() !!}
        <div class="md-form-group float-label{{ $errors->has('email') ? ' has-error' : '' }}">
          <input type="email" class="md-input" ng-model="user.email" required name="email" value="{{ old('email') }}">
          <label>Email</label>
          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>
        <div class="md-form-group float-label{{ $errors->has('password') ? ' has-error' : '' }}">
          <input type="password" class="md-input" ng-model="user.password" required name="password">
          <label>Password</label>
          @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
        </div>      
        <div class="m-b-md">        
          <label class="md-check">
            <input type="checkbox" name="remember"><i class="indigo"></i> Keep me signed in
          </label>
        </div>
        <button md-ink-ripple type="submit" class="md-btn md-raised pink btn-block p-h-md">Sign in</button>
      </form>
      {{--<p><a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a></p>--}}
    </div>
  </div>



</div>

<script src="../libs/jquery/jquery/dist/jquery.js"></script>
<script src="../libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<script src="../libs/jquery/waves/dist/waves.js"></script>

<script src="scripts/ui-load.js"></script>
<script src="scripts/ui-jp.config.js"></script>
<script src="scripts/ui-jp.js"></script>
<script src="scripts/ui-nav.js"></script>
<script src="scripts/ui-toggle.js"></script>
<script src="scripts/ui-form.js"></script>
<script src="scripts/ui-waves.js"></script>
<script src="scripts/ui-client.js"></script>

</body>
</html>
