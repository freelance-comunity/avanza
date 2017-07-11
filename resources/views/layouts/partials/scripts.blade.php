<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

      <!-- Toastr --> 
      <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
      {!! Toastr::message() !!}

      <!-- Tootip -->
      <script>
      	$(document).ready(function(){
      		$('[data-toggle="tooltip"]').tooltip(); 
      	});
      </script>

      {{-- Datatables --}}
      <script>
      	$(document).ready(function() {
      		$('#example').DataTable( {
      			"language": {
      				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      			}
      		} );
      	});
      </script>
      <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>