<!--- Ammount Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('ammount', 'Ammount:') !!}
    {!! Form::text('ammount', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
