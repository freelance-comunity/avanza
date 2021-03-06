<!-- REQUIRED JS SCRIPTS -->

<!-- Bootstrap 3.3.2 JS -->
{{-- <script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script> --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>
{{-- Parsley JS --}}
<script src="{{ asset('/js/parsley.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/es.js') }}" type="text/javascript"></script>

{{-- Setup Token mismatch --}}
<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
</script>

{{-- Datatables --}}
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.colVis.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.3/sl-1.2.4/datatables.min.js"></script>


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
          $('#carteraVencida').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            fnFooterCallback: function(row, data, start, end, display) {
              var api = this.api();
              var footer = $(this).append('<tfoot><tr></tr></tfoot>');
              this.api().columns().every(function () {
                var column = this;
                $(footer).append('<tfoot><th><input type="text" style="width:100%;"></th></tfoot>');
              });
            },
            dom: 'Bfrtip',
            buttons: [
            'csv','excel', 'pdf', 'print',
            ]

          } );
        });
      </script>
      <script>
        $(document).ready(function() {
          $('#sis').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'csv','excel', 'pdf', 'print',
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
            'csv','excel', 'pdf', 'print',
            ]

          } );
        });
      </script>
      <script>
        $(document).ready(function() {
          $('#rec_access').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'csv','excel', 'pdf', 'print',
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
            'csv','excel', 'pdf', 'print',
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
            'csv','excel', 'pdf', 'print',
            ]

          } );
        });
      </script>
      {{-- Datatables multiples tabs --}}
      <script>
        $(document).ready(function() {
          $('#vaul').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'csv','excel', 'pdf', 'print',
            ]

          } );
        });
      </script> 
      <script>
        $(document).ready(function() {
          $('#gastosCoordinador').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'csv','excel', 'pdf', 'print',
            ]
          } );
        });
      </script> 
      <script>
        $(document).ready(function() {
          $('#start').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'csv','excel', 'pdf', 'print',
            ]

          } );
        });
      </script>
      <script>
        $(document).ready(function() {
          $('#assignment').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'csv','excel', 'pdf', 'print',
            ]

          } );
        });
      </script>
      <script>
        $(document).ready(function() {
          $('#recovery').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'csv','excel', 'pdf', 'print',
            ]

          } );
        });
      </script>
      <script>
        $(document).ready(function() {
          $('#acces').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'csv','excel', 'pdf', 'print',
            ]

          } );
        });
      </script>
      <script>
        $(document).ready(function() {
          $('#creditos').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'csv','excel', 'pdf', 'print',
            ]

          } );
        });
      </script>
      <script>
        $(document).ready(function() {
          $('#expensees').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'csv','excel', 'pdf', 'print',
            ]

          } );
        });
      </script>
      <script>
        $(document).ready(function() {
          $('#corte').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'csv','excel', 'pdf', 'print',
            ]

          } );
        });
      </script>
      <script>
        $(document).ready(function() {
          $('#sueldos').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'csv','excel', 'pdf', 'print',
            ]

          } );
        });
      </script>
      {{-- End --}}
      <script>
        $(document).ready(function() {
          $('#gs').DataTable( {
            dom: 'Bfrtip',
            buttons: [
            'excel', 'pdf', 'print',
            ],
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
          } );
        });
      </script>
      <script>
      	$(document).ready(function() {
      		$('#example').DataTable( {
      			"language": {
              "pageLength": 25,
              responsive: true,
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
          $('#example2').DataTable( {
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
          $('#pagos_promotor').DataTable( {
            "language": {
              // "order": [[ 0, 'asc' ], [ 3, 'asc' ]],
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
          } );
        });
      </script>
      <script>
        $(document).ready(function() {
          $('#pagos_promotor3').DataTable( {
            "language": {
              // "order": [[ 0, 'asc' ], [ 3, 'asc' ]],
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
          } );
        });
      </script>
      <script>
        $(document).ready(function() {
          $('#pagos_promotor2').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
          } );
        });
      </script>
      <script type="text/javascript">
        $(document).ready(function(){
          $('#regions').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'excel', 'pdf', 'print',
            ]
          });
        });
      </script>


      <script>
        $(document).ready(function() {
          $('#totalpayments').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            lengthMenu: [[100000, 100, -1], [100000, 100, "All"]],

            // buttons: [
            // 'csv', 'excel', 'print', 
            // ],
            buttons: [
            {
              extend: 'excelHtml5',
              title: 'Historial de Pagos'
            },
            {
              extend: 'csvHtml5',
              title: 'Historial de Pagos'
            }
            ],
            processing: true,
            serverSide: true,
            ajax: "api/payments",
            columns:[
            {data: 'number', name: 'payments.number'},
            {data: 'regions', name:'regions.name'},
            {data: 'name',name:'branches.name'},
            {data: 'adviser', name: 'credits.adviser'},
            {data: 'firts_name', name: 'credits.firts_name', render: function (data, type, row, meta) {
              return row.firts_name + ' ' + row.last_name + ' ' + row.mothers_last_name;
            }},
            {data: 'folio', name: 'credits.folio'},
            {data: 'periodicity', name: 'credits.periodicity'},
            {data: 'dues', name: 'credits.dues'},
            {data: 'interest_rate', name: 'credits.interest_rate'},
            {data: 'payment', name:'payments.payment'},
            {data: 'capital' , name:'payments.capital'},
            {data: 'interest', name: 'payments.interest'},
            {data: 'moratorium', name: 'payments.moratorium'},
            {data: 'updated_at', name:'payments.updated_at'},

            ]
          });
           // $.fn.dataTable.ext.errMode = 'throw';
         });
       </script>
       <script>
        $(document).ready(function() {
          $('#reportPaymentCentro').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            lengthMenu: [[100000, 100, -1], [100000, 100, "All"]],
            buttons: [
            {
              extend: 'excelHtml5',
              title: 'Historial de Pagos Centro'
            },
            {
              extend: 'csvHtml5',
              title: 'Historial de Pagos Centro'
            }
            ],
            "processing": true,
            "serverSide": true,
            "ajax": "api/reportPaymentCentro",
            "columns":[
            {data: 'number', name: 'payments.number'},
            {data: 'regions', name:'regions.name'},
            {data: 'name',name:'branches.name'},
            {data: 'adviser', name: 'credits.adviser'},
            {data: 'firts_name', name: 'credits.firts_name', render: function (data, type, row, meta) {
              return row.firts_name + ' ' + row.last_name + ' ' + row.mothers_last_name;
            }},
            {data: 'folio', name: 'credits.folio'},
            {data: 'periodicity', name: 'credits.periodicity'},
            {data: 'dues', name: 'credits.dues'},
            {data: 'interest_rate', name: 'credits.interest_rate'},
            {data: 'payment', name:'payments.payment'},
            {data: 'capital' , name:'payments.capital'},
            {data: 'interest', name: 'payments.interest'},
            {data: 'moratorium', name: 'payments.moratorium'},
            {data: 'updated_at', name:'payments.updated_at'},
            ]
          });
           // $.fn.dataTable.ext.errMode = 'throw';
         });
       </script>
       <script>
        $(document).ready(function() {
          $('#reportPaymentAltos').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            lengthMenu: [[100000, 100, -1], [100000, 100, "All"]],
            buttons: [
            {
              extend: 'excelHtml5',
              title: 'Historial de Pagos Altos'
            },
            {
              extend: 'csvHtml5',
              title: 'Historial de Pagos Altos'
            }
            ],
            "processing": true,
            "serverSide": true,
            "ajax": "api/reportPaymentAltos",
            "columns":[
            {data: 'number', name: 'payments.number'},
            {data: 'regions', name:'regions.name'},
            {data: 'name',name:'branches.name'},
            {data: 'adviser', name: 'credits.adviser'},
            {data: 'firts_name', name: 'credits.firts_name', render: function (data, type, row, meta) {
              return row.firts_name + ' ' + row.last_name + ' ' + row.mothers_last_name;
            }},
            {data: 'folio', name: 'credits.folio'},
            {data: 'periodicity', name: 'credits.periodicity'},
            {data: 'dues', name: 'credits.dues'},
            {data: 'interest_rate', name: 'credits.interest_rate'},
            {data: 'payment', name:'payments.payment'},
            {data: 'capital' , name:'payments.capital'},
            {data: 'interest', name: 'payments.interest'},
            {data: 'moratorium', name: 'payments.moratorium'},
            {data: 'updated_at', name:'payments.updated_at'},
            ]
          });
           // $.fn.dataTable.ext.errMode = 'throw';
         });
       </script>
       <script>
        $(document).ready(function() {
          $('#reportPaymentMezcalapa').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            lengthMenu: [[100000, 100, -1], [100000, 100, "All"]],
            buttons: [
            {
              extend: 'excelHtml5',
              title: 'Historial de Pagos Mezcalapa'
            },
            {
              extend: 'csvHtml5',
              title: 'Historial de Pagos Mezcalapa'
            }
            ],
            "processing": true,
            "serverSide": true,
            "ajax": "api/reportPaymentMezcalapa",
            "columns":[
            {data: 'number', name: 'payments.number'},
            {data: 'regions', name:'regions.name'},
            {data: 'name',name:'branches.name'},
            {data: 'adviser', name: 'credits.adviser'},
            {data: 'firts_name', name: 'credits.firts_name', render: function (data, type, row, meta) {
              return row.firts_name + ' ' + row.last_name + ' ' + row.mothers_last_name;
            }},
            {data: 'folio', name: 'credits.folio'},
            {data: 'periodicity', name: 'credits.periodicity'},
            {data: 'dues', name: 'credits.dues'},
            {data: 'interest_rate', name: 'credits.interest_rate'},
            {data: 'payment', name:'payments.payment'},
            {data: 'capital' , name:'payments.capital'},
            {data: 'interest', name: 'payments.interest'},
            {data: 'moratorium', name: 'payments.moratorium'},
            {data: 'updated_at', name:'payments.updated_at'},
            ]
          });
           // $.fn.dataTable.ext.errMode = 'throw';
         });
       </script>
       <script>
        $(document).ready(function() {
          $('#reportPaymentNorte').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            lengthMenu: [[100000, 100, -1], [100000, 100, "All"]],
            buttons: [
            {
              extend: 'excelHtml5',
              title: 'Historial de Pagos Norte'
            },
            {
              extend: 'csvHtml5',
              title: 'Historial de Pagos Norte'
            }
            ],
            "processing": true,
            "serverSide": true,
            "ajax": "api/reportPaymentNorte",
            "columns":[
            {data: 'number', name: 'payments.number'},
            {data: 'regions', name:'regions.name'},
            {data: 'name',name:'branches.name'},
            {data: 'adviser', name: 'credits.adviser'},
            {data: 'firts_name', name: 'credits.firts_name', render: function (data, type, row, meta) {
              return row.firts_name + ' ' + row.last_name + ' ' + row.mothers_last_name;
            }},
            {data: 'folio', name: 'credits.folio'},
            {data: 'periodicity', name: 'credits.periodicity'},
            {data: 'dues', name: 'credits.dues'},
            {data: 'interest_rate', name: 'credits.interest_rate'},
            {data: 'payment', name:'payments.payment'},
            {data: 'capital' , name:'payments.capital'},
            {data: 'interest', name: 'payments.interest'},
            {data: 'moratorium', name: 'payments.moratorium'},
            {data: 'updated_at', name:'payments.updated_at'},
            ]
          });
           // $.fn.dataTable.ext.errMode = 'throw';
         });
       </script>
       <script>
        $(document).ready(function() {
          $('#wallet').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'excel', 'print','csv',
            ],
            "processing": true,
            "serverSide": true,
            "ajax": "api/wallet",
            "columns":[
            {data: 'id', name: 'credits.id'},
            {data: 'folio', name: 'credits.folio'},
            {data: 'regions', name:'regions.name'},
            {data: 'periodicity', name: 'credits.periodicity'},
            {data: 'adviser', name: 'credits.adviser'},
            {data: 'firts_name', name: 'credits.firts_name', render: function (data, type, row, meta) {
              return row.firts_name + ' ' + row.last_name + ' ' + row.mothers_last_name;
            }},
            {data: 'date', name: 'credits.date'},
            {data: 'name',name:'branches.name'},
            {data: 'ammount', name:'credits.ammount'},
            {data: 'interest_rate', name:'credits.interest_rate'},
            {data: 'dues',name:'credits.dues'}, 
            {data: 'count', name: 'count', searchable: false},
            {data: 'partials', name: 'partials', searchable: false},
            {data: 'status', name:'debts.status'},
            ]
          });
        });
      </script>
      <script>
        $(document).ready(function() {
          $('#movementsBeginningNorte').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            lengthMenu: [[100000, 100, -1], [100000, 100, "All"]],
            buttons: [
            {
              extend: 'excelHtml5',
              title: 'SALDO INICIAL'
            },
            {
              extend: 'csvHtml5',
              title: 'SALDO INICIAL'
            }
            ],
            "processing": true,
            "serverSide": true,
            "ajax": "api/movementsBeginningNorte",
            "columns":[
            {data: 'name', name: 'branches.name'},
            {data: 'vault_id', name:'incomes.vault_id'},
            {data: 'ammount',name:'incomes.ammount'},
            {data: 'concept', name: 'incomes.concept'},
            {data: 'created_at', name: 'incomes.created_at'},
            ]
          });
            // $.fn.dataTable.ext.errMode = 'throw';
         });
       </script>

       <script>
        $(document).ready(function() {
          $('#clientes').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'csv', 'excel', 'pdf', 'print', 
            ],
            "processing": true,
            "serverSide": true,
            "ajax": "api/clientes",
            "columns":[
            {data: 'firts_name', name: 'firts_name', render: function (data, type, row, meta) {
              return row.firts_name + ' ' + row.last_name + ' ' + row.mothers_last_name;
            }},
            {data: 'curp', name: 'curp'},
            {data: 'ine',name:'ine'},
            {data: 'street',name:'street', render: function (data, type, row, meta) {
              return row.street + ' ' + row.number + ', ' + row.colony + ', ' + row.municipality + '; ' + row.state ;
            }},
            ]
          });
        });
      </script>
      {{-- <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script> --}}

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
          dom: 'Bfrtip',
          buttons: [
          'excel', 'pdf', 'print',
          ],
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



<script type="text/javascript">
  $(document).ready(function(){
    $('#ajax').DataTable({
     "processing": true,
     "serverSide": true,
     "ajax": "{{ url('reportPaymentCentroAjax') }}",
     "columns":[
     {data: 'id', name: 'id'},
     {data: 'ammount', name: 'ammount' },
     {data: 'concept', name: 'concept'},
     {data: 'date', name: 'date'},
     {data: 'payment_id', name: 'payment_id'},
     {data: 'debt_id', name: 'debt_id'},

     ],
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

<script>
        $(document).ready(function() {
          $('#finals').DataTable( {
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            lengthMenu: [[100000, 100, -1], [100000, 100, "All"]],

            // buttons: [
            // 'csv', 'excel', 'print', 
            // ],
            buttons: [
            {
              extend: 'excelHtml5',
              title: 'Cierre Bóveda'
            },
            {
              extend: 'csvHtml5',
              title: 'Cierre Bóveda'
            }
            ],
            processing: true,
            serverSide: true,
            ajax: "api/finals",
            columns:[
            {data: 'date', name: 'finals.date'},
            {data: 'region', name:'finals.region'},
            {data: 'branch',name:'finals.branch'},
            {data: 'name', name: 'finals.name'},
            {data: 'vault', name: 'finals.vault'},
            {data: 'incomes', name: 'finals.incomes'},
            {data: 'incomePayment', name: 'finals.incomePayment'},
            {data: 'access', name: 'finals.access'},
            {data: 'credit', name:'finals.credit'},
            {data: 'expenditures' , name:'finals.expenditures'},
            {data: 'actives', name: 'finals.actives'},
            

            ]
          });
           // $.fn.dataTable.ext.errMode = 'throw';
         });
       </script>

