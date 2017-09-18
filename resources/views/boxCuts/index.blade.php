@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">CORTE DE CAJA</h1>
    </div>
 @if(Auth::user()->hasRole(['administrador', 'director-general', 'coordinador-regional', 'coordinador-sucursal']))
    <div class="row">
        @if($employees->isEmpty())
        <div class="well text-center">No hay personal registrado.</div>
        @else
        <div class="table-responsive">
            <table class="table" id="example">
                <thead class="thead-inverse">
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Sucursal</th>
                    <th width="100px">Acción</th>
                </thead>
                <tbody>

                    @foreach($employees as $employee)

                    <tr>
                        <td>{!! $employee->name !!}</td>
                        <td>{!! $employee->father_last_name !!}</td>
                        <td>{!! $employee->mother_last_name !!}</td>
                        <td>{{ $employee->branch->name }}</td>
                        <td>
                            <a href="{{ url('showbox') }}/{{ $employee->id }}" data-toggle="tooltip" title="Ver detalles" href=""><i class="fa fa-eye fa-2x"></i></a>
                        </td>              
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
    @endif
</div>
@endsection