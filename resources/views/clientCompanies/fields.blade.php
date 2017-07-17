<!--- Name Company Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name_company', 'Name Company:') !!}
    {!! Form::text('name_company', null, ['class' => 'form-control']) !!}
</div>

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

<!--- Municipality Company Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('municipality_company', 'Municipality Company:') !!}
    {!! Form::text('municipality_company', null, ['class' => 'form-control']) !!}
</div>

<!--- Colony Company Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('colony_company', 'Colony Company:') !!}
    {!! Form::text('colony_company', null, ['class' => 'form-control']) !!}
</div>

<!--- Type Of Road Company Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('type_of_road_company', 'Type Of Road Company:') !!}
    {!! Form::text('type_of_road_company', null, ['class' => 'form-control']) !!}
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

<!--- Interior Number Company Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('interior_number_company', 'Interior Number Company:') !!}
    {!! Form::text('interior_number_company', null, ['class' => 'form-control']) !!}
</div>

<!--- Postal Code Company Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('postal_code_company', 'Postal Code Company:') !!}
    {!! Form::text('postal_code_company', null, ['class' => 'form-control']) !!}
</div>

<!--- Latitude Company Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('latitude_company', 'Latitude Company:') !!}
    {!! Form::text('latitude_company', null, ['class' => 'form-control']) !!}
</div>

<!--- Length Company Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('length_company', 'Length Company:') !!}
    {!! Form::text('length_company', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
