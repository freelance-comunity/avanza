@php
$branch = $client->branch;
$location = $client->location;
$company= $client->company;
$aval= $client->aval;
$document= $client->document;
$references = $client->references;
$user = $client->user;
$region = $client->region;
@endphp
@extends('layouts.app')
@section('htmlheader_title')
Home
@endsection
@section('main-content')
@section('message_level')
Movimientos
@endsection
@section('message_level_here')
Detalles
@endsection
<div class="row">
	<div class="col-md-12">
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">Movimientos {{-- {{ $region_allocation->id }} --}}</h3>
			</div>  
			<div class="box-body">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#menu1"><i class="fa fa-user"></i> Datos Personales</a></li>
					<li><a data-toggle="tab" href="#menu2"><i class="fa fa-building-o"></i> Domicilio del Cliente</a></li>
					<li><a data-toggle="tab" href="#menu3"><i class="fa fa-building"></i> Domicilio del Negocio</a></li>
					<li><a data-toggle="tab" href="#menu4"><i class="fa fa-users"></i> Referencias</a></li>
					<li><a data-toggle="tab" href="#menu5"><i class="fa fa-user-plus"></i> Aval </a></li>
					{{-- <li><a data-toggle="tab" href="#menu6"><i class="fa fa-money"></i> Documentación</a></li> --}}
					
				</ul>
				<div class="tab-content">
					<div id="menu1" class="tab-pane fade in active">
						<div class="container">
							{{-- <div class="form-group col-sm-6 col-lg-6">
								<a target="_blank" href="{{ url('/updatephoto') }}/{{$client->id}}"><img  style="border-radius: 8px; padding: 2px; width: 250px; margin:2px; " class="img-circle" src="{{ asset('/uploads/avatars') }}/{!! $client->avatar !!}" alt="User Avatar"></a>		
							</div> --}}	
							<h2>{{$client->firts_name}} {{$client->last_name}} {{$client->mothers_last_name}}</h2>
							<div class="form-group col-sm-6 col-lg-6">
								
								<div class="list-group">
									<a  class="list-group-item active">FOLIO: {{$client->folio}}</a>
									<a  class="list-group-item ">REGION: {{$region->name}}</a>
									<a  class="list-group-item active">SUCURSAL: {{$branch->name}}</a>
									<a  class="list-group-item ">TELÉFONO: {{$client->phone}}</a>
									<a  class="list-group-item active">INE: {{$client->ine}}</a>
									<a  class="list-group-item ">CURP: {{$client->curp}}</a>
								</div>
							</div>
							<div class="form-group col-sm-6 col-lg-6">
								<div class="list-group">
									
									<a  class="list-group-item active">ESTADO CIVIL: {{$client->civil_status}}</a>
									<a  class="list-group-item ">DEPENDIENTES ECONOMICOS: {{$client->no_economic_dependent}}</a>
									<a  class="list-group-item active">TIPO DE VIVIENDA: {{$client->type_of_housing}}</a>
									<a  class="list-group-item">MONTO MAXIMO: {{$client->maximun_amount}}</a>
									@if ($client->warranty ==1 )
										<a  class="list-group-item active">GARANTÍA: {{$client->warranty}}</a>
									@else
									<a  class="list-group-item active">GARANTÍA: SIN GARANTÍA</a>
									@endif
								</div>
							</div>
							<div class="form-group col-sm-6 col-lg-12">
								<a class="btn btn-primary  btn-lg pull-right" href="{!! route('clients.edit', [$client->id]) !!}"><i></i> EDITAR</a>
							</div>
						</div>
					</div>
					<div id="menu2" class="tab-pane fade">
						<br>
						@if (is_null($location))
						<div class="box-body">
							<h3>Este empleado no tiene datos de ubicación registrados.</h3> 
						</div>
						@else
						<div class="form-group col-sm-6 col-lg-6">
							<div class="list-group">
								<a  class="list-group-item active">ESTADO: {{$location->state}}</a>
								<a  class="list-group-item">MUNICIPIO: {{$location->municipality}}</a>
								<a  class="list-group-item active">COLONIA: {{$location->colony}}</a>
							</div>
						</div>
						<div class="form-group col-sm-6 col-lg-6">
							<div class="list-group">
								<a  class="list-group-item active">CALLE: {{$location->street}}</a>
								<a  class="list-group-item">NÚMERO: {{$location->number}}</a>
								<a  class="list-group-item active">CODIGO POSTAL: {{$location->postal_code}}</a>
								<a  class="list-group-item">REFERENCIAS: {{$location->references}}</a>
							</div>
						</div>
						<div class="form-group col-sm-6 col-lg-12">
							<a class="btn btn-primary  btn-lg pull-right" href="{!! route('clientLocations.edit', [$location->id]) !!}"><i></i> EDITAR</a>
						</div>
						@endif
					</div>
					<div id="menu3" class="tab-pane fade">
						<br>
						@if (is_null($company))
						<div class="box-body">
							<h3>Este empleado no tiene datos de ubicación de la empresa registrados.</h3> 
						</div>
						@else
						<div class="form-group col-sm-6 col-lg-6">
							<div class="list-group">
								<a  class="list-group-item active">NOMBRE DEL NEGOCIO: {{$company->name_company}}</a>
								<a  class="list-group-item ">ESTADO: {{$company->street_company}}</a>
								<a  class="list-group-item active">MUNICIPIO: {{$company->municipality_company}}</a>
								<a  class="list-group-item ">COLONIA: {{$company->colony_company}}</a>
							</div>
						</div>
						<div class="form-group col-sm-6 col-lg-6">
							<div class="list-group">
								<a  class="list-group-item active">CALLE: {{$company->street_company}}</a>
								<a  class="list-group-item ">NÚMERO: {{$company->number_company}}</a>
								<a  class="list-group-item active">CODIGO POSTAL: {{$company->postal_code_company}}</a>
								<a  class="list-group-item ">TELÉFONO DEL NEGOCIO: {{$company->phone_company}}</a>
							</div>
						</div>
						<div class="form-group col-sm-6 col-lg-12">
							<a class="btn btn-primary  btn-lg pull-right" href="{!! route('clientCompanies.edit', [$company->id]) !!}"><i></i> EDITAR</a>
						</div>
						@endif
					</div>
					<div id="menu4" class="tab-pane fade">
						<br>
						@if ($references->isEmpty())
						<div class="box-body">
							<a  style="margin-right: 25px" href="{!! route('client.referencesClient', [$client->id])!!}"><h3>Este cliente no tiene referencias.</h3></a>
						</div>
						@else
						<div class="col-md-12">

							@if ($references->count() <2)
							<a class="btn btn-success" href="{!! route('client.referencesClient', [$client->id])!!}"><span>agregar otra referencia</span></a>
							@endif

							<div class="table-responsive">
								<table class="table table-striped">
									<tr>
										<th style="width: 10px">NOMBRE</th>
										<th>APELLIDO PATERNO</th>
										<th>APELLIDO MATERNO</th>
										<th>TELÉFONO</th>
										<th>PARENTEZCO</th>
										<th>Editar</th>
									</tr>
									@foreach ($references as $reference)
									<tr>
										<th style="width: 10px">{{$reference->name_reference}}</th>
										<th>{{$reference->last_name_reference}}</th>
										<th>{{$reference->mothers_name_reference}}</th>
										<th>{{$reference->phone_reference}}</th>
										<th>{{$reference->relationship}}</th>
										<th><a href="{!! route('clientReferences.edit', [$reference->id]) !!}"><i class="glyphicon  glyphicon-edit  "></i></a></th>
									</tr>
									@endforeach  
								</table>
							</div>
						</div>
						@endif
					</div>
					<div id="menu5" class="tab-pane fade">
						<br>
						@if (is_null($aval))
						<div class="box-body">
							<a  style="margin-right: 25px" href="{!! route('client.avalClient', [$client->id])!!}"><h3>Este cliente no tiene aval registrado.</h3></a>

						</div>
						@else
						<div class="col-md-12">
							
							<div class="table-responsive">
								<table class="table table-striped">
									<tr>
										<th style="width: 10px">NOMBRE:</th>
										<th>APELLIDO PATERNO:</th>
										<th>APELLIDO MATERNO:</th>
										<th>CURP:</th>
										<th>TELÉFONO:</th>
										<th>ESTADO CIVIL:</th>
										<th>ESCOLARIDAD</th>
									</tr>
									<tr>
										<th style="width: 10px">{{$aval->name_aval}}</th>
										<th>{{$aval->last_name_aval}}</th>
										<th>{{$aval->mothers_name_aval}}</th>
										<th>{{$aval->curp_aval}}</th>
										<th>{{$aval->phone_aval}}</th>
										<th>{{$aval->civil_status_aval}}</th>
										<th>{{$aval->scholarship_aval}}</th>
									</tr>

								</table>
							</div>
							<H4><span>DIRECCIÓN DEL AVAL</span> </H4>
							<div class="table-responsive">
								<table class="table table-striped">
									<tr>
										<th style="width: 10px">CALLE:</th>
										<th>NÚMERO DE CASA:</th>
										<th>COLONIA:</th>
										<th>MUNICIPIO:</th>
										<th>ESTADO:</th>
										<th>CODIGO POSTAL:</th>
									</tr>
									<tr>
										<th style="width: 10px">{{$aval->street_aval}}</th>
										<th>{{$aval->number_aval}}</th>
										<th>{{$aval->colony_aval}}</th>
										<th>{{$aval->municipality_aval}}</th>
										<th>{{$aval->state_aval}}</th>
										<th>{{$aval->postal_code_aval}}</th>
									</tr>
								</table>
							</div>
						</div>
						<div class="form-group col-sm-6 col-lg-12">
							<a class="btn btn-primary  btn-lg pull-right" href="{!! route('clientAvals.edit', [$aval->id]) !!}"><i></i> EDITAR</a>
						</div>
						@endif

					</div>
				{{-- 	<div id="menu6" class="tab-pane fade">
						<br>
						@if (is_null($document))
						<div class="box-body">
							<h3>Este cliente no tiene documentos registrado.</h3> 
						</div>
						@else
						<div class="col-md-6">
							<div class="box box-solid">
								<!-- /.box-header -->
								<div class="box-body">
									<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
										<ol class="carousel-indicators">
											<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
											<li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
											<li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
										</ol>
										<div class="carousel-inner">
											<div class="item active">
												<img src="{{ asset('/uploads/documents') }}/{!! $document->ine !!}"" alt="Second slide">
												<div class="carousel-caption">
													<h1 style="background-color: rgba(255,0,0,0.5);"><a href="{{ url('/ine') }}/{{$document->id}}"><strong>EDITAR INE</strong></a></h1>
												</div>
											</div>
											<div class="item">
												<img src="{{ asset('/uploads/documents') }}/{!! $document->curp !!}"" alt="Second slide">
												<div class="carousel-caption">
													<h1 style="background-color: rgba(255,0,0,0.5);"><a href="{{ url('/curps') }}/{{$document->id}}"><strong>EDITAR CURP</strong></a></h1>
												</div>
											</div>
											<div class="item">
												<img src="{{ asset('/uploads/documents') }}/{!! $document->proof_of_addres !!}"" alt="Third slide">
												<div class="carousel-caption">
													<h1 style="background-color: rgba(255,0,0,0.5);"><a href="{{ url('/updatephotos') }}/{{$document->id}}"><strong>EDITAR COMPROBANTE DE DOMICILIO</strong></a></h1>
												</div>
											</div>
										</div>
										<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
											<span class="fa fa-angle-left"></span>
										</a>
										<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
											<span class="fa fa-angle-right"></span>
										</a>
									</div>
								</div>
								<!-- /.box-body -->
							</div>
							<!-- /.box -->
						</div>



						<!-- /.col -->
						<div class="col-md-6">
							<h3>Descarga</h3>
							<a href="{{ url('pdf') }}/{{ $client->id }}"><i class="fa fa-file-pdf-o fa-5x"></i></a>
						</div>
						@endif
					</div> --}}


				</div>
			</div>
		</div>
	</div>
</div>
@endsection
