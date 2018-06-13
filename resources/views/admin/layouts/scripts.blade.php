<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('AdminLTE-2.3.11/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('AdminLTE-2.3.11/plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('AdminLTE-2.3.11/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('AdminLTE-2.3.11/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('AdminLTE-2.3.11/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('AdminLTE-2.3.11/plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset('AdminLTE-2.3.11/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('AdminLTE-2.3.11/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
{{-- <!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('AdminLTE-2.3.11/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script> --}}
<!-- Slimscroll -->
<script src="{{ asset('AdminLTE-2.3.11/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('AdminLTE-2.3.11/plugins/fastclick/fastclick.js') }}"></script>
{{-- <script>
	 var AdminLTEOptions = {
	  //Enable sidebar expand on hover effect for sidebar mini
	  //This option is forced to true if both the fixed layout and sidebar mini
	  //are used together
	  sidebarExpandOnHover: true,
	  //BoxRefresh Plugin
	  enableBoxRefresh: true,
	  //Bootstrap.js tooltip
	  enableBSToppltip: true
	};
</script> --}}
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE-2.3.11/dist/js/app.min.js') }}"></script>
{{-- SweetALert --}}
<script src="{{ asset('js/sweetalert.min.js') }}"></script>