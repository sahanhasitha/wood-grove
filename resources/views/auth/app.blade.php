<!doctype html>
<html class="fixed sidebar-left-open">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>The Tap</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
        rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/animate/animate.css')}}">

    <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/magnific-popup/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{asset('vendor/owl.carousel/assets/owl.carousel.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/owl.carousel/assets/owl.theme.default.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.theme.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-multiselect/css/bootstrap-multiselect.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/morris/morris.css')}}" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('css/theme.css')}}" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{asset('css/skins/default.css')}}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/black-dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/nucleo-icons.css')}}">

    {{--  datatable cdn  --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/dataTables.bootstrap4.min.css">
    {{--  jquery confirm  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    {{--  jquery toast  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css">
    {{--  dropify --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    {{--  tagsinput --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
    {{--  full calender --}}
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
    {{--  select2 --}}
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css' />



    <style>
       .form-control+.input-group-append .input-group-text, .form-control+.input-group-prepend .input-group-text {
       background-color: #333356;
       }
       control+.input-group-prepend .input-group-text, .form-group .form-control+.input-group-append .input-group-text,
       .input-group .form-control+.input-group-prepend .input-group-text, .input-group .form-control+.input-group-append
       .input-group-text {
       padding: 10px 18px 10px 18px!important;
       }
       @media only screen and (max-width: 600px) {
        .main-row{
            margin: 30px!important;
        }

    }

    </style>

    @yield('css')
    <!-- Head Libs -->
    <script src="{{asset('vendor/modernizr/modernizr.js')}}"></script>

</head>

<body>
    <section class="body">


        <div class="inner-wrapper">
            <div class="row main-row" style=" display: flex; flex-flow: row wrap; justify-content: center;">

                @yield('content')
            </div>
        </div>


    </section>
    <script src="{{asset('vendor/jquery/jquery.js')}}"></script>
    <script src="{{asset('vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
    <script src="{{asset('vendor/popper/umd/popper.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('vendor/common/common.js')}}"></script>
    <script src="{{asset('vendor/nanoscroller/nanoscroller.js')}}"></script>
    <script src="{{asset('vendor/magnific-popup/jquery.magnific-popup.js')}}"></script>
    <script src="{{asset('vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>

    <!-- Specific Page Vendor -->
    <script src="{{asset('vendor/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{asset('vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js')}}"></script>
    <script src="{{asset('vendor/jquery-appear/jquery.appear.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-multiselect/js/bootstrap-multiselect.js')}}"></script>
    <script src="{{asset('vendor/jquery.easy-pie-chart/jquery.easypiechart.js')}}"></script>
    <script src="{{asset('vendor/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('vendor/flot.tooltip/jquery.flot.tooltip.js')}}"></script>
    <script src="{{asset('vendor/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('vendor/flot/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('vendor/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('vendor/jquery-sparkline/jquery.sparkline.js')}}"></script>
    <script src="{{asset('vendor/raphael/raphael.js')}}"></script>
    <script src="{{asset('vendor/morris/morris.js')}}"></script>
    <script src="{{asset('vendor/gauge/gauge.js')}}"></script>
    <script src="{{asset('vendor/snap.svg/snap.svg.js')}}"></script>
    <script src="{{asset('vendor/liquid-meter/liquid.meter.js')}}"></script>
    <script src="{{asset('vendor/jqvmap/jquery.vmap.js')}}"></script>
    <script src="{{asset('vendor/jqvmap/data/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('vendor/jqvmap/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('vendor/jqvmap/maps/continents/jquery.vmap.africa.js')}}"></script>
    <script src="{{asset('vendor/jqvmap/maps/continents/jquery.vmap.asia.js')}}"></script>
    <script src="{{asset('vendor/jqvmap/maps/continents/jquery.vmap.australia.js')}}"></script>
    <script src="{{asset('vendor/jqvmap/maps/continents/jquery.vmap.europe.js')}}"></script>
    <script src="{{asset('vendor/jqvmap/maps/continents/jquery.vmap.north-america.js')}}"></script>
    <script src="{{asset('vendor/jqvmap/maps/continents/jquery.vmap.south-america.js')}}"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="{{asset('js/theme.js')}}"></script>

    <!-- Theme Custom -->
    <script src="{{asset('js/custom.js')}}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{asset('js/theme.init.js')}}"></script>

    <!-- Examples -->
    <script src="{{asset('js/examples/examples.dashboard.js')}}"></script>

    {{--  datatable cdn  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>

    {{--  jqury confirm  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    {{--  jqury toast  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    {{--  dropify  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    {{--  tagsinput  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    {{--  full calendar  --}}
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    {{--  select2  --}}
    <script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.full.min.js'></script>
    <script>

    </script>

    @yield('js')

</body>

</html>
