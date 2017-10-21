@php
$branch = $client->branch;
$location = $client->location;
$company= $client->company;
$aval= $client->aval;
$document= $client->document;
@endphp
@extends('layouts.app')

@section('main-content')
@section('message_level')
Clientes
@endsection
@section('message_level_here')
Detalles
@endsection
@section('contentheader_title')
Detalles del Cliente 
@endsection
<div class="container">
  <div class="box box-danger">
   <div class="box-header with-border">
    <div class="col-md-6">
     <div class="box box-widget widget-user">
      <div class="widget-user-header bg-black" style="background: url('../img/bg_profile2.jpg') center center;">
        <h3 class="widget-user-username">{{$client->firts_name}} {{$client->last_name}} {{$client->mothers_last_name}}</h3>
        <h5 class="widget-user-desc">SUCURSAL: {{$branch->name}}</h5>
      </div>
      <div class="widget-user-image"> 
        <a href="{{ url('/updatephoto') }}/{{$client->id}}"><img  style="border-radius: 50%; padding: 2px; width: 100px;" class="img-circle" src="{{ asset('/uploads/avatars') }}/{!! $client->avatar !!}" alt="User Avatar"></a>
      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">TELÉFONO</h5>
              <span class="description-text">{{$client->phone}}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">CURP</h5>
              <span class="description-text">{{ $client->curp}}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4">
            <div class="description-block">
              <h5 class="description-header">INE</h5>
              <span class="description-text">{{$client->ine}}</span>

            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <a href="{!! route('clients.edit', [$client->id]) !!}"><h3 style="color:#18bc9c; text-decoration: underline;"><i class="fa fa-user"></i> DATOS PERSONALES</h3></a>
    <div class="table-responsive">
      <table class="table table-striped">
        <tr>
          <th style="width: 10px">1</th>
          <th>ESTADO CIVIL:</th>
          <th>{{$client->civil_status}}</th>
        </tr>
        <tr>
          <td>2.</td>
          <td>DEPENDIENTES:</td>
          <td>
            {{$client->no_economic_dependent}}
          </td>
        </tr>
        <tr>
          <td>3.</td>
          <td>TIPO DE VIVIENDA:</td>
          <td>
            {{$client->type_of_housing}}
          </td>
        </tr>
        <tr>
          <td>4.</td>
          <td>MONTO MÁXIMO:</td>
          <td>
            {{$client->maximun_amount}}
          </td>
        </tr>
        @if ($client->warranty)
        <tr>
          <td>5.</td>
          <td>GARANTÍA:</td>
          <td>
            {{$client->warranty}}
          </td>
        </tr>
        @endif
        
      </table>
    </div>
  </div>
<label>&nbsp;</label> 
  @if (is_null($location))
  <div class="box-body">
   <h3>Este empleado no tiene datos de ubicación registrados.</h3> 
 </div>
 @else
 <a href="{!! route('clientLocations.edit', [$location->id]) !!}"><h3 style="color:#18bc9c; text-decoration: underline;"><i class="fa fa-home"></i> DOMICILIO DEL CLIENTE</h3></a>
 <!-- /.box-header -->
 <div class="box-body no-padding">
  <div class="row">
    @if ($location->latitude)
      <div class="col-md-8 col-sm-8">
      <div class="pad">
        <!-- Map will be created here -->
        <div id="map" style="height: 325px;"></div>
      </div>
      @include('clientLocations.script-map')
    </div>
    
    @endif
   
    <!-- /.col -->
    <div class="col-md-4 col-sm-4">
     <div class="table-responsive">
      <table class="table table-striped">
        <tr>
          <th style="width: 10px">CALLE:</th>
          <th>{{$location->street}}</th>
        </tr>
        <tr>
          <td>NÚMERO:</td>
          <td>
            {{$location->number}}
          </td>
        </tr>
        <tr>
          <td>COLONIA:</td>
          <td>
            {{$location->colony}}
          </td>
        </tr>
        <tr>
          <td>MUNICIPIO:</td>
          <td>
           {{$location->municipality}}
         </td>
       </tr>
       <tr>
        <td>ESTADO:</td>
        <td>
          {{$location->state}}
        </td>
      </tr>
      <tr>
        <td>COGIDO POSTAL:</td>
        <td>
          {{$location->postal_code}}
        </td>
      </tr>
      <tr>
        <td>REFERENCIAS:</td>
        <td>
          {{$location->references}}
        </td>
      </tr>
    </table>
  </div>
</div>
</div>
</div>  
@endif

@if (is_null($company))
<div class="box-body">
 <h3>Este empleado no tiene datos del negocio registrados.</h3> 
</div>
@else
<div class="row">
  <div class="container">
    <a href="{!! route('clientCompanies.edit', [$company->id]) !!}"><h3 style="color:#18bc9c; text-decoration: underline;"><i class="fa fa-building"></i> DOMICILIO DEL NEGOCIO: {{$company->name_company}}</h3>
    </div></a>
  </div>

  <!-- /.box-header -->
  <div class="box-body no-padding">
    <div class="row">
      <div class="col-md-8 col-sm-8">
        <div class="pad">
          <!-- Map will be created here -->
          <div id="mapa" style="height: 325px;"></div>
        </div>
        @include('clientCompanies.script-map')
      </div>
      <!-- /.col -->
      <div class="col-md-4 col-sm-4">
       <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th style="width: 10px">TELÉFONO:</th>
            <th>{{$company->phone_company}}</th>
          </tr>
          <tr>
            <th style="width: 10px">CALLE:</th>
            <th>{{$company->street_company}}</th>
          </tr>
          <tr>
            <td>NÚMERO:</td>
            <td>
              {{$company->number_company}}
            </td>
          </tr>
          <tr>
            <td>COLONIA:</td>
            <td>
              {{$company->colony_company}}
            </td>
          </tr>
          <tr>
            <td>MUNICIPIO:</td>
            <td>
             {{$company->municipality_company}}
           </td>
         </tr>
         <tr>
          <td>ESTADO:</td>
          <td>
            {{$company->state_company}}
          </td>
        </tr>
        <tr>
          <td>COGIDO POSTAL:</td>
          <td>
            {{$company->postal_code_company}}
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
</div>


@endif

@if (is_null($aval))
<div class="box-body">
  <a  style="margin-right: 25px" href="{!! route('client.avalClient', [$client->id])!!}"><h3>Este empleado no tiene aval registrado.</h3></a>
  
</div>
@else
<div class="col-md-12">
  <a href="{!! route('clientAvals.edit', [$aval->id]) !!}"><h3 style="color:#18bc9c; text-decoration: underline;"><i class="fa fa-male"></i> AVAL</h3></a>
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
@endif


@if (is_null($document))
<div class="box-body">
 <h3>Este empleado no tiene documentos registrado.</h3> 
</div>
@else
<div class="col-md-6">
  <div class="box box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">DOCUMENTOS</h3>
    </div>
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
</div>
</div>

@endsection