@extends('layouts.app')

@section('htmlheader_title')
Home
@endsection
@section('main-content')
@section('message_level')
Transferir
@endsection
@section('message_level_here')
Detalles
@endsection
<div class="row">
	<div class="col-md-12">
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">Realizar transferencia de cartera</h3>
			</div>  

			<div class="box-body">
				{!! Form::open(['url' => 'transferProcess','data-parsley-validate' => '']) !!}  
				<div class="form-group col-sm-6 col-lg-4">
					{!! Form::label('transmitter', 'Emisor:') !!}
					{!! Form::select('transmitter', $users,null,['class' => 'form-control input-lg']) !!}
				</div>
				<div class="form-group col-sm-6 col-lg-4">
					{!! Form::label('receiver', 'Receptor:') !!}
					{!! Form::select('receiver', $users,null,['class' => 'form-control input-lg']) !!}
				</div>

				<div class="form-group col-sm-12">
					{!! Form::submit('Transferir', ['class' => 'btn btn-lg btn-primary']) !!}
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	@endsection
