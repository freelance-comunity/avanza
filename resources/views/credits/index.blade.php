@extends('layouts.app')

@section('main-content')
@role('administrador')
@php
if (Auth::user()->branch->name == 'MATRIZ' ) {
	$credits = App\Models\Credit::all();
}else{
	$client = App\Models\Client::where('branch_id', Auth::user()->branch_id)->get();
	$credits = App\Models\Credit::where('user_id', $client)->get();
}
@endphp
@endrole
<div class="container">
	<div class="row">
		<h1 class="pull-left">Créditos</h1>
	</div>

	<div class="row">
		@if($credits->isEmpty())
		<div class="well text-center">No se encontraron créditos.</div>
		@else
		<div class="table-responsive">
			<table class="table table-hover table-striped"  id="example">
				<thead class="thead-inverse">
					<th>No.</th>
					<th>Folio</th>
					<th>Cliente</th>
					<th>Teléfono</th>
					<th>Fecha de Contrato</th>
					<th>Sucursal</th>
					<th>$ Monto</th>
					<th>No. Cuotas</th>	
					<th>Vencido</th>			
					<th width="50px">Acción</th>
				</thead>
				<tbody>
					@foreach($credits as $key=>$credit)
					@php
					$debt = $credit->debt;
					$late_payments = App\Models\Payment::where('debt_id', $debt->id)->where('status', 'Atrasado')->get();
					$late_interest = $late_payments->sum('interest');
					$late_capital = $late_payments->sum('capital');
					$late_moratorium = $late_payments->sum('moratorium');
					$late_total = $late_interest + $late_capital + $late_moratorium;
					@endphp
					<tr>
						<td>#{{ ++$key }}</td>
						<td>{!! $credit->folio !!}</td>
						<td>{!! $credit->firts_name !!} {!! $credit->last_name !!} {!! $credit->mothers_last_name !!}</td>
						<td>{!! $credit->phone !!}</td>
						<td>{!! strtoupper($credit->date->format('d F Y')) !!}</td>
						<td>{!! $credit->branch !!}</td>
						<td>${!! number_format($credit->ammount, 2) !!}</td>
						<td>{!! $credit->dues !!}</td>
						@if ($late_total==0)
						<td class="success">${!! number_format($late_total, 2) !!}</td>
						@elseif($late_total > 0)
						<td class="danger" style="color: red;">${!! number_format($late_total, 2) !!}</td>
						@endif
						<td>
							<a href="{{ url('solicitud') }}/{{ $credit->id }}"><i class="fa fa-file-pdf-o fa-2x"></i></a>
							<a href="{!! route('credits.show', [$credit->id]) !!}"><i class="fa fa-eye fa-2x" data-toggle="tooltip" title="Ver Detalles" ></i></a> 
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