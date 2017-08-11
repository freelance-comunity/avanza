<!-- REQUIRED JS SCRIPTS -->

<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>
{{-- Parsley JS --}}
<script src="{{ asset('/js/parsley.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/es.js') }}" type="text/javascript"></script>

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
      <script>
        $(document).ready(function() {
          $('#pagoss').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
            searching: false
          } );
        });
      </script>
      <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

      <script>
       var changeDateFormat = $('#date').each(function(i,e) {
        var dateTD = $(this).find('td:eq(4)');
        var date = dateTD.text().trim();
        var parts = date.split('/');
        dateTD.text(parts[0]+'/'+parts[2]+'/'+parts[1]);
      });

       $.when(changeDateFormat).done(function() {
        processDates(); 
      })
       /* THIS IS ONLY FOR EXAMPLE TO CHANGE THE DATE FORMAT */


       function processDates() {
        var process = $('#date').each(function(i,e) {
          var dateTD = $(this).find('td:eq(4)');
          var date = dateTD.text().trim();
          var parts = date.split('/');
          dateTD.prepend('<span>'+parts[0]+parts[2]+parts[1]+'</span>');
        });

        $.when(process).done(function() {
          $('#pagoss').DataTable({ 
           "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
          },
          "order": [[ 4, "desc" ]] });

        })
      }
    </script>

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
        curInputs = curStep.find("input[type='text'],input[type='url'],input[type='date'],input[type='email'],input[type='file'], select"),
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


