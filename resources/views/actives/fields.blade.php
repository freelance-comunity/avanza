<!--- Ammount Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('ammount', 'Ammount:') !!}
    {!! Form::text('ammount', null, ['class' => 'form-control']) !!}
</div>

<!--- Concept Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('concept', 'Concept:') !!}
    {!! Form::text('concept', null, ['class' => 'form-control']) !!}
</div>

<!--- Voucher Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('voucher', 'Voucher:') !!}
    {!! Form::text('voucher', null, ['class' => 'form-control']) !!}
</div>

<!--- Date Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control']) !!}
</div>

<!--- Type Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!--- Description Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
