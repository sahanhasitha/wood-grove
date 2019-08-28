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
    $(".image-upload").change(function () {

        const file = $(".image-upload")[0].files[0];
        // check if file is selected
        if (file) {
            $('#imgUpload').removeAttr('disabled');
        } else {
            $('#imgUpload').attr('disabled', true);
        }
    });
    $('input').on('keyup', function () {

        $("input").each(function () {
            var element = $(this);
            if (element.val() != "") {
                $(this).removeClass('is-invalid');
            }
        });
    })
</script>

@yield('js')
