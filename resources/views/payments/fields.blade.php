<!--- Number Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('number', 'Number:') !!}
    {!! Form::text('number', null, ['class' => 'form-control']) !!}
</div>

<!--- Day Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('day', 'Day:') !!}
    {!! Form::text('day', null, ['class' => 'form-control']) !!}
</div>

<!--- Date Payment Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('date_payment', 'Date Payment:') !!}
    {!! Form::text('date_payment', null, ['class' => 'form-control']) !!}
</div>

<!--- Ammount Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('ammount', 'Ammount:') !!}
    {!! Form::text('ammount', null, ['class' => 'form-control']) !!}
</div>

<!--- Capital Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('capital', 'Capital:') !!}
    {!! Form::text('capital', null, ['class' => 'form-control']) !!}
</div>

<!--- Interest Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('interest', 'Interest:') !!}
    {!! Form::text('interest', null, ['class' => 'form-control']) !!}
</div>

<!--- Moratorium Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('moratorium', 'Moratorium:') !!}
    {!! Form::text('moratorium', null, ['class' => 'form-control']) !!}
</div>

<!--- Total Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::text('total', null, ['class' => 'form-control']) !!}
</div>

<!--- Payment Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('payment', 'Payment:') !!}
    {!! Form::text('payment', null, ['class' => 'form-control']) !!}
</div>

<!--- Status Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
