
@extends('layouts.app')

@section('htmlheader_title')
Home
@endsection
@section('main-content')
@section('message_level')
Salarios
@endsection
@section('message_level_here')
Detalles
@endsection
<div class="row">
	<div class="col-md-12">
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">Registrar Gastos</h3>
			</div>

			<div class="box-body">
				{!! Form::open(['url' => 'recordExpense','data-parsley-validate' => '',  'files' => 'true']) !!}
				<div class="form-group col-sm-6 col-lg-4">
					{!! Form::label('ammount', 'Monto:') !!}
					<input type="text" name="ammount" class="form-control input-lg" placeholder="ESCRIBE MONTO" required="required" data-parsley-trigger="input focusin" data-parsley-type="digits" data-parsley-maxlength="5">
					<input type="hidden" name="user_id" value="{{ $user->id }}">
				</div>
				<div class="form-group col-sm-6 col-lg-4">
					{!! Form::label('type', 'Tipo de Gasto:') !!}
					<select name="type" class="form-control input-lg">
						<option>Accesorios Celulares</option>
						<option>Amortización Vehículos</option>
						<option>Artículos de Limpieza</option>
						<option>Audio/Visual Marketing</option>
						<option>Bicicletas (Compra de)</option>
						<option>Cafetería</option>
						<option>Celulares (Compra de)</option>
						<option>Combustible</option>
						<option>Computadora y Accesorios (Compra de)</option>
						<option>Energía Eléctrica (Luz)</option>
						<option>Fotocopias</option>
						<option>Honorario de Terceros</option>
						<option>Impresoras (Compra de)</option>
						<option>Letreros y Anuncios Oficinas</option>
						<option>Mantenimiento Vehículos</option>
						<option>Mantenimiento/Adecuaciones Oficinas</option>
						<option>Mobiliario y Equipo Oficinas</option>
						<option>Motos (Compra de)</option>
						<option>Papelería y Artículos de Oficina</option>
						<option>Pasajes</option>
						<option>Recargar Celular</option>
						<option>Renta de Inmuebles</option>
						<option>Renta Internet y Telefonía Fija</option>
						<option>Servicio Agua Oficinas</option>
						<option>Software (Compra de)</option>
						<option>Toner o Cartuchos de Impresora</option>
						<option>Viáticos</option>
					</select>
				</div>
				<div class="form-group col-sm-6 col-lg-4">
					{!! Form::label('description', 'Descripción:') !!}
					<input type="text" name="description" placeholder="ESCRIBE DESCRIPCIÓN" required="required" data-parsley-trigger="input focusin" class="form-control input-lg">
				</div>
				
				<div class="form-group col-sm-6 col-lg-12">
					{!! Form::label('voucher', 'Coprobante:') !!}
					<input type="file" name="voucher" required="required" data-parsley-trigger="input focusin" class="form-control input-lg">
				</div>


					<div class="form-group col-sm-12 col-lg-12">
						{!! Form::submit('ASIGNAR', ['class' => 'btn btn-lg btn-block bg-primary']) !!}
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		@endsection
