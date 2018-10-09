<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}">
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/assets/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/croppie.css') }}" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    @yield('content')
    <script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/tether.min.js')}}"></script><!-- Tether for Bootstrap -->
    <script src="{{asset('backend/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/modernizr.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/detect.js')}}"></script>
    <script src="{{asset('backend/assets/js/fastclick.js')}}"></script>
    <script src="{{asset('backend/assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('backend/assets/js/jquery.blockUI.js')}}"></script>
    <script src="{{asset('backend/assets/js/waves.js')}}"></script>
    <script src="{{asset('backend/assets/js/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('backend/assets/js/jquery.scrollTo.min.js')}}"></script>
    <!-- App js -->
    <script src="{{asset('backend/assets/js/app.js')}}"></script>
    <script src="{{ asset('js/croppie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/register/croppieregister.js') }}"></script>
  </body>
</html>
