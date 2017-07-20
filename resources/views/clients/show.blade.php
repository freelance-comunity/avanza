@php
$branch= $client->branch;

@endphp
@extends('layouts.app')

@section('main-content')
@section('contentheader_title')
DETALLES DEL CLIENTE
@endsection
<div class="container">
  <div class="box box-danger">
      <div class="box-header with-border">
        <div class="row">
            <div class="col-md-6">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-black" style="background: url('../img/b.jpeg') center center;">
                  <h3 class="widget-user-username"><strong>{{$client->firts_name}}  {{$client->last_name}} {{$client->mothers_last_name}}</strong></h3>
                  <h5 class="widget-user-desc">{{$branch->name}}</h5>
              </div>
              <div class="widget-user-image">
                 <img src="{{ asset('/uploads/avatars') }}/{!! $client->avatar !!}" width="140" height="140" border="0" class="img-circle">
             </div>
             <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                      <h5 class="description-header">CURP</h5>
                      <span class="description-text">{{$client->curp}}</span>
                  </div>
                  <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">INE</h5>
                    <span class="description-text">{{$client->ine}}</span>
                </div>
                <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4">
              <div class="description-block">
                <h5 class="description-header">TELÉFONO</h5>
                <span class="description-text">{{$client->phone}}</span>
            </div>
            <!-- /.description-block -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
</div>
<!-- /.widget-user -->
</div>


<div class="col-md-6">           
  <h3 class="box-title">DATOS PERSONALES</h3>
  <!-- /.box-header -->
  <table class="table">
    <tr>
      <th style="width: 10px">1.</th>
      <th>ESTADO CIVIL</th>
      <th>{{$client->civil_status}}</th>
  </tr>
  <tr>
      <td>2.</td>
      <td>ESCOLARIDAD</td>
      <td>
        {{$client->scholarship}}
    </td>
</tr>
<tr>
  <td>3.</td>
  <td>DEPENDIENTES</td>
  <td>
    {{$client->no_economic_dependent}}
</td>
</tr>
<tr>
  <td>4.</td>
  <td>NO. FAMILIAS</td>
  <td>
    {{$client->no_familys}}
</td>
</tr>
<tr>
  <td>5.</td>
  <td>TIPO DE VIVIENDA</td>
  <td>
    {{$client->type_of_housing}}
</td>
</tr>
</table>
</div>



</div>
</div>
</div>
</div>
<div class="container">
  <div class="box box-danger">
      <div class="box-header with-border">
        <div class="row">
            <div class="col-md-4">
                <ul class="timeline">
                    <li>
                        <!-- timeline icon -->
                        <i class="fa fa-map-marker bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#">UBICACIÓN DE CASA</a></h3>

                            <div class="timeline-body">
                              CALLE: {{$clientLocation->street}}<br>
                              NÚMERO: {{$clientLocation->number}}<br>
                              COLONIA: {{$clientLocation->colony}}<br>
                              MUNICIPIO: {{$clientLocation->municipality}}<br>
                              ESTADO: {{$clientLocation->state}}<br>
                              CODIGO POSTAL: {{$clientLocation->postal_code}}<br>
                              REFERENCIAS: {{$clientLocation->references}}
                          </div>
                      </div>
                  </li>

              </ul>
          </div> 
          <div class="timeline-item">
            <div class="timeline-body">
                <div class="container" style="width: 100%;
                margin: 0 auto;
                margin-top:5px;">
                <div id="map_container" style="position: relative;"></div>
                <div id="map" style=" height: 0;
                overflow: hidden;
                padding-bottom: 22.25%;
                padding-top: 30px;
                position: relative;"></div>
            </div>  
            @include('clientLocations.script-map')

        </div>
    </div> 
</div>
</div>
</div>
</div>

<div class="container">
  <div class="box box-danger">
      <div class="box-header with-border">
        <div class="row">
            <div class="col-md-4">
                <ul class="timeline">
                    <li>
                        <!-- timeline icon -->
                        <i class="fa fa-map-marker bg-red"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#">UBICACIÓN DEL NEGOCIO</a></h3>

                            <div class="timeline-body">
                              CALLE: {{$clientCompany->street_company}}<br>
                              NÚMERO: {{$clientCompany->number_company}}<br>
                              COLONIA: {{$clientCompany->colony_company}}<br>
                              MUNICIPIO: {{$clientCompany->municipality_company}}<br>
                              ESTADO: {{$clientCompany->state_company}}<br>
                              CODIGO POSTAL: {{$clientCompany->postal_code_company}}<br>
                              TELÉFONO: {{$clientCompany->phone_company}}
                          </div>
                      </div>
                  </li>

              </ul>
          </div>  

          <div class="timeline-item">
            <div class="timeline-body">
                <div class="container" style="width: 100%;
                margin: 0 auto;
                margin-top:5px;">
                <div id="map_container" style="position: relative;"></div>
                <div id="mapa" style=" height: 0;
                overflow: hidden;
                padding-bottom: 22.25%;
                padding-top: 30px;
                position: relative;"></div>
            </div>  
            @include('clientCompanies.script-map')

        </div>
    </div>
</div>
</div>
</div>
</div>

@endsection