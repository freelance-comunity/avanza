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
                <a href="{{ url('view-restructures')}}/{{$client->id}}" class="btn btn-lg btn-app">
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
