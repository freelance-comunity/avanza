@extends('layouts.app')

@section('main-content')
@section('message_level')
Créditos
@endsection
@section('message_level_here')
Lista de créditos
@endsection
<style media="screen">
html {
  font-family: Lato, 'Helvetica Neue', Arial, Helvetica, sans-serif;
  font-size: 14px;
}

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
{{-- Credits all --}}
<div class="container">
	<div class="row">
		<h1 class="pull-left">Selecciona los créditosa a reestructurar</h1>
	</div>
	<div class="row">
		@if($credits->isEmpty())
		<div class="well text-center">No se encontraron créditos.</div>
		@else
		<div class="table-responsive">
      {!! Form::open(['url' => 'consolidate','data-parsley-validate' => '']) !!}
      {{ csrf_field() }}
			<table class="table"  id="example">
					<thead class="bg-primary">
            <th>#</th>
						<th>Folio</th>
						<th>Cliente</th>
						<th>Fecha de Contrato</th>
						<th>Sucursal</th>
						<th>$ Monto</th>
						<th>No. Cuotas</th>
						<th>Total Capital</th>
            <th>Total Intereses</th>
            <th>Total Mora</th>
            <th>Total por Restante</th>
						<th>Estatus</th>
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
              <td>
                <label class="custom-control custom-checkbox">
                    <input type="checkbox" data-parsley-multiple="checkbox" data-parsley-mincheck="1" data-parsley-required data-parsley-error-message="Por favor selecciona al menos un crédito" name="rows[{{$credit->id}}][id]" value="{{$credit->id}}" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                </label>
              </td>
							<td>{!! $credit->folio !!}</td>
							<td>{!! $credit->firts_name !!} {!! $credit->last_name !!} {!! $credit->mothers_last_name !!}</td>
							<td>{!! strtoupper($credit->date->format('d F Y')) !!}</td>
							<td>{!! $credit->branch !!}</td>
							<td>${!! number_format($credit->ammount, 2) !!}</td>
							<td>{!! $credit->dues !!}</td>
							<td class="bg-primary">{{ $late_capital }}</td>
              <td class="bg-warning">{{ $late_interest }}</td>
              <td class="bg-danger">{{ $late_moratorium }}</td>
              <td class="bg-green">{{ $late_total }}</td>
							<td>{{ $credit->debt['status'] }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
        <div class="form-group col-sm-6 col-lg-4">
          <input type="submit" value="Consolidar" class="btn btn-lg uppercase btn-success">
        </div>
			</div>
{!! Form::close() !!}
			@endif
		</div>
	</div>
	@endsection
