<!--- Late Payment Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('late_payment', 'Late Payment:') !!}
    {!! Form::text('late_payment', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
