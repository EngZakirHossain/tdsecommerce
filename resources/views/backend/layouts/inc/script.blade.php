<!-- JAVASCRIPT -->
<script src="{{ asset('assets/backend') }}/libs/jquery/jquery.min.js"></script>
<script src="{{ asset('assets/backend') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/backend') }}/libs/metismenu/metisMenu.min.js"></script>
<script src="{{ asset('assets/backend') }}/libs/simplebar/simplebar.min.js"></script>
<script src="{{ asset('assets/backend') }}/libs/node-waves/waves.min.js"></script>


<!-- Peity chart-->
<script src="{{ asset('assets/backend') }}/libs/peity/jquery.peity.min.js"></script>

<!-- Plugin Js-->
<script src="{{ asset('assets/backend') }}/libs/chartist/chartist.min.js"></script>
<script src="{{ asset('assets/backend') }}/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js"></script>

<script src="{{ asset('assets/backend') }}/js/pages/dashboard.init.js"></script>

<script src="{{ asset('assets/backend') }}/js/app.js"></script>
<!-- toastr alert init js-->
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

{{-- page additional script --}}
@stack('admin_script')
