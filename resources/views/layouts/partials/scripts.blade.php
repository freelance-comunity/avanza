<!-- REQUIRED JS SCRIPTS -->

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

      {{-- Form Wizard Validation --}}

      <script>
         $(document).ready(function () {

              var navListItems = $('div.setup-panel div a'),
              allWells = $('.setup-content'),
              allNextBtn = $('.nextBtn');

              allWells.hide();

              navListItems.click(function (e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                $item = $(this);

                if (!$item.hasClass('disabled')) {
                  navListItems.removeClass('btn-primary').addClass('btn-default');
                  $item.addClass('btn-primary');
                  allWells.hide();
                  $target.show();
                  $target.find('input:eq(0)').focus();
            }
      });

              allNextBtn.click(function(){
                var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;

                $(".form-group").removeClass("has-error");
                for(var i=0; i<curInputs.length; i++){
                  if (!curInputs[i].validity.valid){
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
              }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
});

              $('div.setup-panel div a.btn-primary').trigger('click');
        });
  </script>


