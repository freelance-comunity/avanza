@extends('layouts.app')
@section('main-content')
@section('message_level')
Creditos Vigentes
@endsection
@section('message_level_here')
Detalles
@endsection
@php
$credits = App\Models\Credit::all();
@endphp
<div class="container-fluid">
  <div class="row-fluid">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Reporte Créditos Vigentes</h3>
      </div>
      <div class="table-responsive">
       <table class="table" id="example">
        <thead class="thead-inverse">
          <th>Promotor</th>
          <th>Folio</th>
          <th>Nombre</th>
          <th>Apellido Paterno</th>
          <th>Apellido Materno</th>
          <th>Monto</th>
          <th>Fecha</th>
        </thead>
        <tbody>
         @foreach ($credits as $credit)
         @if ($credit->debt->status == 'VIGENTE')
         <tr>
          <td>{{ $credit->adviser }}</td>
          <td>{{ $credit->folio }}</td>
          <td>{{ $credit->firts_name }}</td>
          <td>{{ $credit->last_name }}</td>
          <td>{{ $credit->mothers_last_name }}</td>
          <td>${{number_format($credit->ammount)}}</td>
          <td>{{$credit->day}}</td>
        </tr>
        @endif 
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
</div>


@endsection

