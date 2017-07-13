<!--- Country Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('country', 'Country:') !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<!--- State Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('state', 'State:') !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
</div>

<!--- Municipality Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('municipality', 'Municipality:') !!}
    {!! Form::text('municipality', null, ['class' => 'form-control']) !!}
</div>

<!--- Colony Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('colony', 'Colony:') !!}
    {!! Form::text('colony', null, ['class' => 'form-control']) !!}
</div>

<!--- Type Of Road Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('type_of_road', 'Type Of Road:') !!}
    {!! Form::text('type_of_road', null, ['class' => 'form-control']) !!}
</div>

<!--- Name Road Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name_road', 'Name Road:') !!}
    {!! Form::text('name_road', null, ['class' => 'form-control']) !!}
</div>

<!--- Outdoor Number Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('outdoor_number', 'Outdoor Number:') !!}
    {!! Form::text('outdoor_number', null, ['class' => 'form-control']) !!}
</div>

<!--- Interior Number Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('interior_number', 'Interior Number:') !!}
    {!! Form::text('interior_number', null, ['class' => 'form-control']) !!}
</div>

<!--- Postal Code Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('postal_code', 'Postal Code:') !!}
    {!! Form::text('postal_code', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
