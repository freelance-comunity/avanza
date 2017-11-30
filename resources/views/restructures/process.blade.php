@extends('layouts.app')

@section('main-content')
@section('message_level')
Reestructuración de créditos
@endsection
@section('message_level_here')
Crear
@endsection
@php
$user_allocation = Auth::user();
$region_allocation = $user_allocation->region;
$collection = App\Role::all();
$role = $collection->where('name', 'ejecutivo-de-credito')->first();
//$users = $role->users;
$filtered = App\User::where('id', '!=', Auth::id())->get();
$users = $filtered->where('region_id', $region_allocation->id);
@endphp
<div class="box box-danger">
	<div class="box-header with-border">
		<h3 class="box-title">Proceso de reestructura de créditos</h3>
	</div>

	<div class="box-body">
		<div class="row">
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-aqua"><i class="ion ion-cash"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Capital</span>
						<span class="info-box-number">${{number_format($global_capital,2)}}</span>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-green"><i class="ion ion-arrow-graph-up-right"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Interés</span>
						<span class="info-box-number">${{number_format($global_interest,2)}}</span>
					</div> 
				</div>
			</div>    
			<div class="clearfix visible-sm-block"></div>

			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-red"><i class="ion ion-social-usd"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Moratorio</span>
						<span class="info-box-number">${{number_format($global_moratorium)}}</span>
					</div>
				</div>
			</div>
		</div>
		
		<div class="form-group col-sm-6 col-lg-4">
			{!! Form::label('condone_capital', 'Condonar Capital (%):') !!}
			{!! Form::text('condone_capital',null, ['class' => 'form-control input-lg ','required' => 'required',
			'data-parsley-trigger ' => 'input focusin','onchange'=>'multiplicar()' ,'id'=>'condone_capital']) !!}
		</div>
		<input type="hidden" name="capital" id="capital"  value="{{$global_capital}}" onChange="multiplicar()">

		<div class="form-group col-sm-6 col-lg-4">
			{!! Form::label('condone_interest', 'Condonar Interes (%):') !!}
			{!! Form::text('condone_interest', null, ['class' => 'form-control input-lg ','required' => 'required',
			'data-parsley-trigger ' => 'input focusin','onchange'=>'multiplicar()','id'=>'condone_interest']) !!}
		</div>
		<input type="hidden" name="interest" id="interest"  value="{{$global_interest}}" onChange="multiplicar()" >

		<div class="form-group col-sm-6 col-lg-4">
			{!! Form::label('condone_moratorium', 'Condonar Moratorio (%):') !!}
			{!! Form::text('condone_moratorium', null, ['class' => 'form-control input-lg ','required' => 'required',
			'data-parsley-trigger ' => 'input focusin','onchange'=>'multiplicar()','id'=>'condone_moratorium']) !!}
		</div>
		<input type="hidden" name="moratorium" id="moratorium"  value="{{$global_moratorium}}" onChange="multiplicar()">

		{!! Form::open(['url' => 'reestructureCredit','data-parsley-validate' => '','files'=>'true']) !!}
		{{ csrf_field() }}
		<div class="form-group col-sm-6 col-lg-4">
			{!! Form::label('ammount', 'Monto') !!}
			<input type="text" name="ammount" id="ammount" class="form-control input-lg" readonly="readonly">
		</div>
		<div class="form-group col-sm-6 col-lg-4">
			{!! Form::label('date', 'Fecha') !!}
			<input type="date" value="{{ Carbon\Carbon::now()->toDateString() }}" name="date" class="form-control input-lg" id="date" required="required" data-parsley-trigger="input focusin" >
		</div>

		<div class="form-group col-sm-6 col-lg-4">
			{!! Form::label('dues', 'No. Cuotas:') !!}
			{!! Form::text('dues',null, [
				'class' => 'form-control input-lg',
				'placeholder' => 'NO. CUOTAS',
				'data-parsley-trigger ' => 'input focusin',

				]) !!}
			</div>
			<div class="form-group col-sm-6 col-lg-4">
				{!! Form::label('interest_rate', 'Interés:') !!}
				{!! Form::text('interest_rate',null, [
					'class' => 'form-control input-lg',
					'placeholder' => 'INTERÉS',
					'data-parsley-trigger ' => 'input focusin',

					]) !!}
				</div>
				<input type="hidden" name="branch" value="{{$client->branch->name}}">
			{{-- 	<input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}
				 <div class="form-group col-sm-6 col-lg-8">
              {!! Form::label('user_id', 'Nombre del Ejecutivo:') !!}
              <select name="user_id" class="form-control input-lg">
                <option selected="">Elige Promotor</option>
                @foreach ($users as $user)
                @if ($user->hasRole(['ejecutivo-de-credito']))
                <option value=" {{ $user->id  }}">
                  {{ $user->name }} {{ $user->father_last_name }} {{ $user->mother_last_name }}
                </option>
                @endif   
                @endforeach
              </select>
            </div>
				{{-- <input type="hidden" name="adviser" value="{{ Auth::user()->name }} {{ Auth::user()->father_last_name }} {{ Auth::user()->mother_last_name }}"> --}}
				<input type="hidden" name="client_id" value="{{ $client->id}}">
				<input type="hidden" name="branch_id" value="{{ $client->branch->id }}">
				<input type="hidden" name="region_id" value="{{ $client->branch->region->id }}">
				<input type="hidden" name="periodicity" value="REESTRUCTURADOS">
				<input type="hidden" name="firts_name" value="{{$client->firts_name}}">
				<input type="hidden" name="last_name" value="{{$client->last_name}}">
				<input type="hidden" name="mothers_last_name" value="{{$client->mothers_last_name}}">
				<input type="hidden" name="curp" value="{{$client->curp}}">
				<input type="hidden" name="ine" value="{{$client->ine}}">
				<div class="form-group col-sm-6 col-lg-4">
					{!! Form::label('collection_period', 'Horario Sugerido de Cobro:') !!}
					{!! Form::select('collection_period',['MAÑANA'=>'MAÑANA','MEDIO DÍA'=>'MEDIO DIA','TARDE'=>'TARDE'],null, [
						'style' => 'text-transform:uppercase',
						'class' => 'form-control input-lg',
						'required'=>'required',
						'data-parsley-trigger ' => 'input focusin',
						'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
					</div>
					<div class="form-group col-sm-6 col-lg-4">
						{!! Form::label('firm', 'Firma:') !!}
						{!! Form::text('firm',null, [
							'class' => 'form-control input-lg', 
							'id'    => 'signature',
							'data-parsley-trigger ' => 'input focusin',
							'readonly'
							]) !!}
						</div>
						
						<div class="form-group col-sm-12 col-lg-12">
							<div id="signature-pad" class="m-signature-pad">
								<div class="m-signature-pad--body">
									<canvas style="border: 1px solid black; height: 200px;"></canvas>
								</div>
								<div class="m-signature-pad--footer">
									<button type="button" class="btn btn-lg btn-info clear" data-action="clear">Limpiar</button>
									<button type="button" class="btn btn-lg btn-success save" data-action="save">Usar</button>
								</div>
							</div>

						</div>

						@include('credits.signature')
						<div class="form-group col-sm-12">
							{!! Form::submit('Guardar', ['class' => 'btn btn-lg btn-primary']) !!}
						</div>
						{!! Form::close() !!}
					</div>
				</div>

				<script type="text/javascript">
					function multiplicar(){
						m1 = document.getElementById("condone_capital").value;
						m2 = document.getElementById("capital").value;
						m3 = document.getElementById("condone_interest").value;
						m4 = document.getElementById("interest").value;
						m5= document.getElementById("condone_moratorium").value;
						m6 = document.getElementById("moratorium").value;
						o_capital = m1/100;
						r1 = o_capital*m2;
						rest1 = m2-r1;

						o_interets = m3/100;
						r2 = o_interets*m4;
						rest2 = m4-r2;

						o_moratorium = m5/100;
						r3 = o_moratorium*m6;
						rest3 = m6-r3;
						total  = rest1 + rest2 + rest3;
						document.getElementById("ammount").value = Math.ceil(total);
					}
				</script>


				@endsection
