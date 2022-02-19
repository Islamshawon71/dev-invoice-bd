<!doctype html>
<html lang="en">

<head>

        <meta charset="utf-8" />
        <title>{{ trans('panel.site_title') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- preloader css -->
        <link rel="stylesheet" href="{{  asset('assets/css/preloader.min.css') }}" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{  asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{  asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{  asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>

    <!-- <body data-layout="horizontal"> -->
        <div class="auth-page">
            <div class="container-fluid p-0">

                @yield("content")



                <!-- end row -->
            </div>
            <!-- end container fluid -->
        </div>


        <!-- JAVASCRIPT -->
        <script src="{{  asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{  asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{  asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{  asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{  asset('assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{  asset('assets/libs/feather-icons/feather.min.js') }}"></script>
        <!-- pace js -->
        <script src="{{  asset('assets/libs/pace-js/pace.min.js') }}"></script>
        <!-- password addon init -->
        <script src="{{  asset('assets/js/pages/pass-addon.init.js') }}"></script>
    </body>
</html>
