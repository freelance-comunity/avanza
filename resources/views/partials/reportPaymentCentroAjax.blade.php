@extends('layouts.app')

@section('htmlheader_title')
Home
@endsection
@section('main-content')
@section('message_level')
Reportes
@endsection
@section('message_level_here')
Pagos
@endsection
<div class="row">
	<div class="col-md-12">
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">Historial de pagos Región Centro</h3>
			</div>  
			<div class="box-body">
				@if($recoverys->isEmpty())
				<div class="well text-center">Ho hay registros.</div>
				@else
				<div class="table-responsive">
					<table class="table" id="ajax">
						<thead class="bg-success">
							<th>Región</th>
							<th>Sucursal</th>
							<th>Promotor</th>
							<th>Concepto</th>
							<th>Cliente</th>
							<th>Folio crédito</th>
							
						</thead>
						
					</table>
				</div>
				@endif
			</div>
		</div>
	</div>
	@endsection
