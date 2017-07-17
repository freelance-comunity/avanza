<!--- Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Last Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<!--- Mothers Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('mothers_name', 'Mothers Name:') !!}
    {!! Form::text('mothers_name', null, ['class' => 'form-control']) !!}
</div>

<!--- Birthdate Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('birthdate', 'Birthdate:') !!}
    {!! Form::text('birthdate', null, ['class' => 'form-control']) !!}
</div>

<!--- Curp Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('curp', 'Curp:') !!}
    {!! Form::text('curp', null, ['class' => 'form-control']) !!}
</div>

<!--- Phone Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!--- Civil Status Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('civil_status', 'Civil Status:') !!}
    {!! Form::text('civil_status', null, ['class' => 'form-control']) !!}
</div>

<!--- Scholarship Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('scholarship', 'Scholarship:') !!}
    {!! Form::text('scholarship', null, ['class' => 'form-control']) !!}
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

<!--- Street Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('street', 'Street:') !!}
    {!! Form::text('street', null, ['class' => 'form-control']) !!}
</div>

<!--- Number Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('number', 'Number:') !!}
    {!! Form::text('number', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
