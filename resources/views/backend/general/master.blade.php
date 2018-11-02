<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content=" {{csrf_token() }}">
    <title></title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link id="shortcut-icon" rel="shortcut icon" href="">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/morris/morris.css') }}">
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/croppie.css') }}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/chats/css/chats.css')}}" rel="stylesheet" type="text/css">

    <!-- DataTables -->
    <link href="{{ asset('backend/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('backend/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Table css -->
    <link href="{{ asset('backend/assets/plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ asset('backend/assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
    @yield('csspersonal')
</head>
<body class="fixed-left">
    <div id="preloader"><div id="status"><div class="spinner"></div></div></div>
    <div id="wrapper">
        <div class="left side-menu">
            <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                <i class="ion-close"></i>
            </button>
            <div class="topbar-left">
                <div class="text-center">
                    <a href="index-2.html" class="logo"></a>
                </div>
            </div>
            <div class="sidebar-inner slimscrollleft">
                <div class="user-details">
                    @include('backend.general.userdetail')
                </div>
                <div id="sidebar-menu">
                    @include('backend.general.sidebar')
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="content-page">
            <div class="content">
                <div class="topbar">
                    @include('backend.general.topbar')
                </div>
                <div class="page-content-wrapper ">
                    @yield('content')
                </div>
            </div>
            @include('backend.general.footer')
        </div>
    </div>
    <!-- jQuery  -->
    <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/tether.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/detect.js') }}"></script>
    <script src="{{ asset('backend/assets/js/fastclick.js') }}"></script>
    <script src="{{ asset('backend/assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('backend/assets/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('backend/assets/js/waves.js') }}"></script>
    <script src="{{ asset('backend/assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('backend/assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('backend/assets/pages/dashborad.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
    <script type="text/javascript" src="{{asset('backend/chats/js/chats.js')}}"></script>

    <!-- Required datatable js -->
    <script src="{{ asset('backend/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!--Responsive-table-->
    <script src="{{ asset('backend/assets/plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/setting.js') }}"></script>
    <script src="{{ asset('js/croppie.js') }}"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase.js"></script>
    <script src="{{ asset('js/firebase/intializefirebase.js') }}"></script>
    <script src="{{ asset('js/firebase/chatbackend.js') }}"></script>
    @yield('jspersonal')
    {{-- <script type="text/javascript">
        if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5m3DSB4E%2frimA5hgYZS9QTHw%2b%2b%2fJgMwv2Uq0aKzEQ7Msalc6pq3N8V7iaTzj6t7CMOKN2cJoiz2jfmUUPu%2byoJ32CDoj0%2b7AYHj%2f1Azush%2bQOO0O79D6yMmfnshiAqntEaKXflIuByycfYzMYGxMYdbUqDW%2bQ7rxqBuWiTN8bd2OfCHGtOY5VWejS53BwAFbD2SOSPBa6sFiVpLP19z7pbwCw%2fy3xW7p8tVihupf6x7ecGsb3lXLMIy6L0DrUFl3cSUK76k4%2fkHTaQ5BeI7OBEIl0O1oE1m37IPRuk3hIhSzYBmoVva0b6R7wH8WjxwnZcu7VujE8%2fLcHZCX0zEcMrvAKbGEGPiBQFDfbl9rKXEhGngz%2beneLPyYbbei0pO%2fAMvv1alRnl9FR9R%2bY%2bQuV6UFxxwIBai7igQM%2fpWMZWRRBi4b1fNCrg4poUriWqTOSuv%2f0w6bG7wiIZj2hL1T7VhMUDBco5Sl3%2b" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};
    </script> --}}
</body>
</html>
