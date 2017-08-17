@extends('layouts.app')

@section('htmlheader_title')
Home
@endsection
@section('contentheader_title')
Panel de Control
@endsection

@section('main-content')
<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Bienvenido</div>

				<div class="panel-body">
					{{ trans('adminlte_lang::message.logged') }}
					<br>
					@if (Hash::check('micontraseña', Auth::user()->password))
					Te invitamos a actualizar tu contraseña en el siguiente <a href="{{ url('profile') }}">LINK...</a>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
