<!--- Ine Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('ine', 'Ine:') !!}
    {!! Form::text('ine', null, ['class' => 'form-control']) !!}
</div>

<!--- Curp Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('curp', 'Curp:') !!}
    {!! Form::text('curp', null, ['class' => 'form-control']) !!}
</div>

<!--- Rfc Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rfc', 'Rfc:') !!}
    {!! Form::text('rfc', null, ['class' => 'form-control']) !!}
</div>

<!--- Passport Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('passport', 'Passport:') !!}
    {!! Form::text('passport', null, ['class' => 'form-control']) !!}
</div>

<!--- Number Imss Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('number_imss', 'Number Imss:') !!}
    {!! Form::text('number_imss', null, ['class' => 'form-control']) !!}
</div>

<!--- Driver License Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('driver_license', 'Driver License:') !!}
    {!! Form::text('driver_license', null, ['class' => 'form-control']) !!}
</div>

<!--- Professional Id Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('professional_id', 'Professional Id:') !!}
    {!! Form::text('professional_id', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
