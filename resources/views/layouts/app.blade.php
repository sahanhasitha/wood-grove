<!doctype html>
<html class="fixed sidebar-left-open">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Wood-Grove</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/dataTables.bootstrap4.min.css">
    {{--  jquery confirm  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    {{--  jquery toast  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css">
    {{--  dropify --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
     {{--  tagsinput --}}
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
    {{--  full calender --}}
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
       {{--  select2 --}}
       <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css' />



     <style>
     .tag {
     background-color: red !important;
     }
     .dataTable{
     background-color: #2a2c3e!important;
     }
     .header-table{
         background-color: #222435;
     }
     div.dataTables_wrapper div.dataTables_filter input{
            border: #f2f2f3 thin solid;
            width: auto!important;
            color: white;
            background-color: #212435;
     }
     .bootstrap-tagsinput {
     background-color: #27293d!important;
         border-color: #2b3553!important;
         color: #fff;
     }
     .content-body {
         padding-top: 0px!important;
     }
.select2-container--default .select2-selection--single {
background-color: #27293d;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
color: #bbb;
line-height: 28px;
}
.select2-container--default .select2-results>.select2-results__options {
background-color: #27293d;
}
.fc-unthemed .fc-content, .fc-unthemed .fc-divider, .fc-unthemed .fc-list-heading td, .fc-unthemed .fc-list-view,
.fc-unthemed .fc-popover, .fc-unthemed .fc-row, .fc-unthemed tbody, .fc-unthemed td, .fc-unthemed th, .fc-unthemed thead
{
border-color: #413a42!important;
color: #fff!important;
}
.fc .fc-toolbar h2 {
color: #ffffff;
}
.widget-summary .summary .title {
    color:#fff;
}
.widget-summary .summary .amount {
    color:#fff;

}
.sidebar .sidebar-wrapper, .off-canvas-sidebar .sidebar-wrapper {
background-color: #27293d;
}
.navbar.navbar-transparent {
background: transparent !important;
border-top: #ff00c8 solid;
}
div.dataTables_wrapper div.dataTables_filter {
position: relative;
right: -235px;
}
.paginate_button{
    color:#fff;
    background-color: #1e1e2f;
    margin: 1px;
    padding: 7px;
    border-radius: 5px;
   box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);

}
.paginate_button:hover{
    color:#7f85c5;
}
     </style>

    @yield('css')
    <!-- Head Libs -->
    <script src="{{asset('vendor/modernizr/modernizr.js')}}"></script>

</head>
<body>
<section class="body">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
      <div class="container-fluid">
          <div class="navbar-wrapper">
              <div class="navbar-toggle d-inline">
                  <button type="button" class="navbar-toggler">
                      <span class="navbar-toggler-bar bar1"></span>
                      <span class="navbar-toggler-bar bar2"></span>
                      <span class="navbar-toggler-bar bar3"></span>
                  </button>
              </div>
              <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
              aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav ml-auto">
                  <li class="search-bar input-group">
                      <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i
                              class="tim-icons icon-zoom-split"></i>
                          <span class="d-lg-none d-md-block">Search</span>
                      </button>
                  </li>
                  <li class="dropdown nav-item">
                      <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">
                          <div class="notification d-none d-lg-block d-xl-block"></div>
                          <i class="tim-icons icon-sound-wave"></i>
                          <p class="d-lg-none">
                              Notifications
                          </p>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                          <li class="nav-link"><a href="#" class="nav-item dropdown-item">Mike John responded to your
                                  email</a></li>
                          <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">You have 5
                                  more tasks</a></li>
                          <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Your friend
                                  Michael is in town</a></li>
                          <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Another
                                  notification</a></li>
                          <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Another
                                  one</a></li>
                      </ul>
                  </li>
                  <li class="dropdown nav-item">
                      <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                          <div class="photo">
                              <img src="{{ asset('img/user.png') }}" alt="Profile Photo">
                          </div>
                          <b class="caret d-none d-lg-block d-xl-block"></b>
                          <p class="d-lg-none">
                              Log out
                          </p>
                      </a>
                      <ul class="dropdown-menu dropdown-navbar">
                          <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Profile (not available)</a>
                          </li>
                          <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Settings (not available)</a>
                          </li>
                          <li class="dropdown-divider"></li>
                          <li class="nav-link text-center"><form method="POST" action="{{ route('logout') }}">
  @csrf
  <button class="btn btn-danger" type="submit">Logout</button>
</form>
                          </li>
                      </ul>
                  </li>
                  <li class="separator d-lg-none"></li>
              </ul>
          </div>
      </div>
  </nav>
  <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <i class="tim-icons icon-simple-remove"></i>
                  </button>
              </div>
          </div>
      </div>
  </div>
  <!-- End Navbar -->
    {{--  <!-- start: header -->
    <header class="header">
        <div class="logo-container">
            <a href="../2.2.0" class="logo">
                <img src="{{asset('img/logo.png')}}" width="75" height="35" alt="Porto Admin" />
            </a>
            <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>

        <!-- start: search & user box -->
        <div class="header-right">

            <div id="userbox" class="userbox">
                <a href="#" data-toggle="dropdown">
                    <div class="profile-info" data-lock-name="John Doe" data-lock-email="{{Auth::user()->email}}">
                        <span class="name">{{Auth::user()->name}}</span>
                    </div>

                    <i class="fa custom-caret"></i>
                </a>

                <div class="dropdown-menu">
                    <ul class="list-unstyled mb-2">
                        <li class="divider"></li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i> Logout</a>
                        </li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end: search & user box -->
    </header>
    <!-- end: header -->  --}}

    <div class="inner-wrapper">
        <!-- start: sidebar -->
        @include('layouts.sidebar')
        <!-- end: sidebar -->

        @yield('content')
    </div>

    <aside id="sidebar-right" class="sidebar-right">
        <div class="nano">
            <div class="nano-content">
                <a href="#" class="mobile-close d-md-none">
                    Collapse <i class="fas fa-chevron-right"></i>
                </a>

                <div class="sidebar-right-wrapper">

                    <div class="sidebar-widget widget-calendar">
                        <h6>Upcoming Tasks</h6>
                        <div data-plugin-datepicker data-plugin-skin="dark"></div>

                        <ul>
                            <li>
                                <time datetime="2017-04-19T00:00+00:00">04/19/2017</time>
                                <span>Company Meeting</span>
                            </li>
                        </ul>
                    </div>

                    <div class="sidebar-widget widget-friends">
                        <h6>Friends</h6>
                        <ul>
                            <li class="status-online">
                                <figure class="profile-picture">
                                    <img src="{{asset('img/!sample-user.jpg')}}" alt="Joseph Doe" class="rounded-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-online">
                                <figure class="profile-picture">
                                    <img src="{{asset('img/!sample-user.jpg')}}" alt="Joseph Doe" class="rounded-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-offline">
                                <figure class="profile-picture">
                                    <img src="{{asset('img/!sample-user.jpg')}}" alt="Joseph Doe" class="rounded-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-offline">
                                <figure class="profile-picture">
                                    <img src="{{asset('img/!sample-user.jpg')}}" alt="Joseph Doe" class="rounded-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </aside>
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
    $(document).ready(function () {
    //dropify image tool
    $('.dropify').dropify();
    $('.dropify-clear').addClass('d-none');
    });
$(".image-upload").change(function() {

      const file = $(".image-upload")[0].files[0];
      // check if file is selected
      if (file) {
        $('#imgUpload').removeAttr('disabled');
      }else{
          $('#imgUpload').attr('disabled', true);
      }
    });
$('input').on('keyup', function(){

    $("input").each(function() {
    var element = $(this);
    if (element.val() != "") {
        $(this).removeClass('is-invalid');
    }
    });
})

</script>

@yield('js')

</body>
</html>
