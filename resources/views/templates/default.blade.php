<!DOCTYPE html>
<html lang="{{Lang::locale()}}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,700,800,700italic|Source+Code+Pro:400,600,700' rel='stylesheet' type='text/css'>
    <!-- <link rel="stylesheet" href="{{asset('css/font-awesome/css/font-awesome.min.css')}}"> -->
    <!-- Layout -->
    <!-- <link rel="stylesheet" href="{{asset('css/layout.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{asset('css/reset.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{asset('css/master.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{asset('css/layout.css')}}"> -->
    <title>@yield('title')</title>
  </head>
  <body>

    <div id="main">
      @yield('content')
    </div>

    <script type="text/javascript">
    var league = {
      token : "{{csrf_token()}}",
      base_path : "{{url('/')}}",
      current_url : "{{Request::url()}}",
      current_path : "{{Request::path()}}",
      response : null
    };

    // commerce.storefront.cart = {};
    league.config = {};
    // commerce.storefront.filters = {};
    </script>

    <script src="{{asset('js/config.js')}}"></script>

    <!-- External Scripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

    <!-- Local Scripts -->
    <!-- // <script type="text/javascript" src="{{asset('js/base.js')}}"></script> -->
    <!-- // <script src="{{asset('js/jquery.cycle2.min.js')}}"></script> -->
    <!-- // <script src="{{asset('js/jquery.cycle2.swipe.min.js')}}"></script> -->
    <!-- // <script src="{{asset('js/modernizr.js')}}"></script> -->
    <script src="{{asset('js/request.js')}}"></script>
    <!-- <script src="{{asset('js/parsley.js')}}"></script> -->

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/pointer_events.js')}}"></script>
    <script src="{{asset('js/app_requests.js')}}"></script>
    <script src="{{asset('js/init.js')}}"></script>

  </body>
</html>
