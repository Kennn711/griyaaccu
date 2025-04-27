<!-- plugins:js -->
<script src="{{ asset('assets') }}/assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('assets') }}/assets/vendors/chart.js/chart.umd.js"></script>
<script src="{{ asset('assets') }}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('assets') }}/assets/js/off-canvas.js"></script>
<script src="{{ asset('assets') }}/assets/js/misc.js"></script>
<script src="{{ asset('assets') }}/assets/js/settings.js"></script>
<script src="{{ asset('assets') }}/assets/js/todolist.js"></script>
<script src="{{ asset('assets') }}/assets/js/jquery.cookie.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('assets') }}/assets/js/dashboard.js"></script>
<!-- End custom js for this page -->

{{-- Bootstrap 5 JS --}}
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

{{-- JQuery 3.7.1 --}}
<script src="{{ asset('assets/jquery/script.js') }}"></script>

@stack('scripts')
