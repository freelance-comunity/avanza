@extends('layouts.app')
@section('main-content')
@section('message_level')
Clientes
@endsection
@section('message_level_here')
Lista de clientes
@endsection
@section('contentheader_title')
Todos los Clientes
@endsection
<style media="screen">
.table {
  border: none;
}

.table-definition thead th:first-child {
  pointer-events: none;
  background: white;
  border: none;
}

.table td {
  vertical-align: middle;
}

.page-item > * {
  border: none;
}

.custom-checkbox {
min-height: 1rem;
padding-left: 0;
margin-right: 0;
cursor: pointer;
}
.custom-checkbox .custom-control-indicator {
  content: "";
  display: inline-block;
  position: relative;
  width: 30px;
  height: 10px;
  background-color: #818181;
  border-radius: 15px;
  margin-right: 10px;
  -webkit-transition: background .3s ease;
  transition: background .3s ease;
  vertical-align: middle;
  margin: 0 16px;
  box-shadow: none;
}
  .custom-checkbox .custom-control-indicator:after {
    content: "";
    position: absolute;
    display: inline-block;
    width: 18px;
    height: 18px;
    background-color: #f1f1f1;
    border-radius: 21px;
    box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4);
    left: -2px;
    top: -4px;
    -webkit-transition: left .3s ease, background .3s ease, box-shadow .1s ease;
    transition: left .3s ease, background .3s ease, box-shadow .1s ease;
  }
.custom-checkbox .custom-control-input:checked ~ .custom-control-indicator {
  background-color: #84c7c1;
  background-image: none;
  box-shadow: none !important;
}
  .custom-checkbox .custom-control-input:checked ~ .custom-control-indicator:after {
    background-color: #84c7c1;
    left: 15px;
  }
.custom-checkbox .custom-control-input:focus ~ .custom-control-indicator {
  box-shadow: none !important;
}
</style>
<div class="container">
<div class="row">
  <h1 class="pull-left">Clientes</h1>
  @if (Auth::user()->can('crear-cliente'))
  <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('clients.create') !!}">Agregar Nuevo Cliente</a>
  @endif
  <!--<button type="button" class="btn bg-navy pull-right" style="margin-top: 25px" data-toggle="modal" data-target="#inputExcel"><i class="fa fa-file-excel-o"></i> Importar Excel</button>-->
</div>
@include('clients.input-excel')
<div class="row">
  @if($clients->isEmpty())
  <div class="well text-center">No se encontraron clientes en el sistema.</div>
  @else

  <div class="table-responsive">
    <table class="table"  id="example">
        <thead class="bg-primary">
          <th>Nombre</th>
          <th>Apellido Paterno</th>
          <th>Apellido Materno</th>
          <th>Sucursal</th>
          <th>Teléfono</th>
          <th width="25px">Número de Créditos Vigentes</th>
        </thead>
        <tbody>
          @foreach($clients as $client)
         @php
         $branch = $client->branch;
         $credits = $client->credits;
         $credits_collection = $client->credits;
         $credits = $credits_collection->where('status', 'MINISTRADO');
         @endphp
         <tr>
           <td>{!! $client->firts_name !!}</td>
           <td>{!! $client->last_name !!}</td>
           <td>{!! $client->mothers_last_name !!}</td>
           <td>{{ $branch->name }}</td>
           <td>{{ $client->phone }}</td>
           <td>
                <a class="btn btn-lg btn-app">            
                  <span class="badge bg-yellow">{{ $credits->count()}}</span>
                <i class="fa fa-bullhorn"></i>
                  Ver Créditos
                </a>
           </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @endif
</div>
</div>
@endsection
