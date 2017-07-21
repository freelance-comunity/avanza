@php
    $branch = $client->branch;
    $references = $client->references;
@endphp
@extends('layouts.app')

@section('main-content')
@section('contentheader_title')
Detalles del Cliente 
@endsection
<div class="container">
  <div class="box box-danger">
     <div class="box-header with-border">
        <div class="col-md-6">
             <div class="box box-widget widget-user">
                    <div class="widget-user-header bg-black" style="background: url('../img/b.jpeg') center center;">
                          <h3 class="widget-user-username">{{$client->firts_name}} {{$client->last_name}} {{$client->mothers_last_name}}</h3>
                          <h5 class="widget-user-desc">SUCURSAL: {{$branch->name}}</h5>
                    </div>
                    <div class="widget-user-image">
                         <img class="img-circle" src="{{ asset('/uploads/avatars') }}/{!! $client->avatar !!}" alt="User Avatar">
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
                <h3><span class="label label-danger">DATOS PERSONALES</span></h3>
                <table class="table table-striped">
                <tr>
                  <th style="width: 10px">1</th>
                  <th>ESTADO CIVIL:</th>
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

        <h3><span class="label label-danger">DOMICILIO DE LA CASA</span></h3>

            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="row">
                <div class="col-md-8 col-sm-8">
                  <div class="pad">
                    <!-- Map will be created here -->
                    <div id="map" style="height: 325px;"></div>
                  </div>
                  @include('clientLocations.script-map')
                </div>
                <!-- /.col -->
                <div class="col-md-4 col-sm-4">
                  <table class="table table-striped">
                <tr>
                  <th style="width: 10px">CALLE:</th>
                  <th>{{$clientLocation->street}}</th>
                </tr>
                <tr>
                  <td>NÚMERO:</td>
                  <td>
                    {{$clientLocation->number}}
                  </td>
                </tr>
                <tr>
                  <td>COLONIA:</td>
                  <td>
                    {{$clientLocation->colony}}
                  </td>
                </tr>
                <tr>
                  <td>MUNICIPIO:</td>
                  <td>
                   {{$clientLocation->municipality}}
                  </td>
                </tr>
                <tr>
                  <td>ESTADO:</td>
                  <td>
                    {{$clientLocation->state}}
                  </td>
                </tr>
                <tr>
                  <td>COGIDO POSTAL:</td>
                  <td>
                    {{$clientLocation->postal_code}}
                  </td>
                </tr>
                <tr>
                  <td>REFERENCIAS:</td>
                  <td>
                    {{$clientLocation->references}}
                  </td>
                </tr>
              </table>
                  </div>
                </div>
                  </div>  
            
             <h3><span class="label label-danger">DOMICILIO DEL NEGOCIO: {{$clientCompany->name_company}}</span></h3>

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
                  <table class="table table-striped">
                  <tr>
                  <th style="width: 10px">TELÉFONO:</th>
                  <th>{{$clientCompany->phone_company}}</th>
                </tr>
                <tr>
                  <th style="width: 10px">CALLE:</th>
                  <th>{{$clientCompany->street_company}}</th>
                </tr>
                <tr>
                  <td>NÚMERO:</td>
                  <td>
                    {{$clientCompany->number_company}}
                  </td>
                </tr>
                <tr>
                  <td>COLONIA:</td>
                  <td>
                    {{$clientCompany->colony_company}}
                  </td>
                </tr>
                <tr>
                  <td>MUNICIPIO:</td>
                  <td>
                   {{$clientCompany->municipality_company}}
                  </td>
                </tr>
                <tr>
                  <td>ESTADO:</td>
                  <td>
                    {{$clientCompany->state_company}}
                  </td>
                </tr>
                <tr>
                  <td>COGIDO POSTAL:</td>
                  <td>
                    {{$clientCompany->postal_code_company}}
                  </td>
                </tr>
              </table>
              </div>
              </div>
              </div>
            
            <div class="col-md-3">
               <h4>ACTIVOS</h4>
               <table class="table table-striped">
                  <tr>
                  <th style="width: 10px">INVENTARIO:</th>
                  <th>{{$clientCompany->inventory}}</th>
                </tr>
                <tr>
                  <th style="width: 10px">MAQ Y EQUIP:</th>
                  <th>{{$clientCompany->machinery_equipment}}</th>
                </tr>
                <tr>
                  <td>VEHÍCULOS:</td>
                  <td>
                    {{$clientCompany->vehicles}}
                  </td>
                </tr>
                <tr>
                  <td>INMUEBLES:</td>
                  <td>
                    {{$clientCompany->property}}
                  </td>
                </tr>
                <tr>
                  <td>CAJA, BANCOS:</td>
                  <td>
                   {{$clientCompany->box_benck}}
                  </td>
                </tr>
                <tr>
                  <td>CTAS/COBRAR:</td>
                  <td>
                    {{$clientCompany->accounts}}
                  </td>
                </tr>
              </table>
            </div>

            <div class="col-md-3">
               <h4>PASIVOS</h4>
               <table class="table table-striped">
                  <tr>
                  <th style="width: 10px">PROVEEDORES:</th>
                  <th>{{$clientCompany->suppliers}}</th>
                </tr>
                <tr>
                  <th style="width: 10px">CRÉDITOS:</th>
                  <th>{{$clientCompany->credits}}</th>
                </tr>
                <tr>
                  <td>PAGO AL MES:</td>
                  <td>
                    {{$clientCompany->payments}}
                  </td>
                </tr>
                <tr>
                  <td>ESPECIFICA:</td>
                  <td>
                    {{$clientCompany->specify}}
                  </td>
                </tr>
              </table>
            </div>

            <div class="col-md-3">
               <h4>INGRESOS</h4>
               <table class="table table-striped">
                  <tr>
                  <th style="width: 10px">ENTRE SEMANA:</th>
                  <th>{{$clientCompany->weekday}}</th>
                </tr>
                <tr>
                  <th style="width: 10px">FIN DE SEMANA:</th>
                  <th>{{$clientCompany->weekend}}</th>
                </tr>
                <tr>
                  <td>UTILIDAD:</td>
                  <td>
                    {{$clientCompany->utility}}
                  </td>
                </tr>
                <tr>
                  <td>OTROS INGRESOS:</td>
                  <td>
                    {{$clientCompany->other_income}}
                  </td>
                </tr>
              </table>
            </div>
            <div class="col-md-3">
               <h4>COSTOS</h4>
               <table class="table table-striped">
                  <tr>
                  <th style="width: 10px">RENTA:</th>
                  <th>{{$clientCompany->rent}}</th>
                </tr>
                <tr>
                  <th style="width: 10px">SUELDO:</th>
                  <th>{{$clientCompany->salary}}</th>
                </tr>
                <tr>
                  <td>OTROS LUZ/AGUA:</td>
                  <td>
                    {{$clientCompany->others}}
                  </td>
                </tr>
              </table>
            </div>

           
             <div class="col-md-12">
              <h3> <span class="label label-danger">AVAL DATOS GENERALES</span></h3>
               <table class="table table-striped">
                  <tr>
                  <th style="width: 10px">NOMBRE:</th>
                  <th>APELLIDO PATERNO:</th>
                  <th>APELLIDO MATERNO:</th>
                  <th>FECHA DE NACIMIENTO:</th>
                  <th>CURP:</th>
                  <th>TELÉFONO:</th>
                  <th>ESTADO CIVIL:</th>
                  <th>ESCOLARIDAD</th>
                </tr>
                <tr>
                  <th style="width: 10px">{{$clientAval->name_aval}}</th>
                  <th>{{$clientAval->last_name_aval}}</th>
                  <th>{{$clientAval->mothers_name_aval}}</th>
                  <th>{{$clientAval->birthdate_aval}}</th>
                  <th>{{$clientAval->curp_aval}}</th>
                  <th>{{$clientAval->phone_aval}}</th>
                  <th>{{$clientAval->civil_status_aval}}</th>
                  <th>{{$clientAval->scholarship_aval}}</th>
                </tr>
    
              </table>
              <H4><span>DIRECCIÓN DEL AVAL</span> </H4>
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
                  <th style="width: 10px">{{$clientAval->street_aval}}</th>
                  <th>{{$clientAval->number_aval}}</th>
                  <th>{{$clientAval->colony_aval}}</th>
                  <th>{{$clientAval->municipality_aval}}</th>
                  <th>{{$clientAval->state_aval}}</th>
                  <th>{{$clientAval->postal_code_aval}}</th>
                </tr>
    
              </table>
            </div>

             <div class="col-md-12">
              <h3><span class="label label-danger">REFERENCIAS</span></h3>
               <table class="table table-striped">
                  <tr>
                  <th style="width: 10px">NOMBRE:</th>
                  <th>APELLIDO PATERNO:</th>
                  <th>APELLIDO MATERNO:</th>
                  <th>TELÉFONO:</th>
                </tr>
                @foreach ($references as $references)
                    <tr>
                  <th style="width: 10px">{{$references->firts_name_reference}}</th>
                  <th>{{$references->last_name_reference}}</th>
                  <th>{{$references->mothers_last_name_reference}}</th>
                  <th>{{$references->phone_reference}}</th>
                </tr>
                @endforeach
                   
              </table>
            </div>




     </div>
  </div>

@endsection