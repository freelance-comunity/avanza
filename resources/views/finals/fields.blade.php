<!--- Date Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control']) !!}
</div>

<!--- Region Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('region', 'Region:') !!}
    {!! Form::text('region', null, ['class' => 'form-control']) !!}
</div>

<!--- Branch Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('branch', 'Branch:') !!}
    {!! Form::text('branch', null, ['class' => 'form-control']) !!}
</div>

<!--- Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Vault Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('vault', 'Vault:') !!}
    {!! Form::text('vault', null, ['class' => 'form-control']) !!}
</div>

<!--- Incomes Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('incomes', 'Incomes:') !!}
    {!! Form::text('incomes', null, ['class' => 'form-control']) !!}
</div>

<!--- Incomepayment Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('incomePayment', 'Incomepayment:') !!}
    {!! Form::text('incomePayment', null, ['class' => 'form-control']) !!}
</div>

<!--- Access Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('access', 'Access:') !!}
    {!! Form::text('access', null, ['class' => 'form-control']) !!}
</div>

<!--- Credit Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('credit', 'Credit:') !!}
    {!! Form::text('credit', null, ['class' => 'form-control']) !!}
</div>

<!--- Expenditures Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('expenditures', 'Expenditures:') !!}
    {!! Form::text('expenditures', null, ['class' => 'form-control']) !!}
</div>

<!--- Actives Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('actives', 'Actives:') !!}
    {!! Form::text('actives', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
