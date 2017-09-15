@extends('layouts.app')

@section('htmlheader_title')
Home
@endsection
@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">@section('contentheader_title')
					Panel de Control
				@endsection</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="container spark-screen">
					<div class="col-md-4"> 
						@php
						$user = Auth::user();
						$vault = $user->vault;
						@endphp  
						<div class="info-box bg-aqua">
							<span class="info-box-icon"><i class="fa fa-dollar"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">CAJA</span>
								<span class="info-box-number">${{ number_format($vault->ammount) }}</span>
								<div class="progress">
									<div class="progress-bar" style="width: 100%"></div>
								</div>
								<span class="progress-description">
								</span>
							</div>
						</div>
					</div>
					@if (Hash::check('micontraseña', Auth::user()->password))
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<div class="panel panel-default">
								<div class="panel-heading">Bienvenido</div>

								<div class="panel-body">
									{{ trans('adminlte_lang::message.logged') }}
									<br>
									Le invitamos a actualizar tu contraseña en el siguiente <a href="{{ url('profile') }}">LINK...</a>
								</div>
							</div>
						</div>
					</div>
					@endif
					@role('ejecutivo-de-credito')
					@include('partials.home.promoter')
					@endrole
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
