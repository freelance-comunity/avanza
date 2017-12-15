@extends('layouts.app')
@section('main-content')
@section('message_level')
Total Bóveda
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
        <h3 class="box-title">Movimientos Bóveda</h3>
      </div>  
      <div class="row">
        <div class="col-md-12">
         <div id="search_table"></div>
       </div>
     </div>
     <div class="table-responsive">
       <table class="table" id="example">
        <thead class="thead-inverse">
          <th>Región</th>
          <th>Sucursal</th>
          <th>Usuario</th>
          <th>Saldo Bóveda</th>
          <th>Asignación de Efectivo</th>
          <th>Recuperación</th>
          <th>Recuperación Access</th>
          <th>Colocación</th>
          <th>Gastos</th>
          <th>Inversión en Activos</th>
        </thead>
        <tbody>
         @foreach ($users as $user)
         @php
         $vault = $user->vault;
         $vault_total = App\Models\Vault::all();
         $incomes = $vault->incomes;
         $incomePayment = $vault->incomePayment;
         $purseAccess = $vault->purseAccess;
         $expendituresCredit = $vault->expendituresCredit;
         $expenditures = $vault->expenditures;
         $actives = $vault->actives;
         @endphp
         <tr>
         <th>{{$user->region['name']}}</th>
         <th>{{$user->branch['name']}}</th>
         <td>{{ $user->name }} {{ $user->father_last_name }} {{ $user->mother_last_name }}</td>
         <td>${{ number_format($vault->ammount,2) }}</td>
         <td>${{number_format($incomes->sum('ammount',2))}}</td>
         <td>${{number_format($incomePayment->sum('ammount',2))}}</td>
         <td>${{number_format($purseAccess->sum('ammount',2))}}</td>
         <td>${{number_format($expendituresCredit->sum('ammount',2))}}</td>
         <td>${{number_format($expenditures->sum('ammount',2))}}</td>
         <td>${{number_format($actives->sum('ammount',2))}}</td>

         </tr>
         @endforeach
         </tbody>
         </table>
         </div>
         </div>
         </div>
         </div>



         @endsection

