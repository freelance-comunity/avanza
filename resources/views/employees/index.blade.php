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
                    <th>Fecha de Nacimiento</th>
                    <th>Entidad de Nacimiento</th>
                    <th>Lugar de Nacimiento</th>
                    <th>Género</th>
                    <th>Estado Civil</th>
                    <th>País de Nacimiento</th>
                    <th>Nacionalidad</th>
                    <th>Escolaridad</th>
                    <th>Teléfono 1</th>
                    <th>Teléfono 2</th>
                    <th>Foto</th>
                    <th width="50px">Acción</th>
                </thead>
                <tbody>

                    @foreach($employees as $employee)
                    <tr>
                        <td>{!! $employee->name !!}</td>
                        <td>{!! $employee->father_last_name !!}</td>
                        <td>{!! $employee->mother_last_name !!}</td>
                        <td>{!! $employee->birthdate !!}</td>
                        <td>{!! $employee->birth_entity !!}</td>
                        <td>{!! $employee->place_of_birth !!}</td>
                        <td>{!! $employee->gender !!}</td>
                        <td>{!! $employee->civil_status !!}</td>
                        <td>{!! $employee->country_of_birth !!}</td>
                        <td>{!! $employee->nationality !!}</td>
                        <td>{!! $employee->scholarship !!}</td>
                        <td>{!! $employee->phone_1 !!}</td>
                        <td>{!! $employee->phone_2 !!}</td>
                        <td>{!! $employee->avatar !!}</td>
                        <td>
                            <a href="{!! route('employees.edit', [$employee->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="{!! route('employees.delete', [$employee->id]) !!}" onclick="return confirm('Are you sure wants to delete this Employee?')"><i class="glyphicon glyphicon-remove"></i></a>
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