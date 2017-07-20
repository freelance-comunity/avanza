@php
$user = App\User::find($employee->id);
$branch = $user->branch;
$location = $user->location;
$credential = $user->credential;
@endphp
<div class="modal fade" id="detail{{ $employee->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">DETALLES</h4>
        </div>
        <div class="modal-body">
          <center>
            <img src="{{ asset('/uploads/avatars') }}/{!! $employee->avatar !!}" width="140" height="140" border="0" class="img-circle" alt="">
            <h3 class="media-heading">{{ $employee->name }} {{ $employee->father_last_name }}</h3>
            <div class="row">
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3>DATOS GENERALES</h3>
                </div>
                <div class="box-body">
                 <div class="col-md-6">
                   SUCURSAL: {{ $branch->name }}
                   <br>
                   TELÉFONO 1: {{ $employee->phone_1 }}
                   <br>
                   CORREO ELECTRÓNICO: {{ $employee->email }}
                 </div>
                 <div class="col-md-6">
                   FECHA DE NACIMIENTO: {{ $employee->birthdate }}
                   <br>
                   ESTADO CIVIL: {{ $employee->civil_status }}
                   <br>
                   NIVEL DE ESTUDIOS: {{ $employee->scholarship }}
                 </div>
               </div>
               <a data-toggle="tooltip" title="Editar" href="{!! route('employees.edit', [$employee->id]) !!}"><i class="fa fa-pencil fa-2x"></i></a>
             </div>
           </div>
         </center>
         <hr>
         <center>
          <div class="row">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3>IDENTIFICACIONES</h3>
              </div>
              <div class="box-body">
               <div class="col-md-6">
                 INE: {{ $credential->ine }}
                 <br>
                 CURP: {{ $credential->curp }}
                 <br>
                 RFC: {{ $credential->rfc }}
               </div>
               <div class="col-md-6">
                 NÚMERO DE IMSS: {{ $credential->number_imss }}
                 <br>
                 LICENCIA DE MANEJO: {{ $credential->driver_license }}
                 <br>
                 CEDULA PROFESIONAL: {{ $credential->professional_id }}
               </div>
             </div>
             <a data-toggle="tooltip" title="Editar" href="{!! route('employeecredentials.edit', [$credential->id]) !!}"><i class="fa fa-pencil fa-2x"></i></a>
           </div>
         </div>
       </center>
       <center>
        <div class="row">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3>DATOS DOMICILIARIOS</h3>
            </div>
            <div class="box-body">
             <div class="col-md-6">
               MUNICIPIO: {{ $location->municipality }}
               <br>
               COLONIA: {{ $location->colony }}
               <br>
               CALLE: {{ $location->name_road }}
             </div>
             <div class="col-md-6">
               NÚMERO DE CASA: {{ $location->outdoor_number }}
               <br>
               CÓDIGO POSTAL: {{ $location->postal_code }}
             </div>
           </div>
           <a data-toggle="tooltip" title="Editar" href="{!! route('employeelocations.edit', [$location->id]) !!}"><i class="fa fa-pencil fa-2x"></i></a>
         </div>
       </div>
     </center>
 </div>
 <div class="modal-footer">
  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
  <!-- /.modal -->