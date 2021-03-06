@extends('layouts.app') @section('main-content') @section('message_level') Gastos @endsection @section('message_level_here')
Lista de Gastos @endsection
<div class="container">
	@php $month = \Carbon\Carbon::now()->month; $expenditures_this_month = App\Models\Expenditure::where( DB::raw('MONTH(created_at)'),
	'=', date($month) )->get(); @endphp @include('flash::message')
	<div class="row">
		<h1 class="pull-left">Reporte de Gastos Mensual ${{ number_format($expenditures_this_month->sum('ammount'),2) }}</h1>
	</div>
	<div class="row">
		@if($expenditures_this_month->isEmpty())
		<div class="well text-center">No hay registros.</div>
		@else
		<div class="table-responsive">
			<table class="table" id="example">
				<thead class="bg-success">
					<th class="desc">CONCEPTO</th>
					<th>REGION</th>
					<th>SUCURSAL</th>
					<th class="desc">NOMBRE COLABORADOR</th>
					<th class="desc">FECHA</th>
					<th>TIPO DE GASTO</th>
					<th class="desc">DESCRIPCIÓN</th>
					<th>IMPORTE</th>
				</thead>
				<tbody>
					@foreach ($expenditures_this_month as $expenditure) @php $vault = $expenditure->vault; $user = DB::table('users')->where('id',
					'=', $vault->user_id)->first(); @endphp
					<tr>
						<td class="service">{{ $expenditure->concept }}</td>
						<td>{{$expenditure->region->name}}</td>
						<td>{{$expenditure->branch->name}}</td>
						<td class="desc">{{ $user->name }} {{ $user->father_last_name }} {{ $user->mother_last_name }}</td>
						<td class="desc">{{ $expenditure->date }}</td>
						@if ($expenditure->type)
						<td>{{$expenditure->type}}</td>
						@else
						<td>Sin especificar</td>
						@endif
						
						<td class="desc">{{ $expenditure->description }}</td>
						<td class="total">${{ number_format($expenditure->ammount,2) }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@endif
	</div>
</div>
@endsection
