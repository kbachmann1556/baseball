<!DOCTYPE html>
<html lang="{{Lang::locale()}}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,700,800,700italic|Source+Code+Pro:400,600,700' rel='stylesheet' type='text/css'>
    <!-- Layout -->
    <link rel="stylesheet" href="{{asset('css/layout.css')}}">
    <title>@yield('title')</title>
  </head>
  <body>

    <div id="main">
      @yield('content')
    </div>

    <script type="text/javascript">
    var baseball = {
      token : "{{csrf_token()}}",
      base_path : "{{url('/')}}",
      current_url : "{{Request::url()}}",
      current_path : "{{Request::path()}}",
      response : null
    };

    baseball.config = {};
    </script>

    <script src="{{asset('js/config.js')}}"></script>

    <!-- External Scripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>


    <!-- Local Scripts -->
    <script src="{{asset('js/jquery.canvasjs.min.js')}}"></script>
    <script src="{{asset('js/request.js')}}"></script>

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/pointer_events.js')}}"></script>
    <script src="{{asset('js/app_requests.js')}}"></script>
    <script src="{{asset('js/init.js')}}"></script>

  </body>
</html>
