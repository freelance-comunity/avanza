@extends('layouts.app')
@section('htmlheader_title')
Home
@endsection
@section('main-content')
@section('message_level')
Movimientos
@endsection
@section('message_level_here')
Detalles
@endsection
<div class="row">
	<div class="col-md-12">
		<div class="box box-danger">
			<div class="box-body">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#menu1"><i class="fa fa-reply"></i>Saldo Inicial</a></li>
				</ul>
				<div class="tab-content">
					<div id="menu1" class="tab-pane fade in active">
						<div class="table-responsive">
							<table class="table" id="movementsBeginningNorte">
								<thead class="bg-success">
									<th>Sucursal</th>
									<th>Usuario</th>
									<th>Monto</th>
									<th>Concepto</th>
									<th>Fecha/Hora asignación</th>
								</thead>
								
							</table>
						</div>
					</div>
				
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
