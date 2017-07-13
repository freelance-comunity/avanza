@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">Personal</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('employees.create') !!}">Agregar Nuevo</a>
    </div>

    <div class="row">
        @if($employees->isEmpty())
        <div class="well text-center">No hay personal registrado.</div>
        @else
        <div class="table-responsive">
            <table class="table" id="example">
                <thead>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Correo Electrónico</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Teléfono 1</th>
                    <th>Teléfono 2</th>
                    <th>Foto</th>
                    <th width="50px">Acción</th>
                </thead>
                <tbody>

                    @foreach($employees as $employee)
                    @php
                        $credential = $employee->credential;
                    @endphp
                    @include('employees.show')
                    <tr>
                        <td>{!! $employee->name !!}</td>
                        <td>{!! $employee->father_last_name !!}</td>
                        <td>{!! $employee->mother_last_name !!}</td>
                        <td>{!! $employee->email !!}</td>
                        <td>{!! $employee->birthdate !!}</td>
                        <td>{!! $employee->phone_1 !!}</td>
                        <td>{!! $employee->phone_2 !!}</td>
                        <td><img src="{{ asset('/uploads/avatars') }}/{!! $employee->avatar !!}" style="width: 50px; height: 50px;"></td>
                        <td>
                            <a data-toggle="tooltip" title="Editar" href="{!! route('employees.edit', [$employee->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-toggle="tooltip" title="Eliminar" href="{!! route('employees.delete', [$employee->id]) !!}" onclick="return confirm('¿Estas seguro de eliminar este empleado?')"><i class="glyphicon glyphicon-remove"></i></a>
                            <a data-toggle="tooltip" title="Ver"><i class="glyphicon glyphicon-eye-open" data-toggle="modal" data-target="#detail{{ $employee->id }}"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection