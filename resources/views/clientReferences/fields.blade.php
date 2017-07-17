<!--- Firts Name Reference Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('firts_name_reference', 'Firts Name Reference:') !!}
    {!! Form::text('firts_name_reference', null, ['class' => 'form-control']) !!}
</div>

<!--- Last Name Reference Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('last_name_reference', 'Last Name Reference:') !!}
    {!! Form::text('last_name_reference', null, ['class' => 'form-control']) !!}
</div>

<!--- Mothers Last Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('mothers_last_name', 'Mothers Last Name:') !!}
    {!! Form::text('mothers_last_name', null, ['class' => 'form-control']) !!}
</div>

<!--- Phone Reference Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('phone_reference', 'Phone Reference:') !!}
    {!! Form::text('phone_reference', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
