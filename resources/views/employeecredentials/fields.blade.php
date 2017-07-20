<div class="box box-danger">
    <div class="box-header with-border">
    <h3 class="box-title">EDITAR IDENTIFICACIONES</h3>
    </div>
    <div class="box-body">

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('ine', 'INE:') !!}
            {!! Form::text('ine', null, ['class' => 'form-control input-lg']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('curp', 'CURP:') !!}
            {!! Form::text('curp', null, ['class' => 'form-control input-lg']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('rfc', 'RFC:') !!}
            {!! Form::text('rfc', null, ['class' => 'form-control input-lg']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('passport', 'PASAPORTE:') !!}
            {!! Form::text('passport', null, ['class' => 'form-control input-lg']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('number_imss', 'IMSS:') !!}
            {!! Form::text('number_imss', null, ['class' => 'form-control input-lg']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('driver_license', 'Licencia de Conducir:') !!}
            {!! Form::text('driver_license', null, ['class' => 'form-control input-lg']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('professional_id', 'Cédula Profesional:') !!}
            {!! Form::text('professional_id', null, ['class' => 'form-control input-lg']) !!}
        </div>

        <div class="form-group col-sm-12">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>
