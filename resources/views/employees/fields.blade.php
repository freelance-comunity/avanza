<!--- Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Mother Last Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('mother_last_name', 'Mother Last Name:') !!}
    {!! Form::text('mother_last_name', null, ['class' => 'form-control']) !!}
</div>

<!--- Father Last Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('father_last_name', 'Father Last Name:') !!}
    {!! Form::text('father_last_name', null, ['class' => 'form-control']) !!}
</div>

<!--- Address Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!--- Latitude Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('latitude', 'Latitude:') !!}
    {!! Form::text('latitude', null, ['class' => 'form-control']) !!}
</div>

<!--- Length Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('length', 'Length:') !!}
    {!! Form::text('length', null, ['class' => 'form-control']) !!}
</div>

<!--- Phone Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!--- Email Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!--- Branch Id Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('branch_id', 'Branch Id:') !!}
    {!! Form::text('branch_id', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
