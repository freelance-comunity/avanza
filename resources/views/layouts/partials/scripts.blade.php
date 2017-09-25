<!-- REQUIRED JS SCRIPTS -->

<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>
{{-- Parsley JS --}}
<script src="{{ asset('/js/parsley.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/es.js') }}" type="text/javascript"></script>

{{-- Datatables --}}
<script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.colVis.min.js"></script>
<script src="{{ asset('/js/municipalitys.js')}}"></script>  

<script src="{{ asset('/js/moment.js')}}"></script>


<!--rangeslider-->
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

      <!-- Toastr --> 
     {{--  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script> --}}
     <script src="{{ asset('/js/toastr/toastr.min.js')}}"></script>  

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
          $('#sis').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'excel', 'pdf', 'print',
            ]

          } );
        });
      </script>
      <script>
        $(document).ready(function() {
          $('#rcs').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'excel', 'pdf', 'print',
            ]

          } );
        });
      </script>
      <script>
        $(document).ready(function() {
          $('#afs').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'excel', 'pdf', 'print',
            ]

          } );
        });
      </script>
      <script>
        $(document).ready(function() {
          $('#cs').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'excel', 'pdf', 'print',
            ]

          } );
        });
      </script>
      <script>
        $(document).ready(function() {
          $('#gs').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'excel', 'pdf', 'print',
            ]

          } );
        });
      </script>
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
          $('#example2').DataTable( {
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
      <script type="text/javascript">
        $(document).ready(function(){
          $('#regions').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            columnDefs: [{
              targets: [0],
              visible: false,
              searchable: false
            },
            ],
            order: [[0, "asc"]],
          });
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

  <script src="{{ asset('/js/jquery.loader.js') }}"></script>
  <script type="text/javascript">

    (function ($) {
      "use strict";

        $(function () { // short document ready

          $('.btn-group')
          .on('click', '.btn-info', function () {
            $('.hero-unit').loader('show');
          })
          .on('click', '.btn-warning', function () {
            $('.hero-unit').loader('hide');
          })
          .on('click', '.btn-primary', function () {
            if ($('body').hasClass('loading')) {
              $('body').removeClass('loading')
              .loader('hide');
            } else {
              $('body').addClass('loading')
              .loader('show', {
                overlay: true
              });
            }
          });

        });
      } (jQuery));
    </script>

    <script>
// Bind keyup event on the input
$('#control').keyup(function() {

  // If value is not empty
  if ($(this).val().length == 0) {
    // Hide the element
    $('.show_hide').hide();
  } else {
    // Otherwise show it
    $('.show_hide').show();
  }
}).keyup(); // Trigger the keyup event, thus running the handler on page load
</script>



