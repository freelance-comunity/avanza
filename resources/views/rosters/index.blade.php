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
                        <thead class="thead-inverse">
                            <th>Fecha</th>
                            <th>Nombre Coordonador</th>
                            <th>Coordinación</th>
                            <th>Sucursal</th>
                            <th>Nombre Empleado</th>
                            {{-- <th>Número Empleado</th> --}}
                            {{-- <th>Puesto</th> --}}
                            <th>Esquema de Pago</th>
                            <th>Periodo de Pago</th>
                            <th>Percepciones</th>
                            <th>Deducciones</th>
                            <th>Neto a Pagar</th>
                            {{-- <th>Firma Coordinador</th>
                            <th>Firma Empleado</th> --}}
                            {{-- <th width="50px">Action</th> --}}
                        </thead>
                        <tbody>

                            @foreach($rosters as $roster)
                            <tr>
                                <td>{!! $roster->date !!}</td>
                                <td>{!! $roster->coordinating_name !!}</td>
                                <td>{!! $roster->coordination !!}</td>
                                <td>{!! $roster->branch_office !!}</td>
                                <td>{!! $roster->name_employee !!}</td>
                                {{-- <td>{!! $roster->number_employee !!}</td> --}}
                               {{--  <td>{!! $roster->position !!}</td> --}}
                                <td>{!! $roster->payment_scheme !!}</td>
                                <td>{!! $roster->payment_period !!}</td>
                                <td>${!! number_format($roster->perceptions,2) !!}</td>
                                <td>${!! number_format($roster->deductions,2) !!}</td>
                                <td>${!! number_format($roster->grandchild_pay,2) !!}</td>
                                {{-- <td>{!! $roster->coordinating_firm !!}</td>
                                <td>{!! $roster->employee_firm !!}</td> --}}
                                {{-- <td>
                                    <a href="{!! route('rosters.edit', [$roster->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="{!! route('rosters.delete', [$roster->id]) !!}" onclick="return confirm('Are you sure wants to delete this Roster?')"><i class="glyphicon glyphicon-remove"></i></a>
                                </td> --}}
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