@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">Sueldos Pagados</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('rosters.create') !!}">Nuevo</a>
    </div>

    <div class="row">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Sueldos</h3>
            </div>  

            <div class="box-body">
                @if($rosters->isEmpty())
                <div class="well text-center">No hay registros.</div>
                @else
                <div class="table-responsive">
                    <table class="table" id="example">
                        <thead class="bg-primary">
                            <th>Fecha</th>
                            <th>Nombre Coordonador</th>
                            <th>Coordinación</th>
                            <th>Sucursal</th>
                            <th>Nombre Empleado</th>
                            <th>Esquema de Pago</th>
                            <th>Periodo de Pago</th>
                            <th>Percepciones</th>
                            <th>Deducciones</th>
                            <th>Neto a Pagar</th>
                            
                        </thead>
                        <tbody>

                            @foreach($rosters as $roster)
                            <tr>
                                <td>{!! $roster->date !!}</td>
                                <td>{!! $roster->coordinating_name !!}</td>
                                <td>{!! $roster->coordination !!}</td>
                                <td>{!! $roster->branch_office !!}</td>
                                <td>{!! $roster->name_employee !!}</td>
                                <td>{!! $roster->payment_scheme !!}</td>
                                <td>{!! $roster->payment_period !!}</td>
                                <td>${!! number_format($roster->perceptions,2) !!}</td>
                                <td>${!! number_format($roster->deductions,2) !!}</td>
                                <td>${!! number_format($roster->grandchild_pay,2) !!}</td>
                               {{--  <td><a href="{{ url('roster') }}/{{ $roster->id }}"><i class="fa  fa-file-pdf-o fa-2x" data-toggle="tooltip" title="Ver Nomina"></i></a> --}}
                                 {{-- <a href="{!! route('rosters.edit', [$roster->id]) !!}"><i class="glyphicon glyphicon-edit fa-2x" data-toggle="tooltip" title="Editar"></i></a> --}}
                               </td>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
               </div>
               @endif
           </div>
       </div>
   </div>
   @endsection