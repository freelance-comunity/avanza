@extends('layouts.app')

@section('main-content')
@section('message_level')
Créditos
@endsection
@section('message_level_here')
Lista de créditos
@endsection

{{-- Credits all --}}
<div class="container">
	<div class="row">
		<h1 class="pull-left">Créditos</h1>
	</div>
	<div class="row">
		@if($credits->isEmpty())
		<div class="well text-center">No se encontraron créditos.</div>
		@else
		<div class="table-responsive">
			<table class="table"  id="example">
       <thead class="bg-success">
        <th>Nombre del Cliente</th>
        <th>Folio</th>
        <th>Tipo de Crédito</th>
        <th>Fecha de Contrato</th>
        <th>No. Cuotas</th>
       {{--  <th>Saldo Capital</th>
        <th>Saldo Intereses</th>
        <th>Saldo Mora</th>
        <th>Saldo Total</th>
        <th>Estatus</th> --}}
        <th>Acción</th>
      </thead>
      <tbody>
        @foreach($credits as $key=>$credit)
        @php
        $debt = $credit->debt;

        $late_capital = DB::table('payments')->where([
          ['debt_id', '=', $debt->id],
          ['status', '!=', 'Pagado'],
        ])->sum('capital');
        $late_interest = DB::table('payments')->where([
          ['debt_id', '=', $debt->id],
          ['status', '!=', 'Pagado'],
        ])->sum('interest');
        $late_moratorium = DB::table('payments')->where([
          ['debt_id', '=', $debt->id],
          ['status', '!=', 'Pagado'],
        ])->sum('moratorium');
        $late_total = $late_interest + $late_capital + $late_moratorium;

        @endphp
        <tr>
         <td>{{$credit->firts_name}} {{$credit->last_name}} {{$credit->mothers_last_name}}</td>
         <td>{!! $credit->folio !!}</td>
         <td>{{$credit->periodicity}}</td>
         <td>{!! strtoupper($credit->date->format('d F Y')) !!}</td>
         <td> {{ $credit->dues }}</td>
       {{--   <td class="bg-primary">{{ $late_capital }}</td>
         <td class="bg-warning">{{ $late_interest }}</td>
         <td class="bg-danger">{{ $late_moratorium }}</td>
         <td class="bg-green">{{ $late_total }}</td>
         <td>{{ $credit->debt['status'] }}</td> --}}
         <td><a href="{!! route('credits.show', [$credit->id]) !!}" class="btn btn-primary btn-lg btn-block">PAGAR</a></td>
       </tr>
       @endforeach
     </tbody>
   </table>
 </div>

 @endif
</div>
</div>
@endsection
