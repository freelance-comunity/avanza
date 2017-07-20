<!--- Ine Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('ine', 'Ine:') !!}
    {!! Form::text('ine', null, ['class' => 'form-control']) !!}
</div>

<!--- Curp Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('curp', 'Curp:') !!}
    {!! Form::text('curp', null, ['class' => 'form-control']) !!}
</div>

<!--- Proof Of Addres Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('proof_of_addres', 'Proof Of Addres:') !!}
    {!! Form::text('proof_of_addres', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
