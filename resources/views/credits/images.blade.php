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
		@if($credits->isEmpty())
		<div class="well text-center">No se encontraron créditos.</div>
		@else
		<div class="table-responsive">
			@if(Auth::user()->hasRole(['administrador', 'director-general']))
			<table class="table"  id="example">
				@else
				<table class="table"  id="pagos_promotor">
					@endif
					<thead class="bg-primary">
						<th>Imagen</th>
						<th>Status</th>
						<th>Eliminar</th>
					</thead>
					<tbody>
						@foreach($credits as $key=>$credit)
						@php
						$debt = $credit->debt;
						$late_payments = App\Models\Payment::where('debt_id', $debt->id)->where('status', 'Vencido')->get();
						$late_balance = $late_payments->sum('balance');
						@endphp
						<tr>
						<td>{{$credit->firm}}</td>	
						<td>{{$credit->status}}</td>						
							<td>
								<a href="{{ url('punishCredit') }}/{{ $credit->id }}"><i class="fa fa-trash fa-2x" onclick="return confirm('¿Estas seguro de condonar este crédito?')" data-toggle="tooltip" title="Condonar Crédito"></i></a>
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
