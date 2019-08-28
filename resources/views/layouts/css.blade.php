<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet"
    type="text/css">

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
{{--  full calender --}}
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
{{--  select2 --}}
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css' />
<style>
    .tag {
        background-color: red !important;
    }

    .dataTable {
        background-color: #2a2c3e !important;
    }

    .header-table {
        background-color: #222435;
    }

    div.dataTables_wrapper div.dataTables_filter input {
        border: #f2f2f3 thin solid;
        width: auto !important;
        color: white;
        background-color: #212435;
    }

    .bootstrap-tagsinput {
        background-color: #27293d !important;
        border-color: #2b3553 !important;
        color: #fff;
    }

    .content-body {
        padding-top: 0px !important;
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

    .fc-unthemed .fc-content,
    .fc-unthemed .fc-divider,
    .fc-unthemed .fc-list-heading td,
    .fc-unthemed .fc-list-view,
    .fc-unthemed .fc-popover,
    .fc-unthemed .fc-row,
    .fc-unthemed tbody,
    .fc-unthemed td,
    .fc-unthemed th,
    .fc-unthemed thead {
        border-color: #413a42 !important;
        color: #fff !important;
    }

    .fc .fc-toolbar h2 {
        color: #ffffff;
    }

    .widget-summary .summary .title {
        color: #fff;
    }

    .widget-summary .summary .amount {
        color: #fff;

    }

    .sidebar .sidebar-wrapper,
    .off-canvas-sidebar .sidebar-wrapper {
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

    .paginate_button {
        color: #fff;
        background-color: #1e1e2f;
        margin: 1px;
        padding: 7px;
        border-radius: 5px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);

    }

    .paginate_button:hover {
        color: #7f85c5;
    }

    .mobile-menu {
        display: none;
    }

    .fc-unthemed td.fc-today {
        background: #15161f;
    }

    .btn-success-new {
        background-image: linear-gradient(to bottom left, #0098f0, #0098f0, #ffa604);
    }

    .btn-success-new:hover {
        background-image: linear-gradient(to bottom left, #111514, #0098f0, #ffa604) !important;
    }

    .btn-danger-new {
        background-image: linear-gradient(to bottom left, #d41717, #d41717, #fd5d93);
    }

    .btn-danger-new:hover {
        background-image: linear-gradient(to bottom left, #111514, #d41717, #fd5d93) !important;
    }

    @media only screen and (max-width: 600px) {
        .fc-unthemed td.fc-today {
            background: #60648c;
        }

        .row {
            margin-top: 40px !important;
        }

        .card-on-mobile {
            margin-top: 70px !important;
        }

        .mobile-menu {
            display: inline;
        }

        div.dataTables_wrapper div.dataTables_filter {
            position: relative;
            right: 0;
        }

        .dataTables_wrapper table.dataTable {
            overflow: scroll;
            overflow-x: auto;
        }

        .card {
            overflow: auto;
        }
    }

    @media only screen and (min-width: 768px) {

        html.scroll .sidebar-left,
        html.boxed .sidebar-left,
        html.sidebar-left-big-icons .sidebar-left {
            display: none;
        }

        .navbar-toggle {
            /* display: inline; */
        }

        .card {
            overflow: auto;
        }

        div.dataTables_wrapper div.dataTables_filter {
            position: relative;
            right: 0;
        }

        .dataTables_wrapper table.dataTable {
            overflow: scroll;
            overflow-x: auto;
        }
    }
</style>

@yield('css')
