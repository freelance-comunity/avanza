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
				<h3 class="box-title">Registrar Inversión en Activos</h3>
			</div>

			<div class="box-body">
				{!! Form::open(['url' => 'recordActive','data-parsley-validate' => '',  'files' => 'true']) !!}
				<div class="form-group col-sm-6 col-lg-4">
					{!! Form::label('ammount', 'Monto:') !!}
					<input type="text" name="ammount" class="form-control input-lg" placeholder="ESCRIBE MONTO" required="required" data-parsley-trigger="input focusin" data-parsley-type="digits" data-parsley-maxlength="5">
					<input type="hidden"  name="user_id" value="{{ Auth::user()->id }}">
				</div>
        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('type', 'Tipo de Inversión:') !!}
            <select name="type" class="form-control input-lg">
              <option>Accesorios Celulares</option>
              <option>Amortiación Vehículos</option>
              <option>Bicicletas</option>
              <option>Celulares</option>
              <option>Computadoras</option>
              <option>Impresoras</option>
              <option>Letreros y Anucios Oficinas</option>
              <option>Mantenimiento/adecuaciones Oficinas</option>
              <option>Moviliario y Equipos Oficinas</option>
              <option>Motos</option>
              <option>Software</option>
            </select>
        </div>
				<div class="form-group col-sm-6 col-lg-4">
					{!! Form::label('description', 'Descripción:') !!}
					<input type="text" name="description" placeholder="ESCRIBE DESCRIPCIÓN" required="required" data-parsley-trigger="input focusin" class="form-control input-lg">
				</div>
				<input type="hidden"  name="user_id" value="{{ Auth::user()->id }}">
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
