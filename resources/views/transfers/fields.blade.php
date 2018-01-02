<!--- Ammount Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('ammount', 'Ammount:') !!}
    {!! Form::text('ammount', null, ['class' => 'form-control']) !!}
</div>

<!--- Date Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control']) !!}
</div>

<!--- Transsmitter Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('transsmitter', 'Transsmitter:') !!}
    {!! Form::text('transsmitter', null, ['class' => 'form-control']) !!}
</div>

<!--- Receiver Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('receiver', 'Receiver:') !!}
    {!! Form::text('receiver', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
