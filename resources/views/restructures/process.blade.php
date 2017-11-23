@extends('layouts.app')

@section('main-content')
@section('message_level')
Reestructura de créditos
@endsection
@section('message_level_here')
Crear
@endsection
<div class="box box-danger">
	<div class="box-header with-border">
		<h3 class="box-title">Proceso de reestructura de créditos</h3>
	</div>

	<div class="box-body">
		<div class="row">
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Capital</span>
						<span class="info-box-number">${{number_format($global_capital,2)}}</span>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-green"><i class="fa fa-google-plus"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Interes</span>
						<span class="info-box-number">${{number_format($global_interest,2)}}</span>
					</div> 
				</div>
			</div>    
			<div class="clearfix visible-sm-block"></div>

			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-red"><i class="ion ion-ios-cart-outline"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Moratorio</span>
						<span class="info-box-number">${{number_format($global_moratorium)}}</span>
					</div>
				</div>
			</div>
		</div>
		<input type="hidden" name="capital" id="capital" value="{{$global_capital}}">

		<div class="form-group col-sm-6 col-lg-4">
			{!! Form::label('condone_capital', 'Condonar Capital:') !!}
			{!! Form::text('condone_capital', 0, ['class' => 'form-control input-lg ','required' => 'required',
			'data-parsley-trigger ' => 'input focusin','onchange'=>'calcular()' ,'id'=>'condone_capital']) !!}
		</div>
		
		<div class="form-group col-sm-6 col-lg-4">
			{!! Form::label('condone_interest', 'Condonar Interes:') !!}
			{!! Form::text('condone_interest', 0, ['class' => 'form-control input-lg ','required' => 'required',
			'data-parsley-trigger ' => 'input focusin','onchange'=>'sumar(this.value);']) !!}
		</div>
		<div class="form-group col-sm-6 col-lg-4">
			{!! Form::label('condone_moratorium', 'Condonar Moratorio:') !!}
			{!! Form::text('condone_moratorium', 0, ['class' => 'form-control input-lg ','required' => 'required',
			'data-parsley-trigger ' => 'input focusin','onchange'=>'sumar(this.value);']) !!}
		</div>

		{!! Form::label('total', 'Total a pagar:') !!}  
		{!! Form::text('total', null, ['class' => 'form-control input-lg', 'id' => 'totaln', 'readonly' => 'readonly']) !!}
		<span>El resultado es: </span> <span id="spTotal"></span>
		<div class="form-group col-sm-12">
			{!! Form::submit('Guardar', ['class' => 'btn btn-lg btn-primary']) !!}
		</div>
	</div>
</div>

<script>
	function sumar (valor) {
		var total = 0;	
    valor = parseInt(valor); // Convertir el valor a un entero (número).

    total = document.getElementById('spTotal').innerHTML;

    // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
    total = (total == null || total == undefined || total == "") ? 0 : total;

    /* Esta es la suma. */
    total = (parseInt(total) + parseInt(valor));

    // Colocar el resultado de la suma en el control "span".
    document.getElementById('spTotal').innerHTML = total;
}
</script>

<script>
	function calcular()
	{
		condone_capital = eval(document.getElementById('condone_capital').value);
		document.getElementById('capital').value=capital;
		total = condone_capital + capital;
		var formatter = new Intl.NumberFormat('en-US', {
			style: 'currency',
			currency: 'USD',
			minimumFractionDigits: 2,
		});
		
		document.getElementById('totaln').value=formatter.format(Math.ceil(total));       
	}
</script>
@endsection
