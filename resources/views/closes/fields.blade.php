<!--- Name User Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name_user', 'Name User:') !!}
    {!! Form::text('name_user', null, ['class' => 'form-control']) !!}
</div>

<!--- Role User Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('role_user', 'Role User:') !!}
    {!! Form::text('role_user', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
