@extends('layouts.app') @section('main-content') @section('message_level') Bovédas @endsection @section('message_level_here')
Lista de Bovédas @endsection
<div class="container">
	@php $users = App\User::all(); @endphp @include('flash::message')
	<div class="row">
		<h1 class="pull-left">Reporte de Bovédas</h1>
	</div>
	<div class="row">
		@if($users->isEmpty())
		<div class="well text-center">No hay registros.</div>
		@else
		<div class="table-responsive">
			<table class="table" id="example">
				<thead class="bg-success">
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th width="150px">Total</th>
				</thead>
				<tbody>
					@foreach ($users as $user) @php $vault = $user->vault; $vault_total = App\Models\Vault::all(); @endphp
					<tr>
						<td>{{ $user->name }}</td>
						<td>{{ $user->father_last_name }}</td>
						<td>{{ $user->mother_last_name }}</td>
						<td>${{ number_format($vault->ammount,2) }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@endif
	</div>
</div>
@endsection