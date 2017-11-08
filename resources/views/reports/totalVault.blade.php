@extends('layouts.app')
@section('main-content')
@section('message_level')
Estado de Resultados
@endsection
@section('message_level_here')
Detalles
@endsection
@php
$users = App\User::all();
@endphp
<div class="container-fluid">
  <div class="row-fluid">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Reporte Total Bovéda</h3>
      </div>  
      <div class="row">
        <div class="col-md-12">
         <div id="search_table"></div>
       </div>
     </div>
     <div class="table-responsive">
       <table class="table" id="example">
        <thead class="thead-inverse">
          <th>Nombre</th>
          <th>Apellido Paterno</th>
          <th>Apellido Materno</th>
          <th>Región</th>
          <th>Total</th>
        </thead>
        <tbody>
         @foreach ($users as $user)
         @php
         $vault = $user->vault;
         $vault_total = App\Models\Vault::all();
         @endphp
         <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->father_last_name }}</td>
          <td>{{ $user->mother_last_name }}</td>
          <td>{{ $user->region->name }}</td>
          <td>${{ number_format($vault->ammount,2) }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
</div>



@endsection

