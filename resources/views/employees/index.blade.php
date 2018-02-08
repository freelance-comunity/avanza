@extends('layouts.app')

@section('main-content')
@section('message_level')
Personal
@endsection
@section('message_level_here')
Lista de personal
@endsection
<div class="container">
{{-- @role('administrador')
@php
if (Auth::user()->branch->name == 'MATRIZ' ) {
  $employees = App\User::all();
}else{
$employees = App\User::where('branch_id', Auth::user()->branch_id)->get();
}
@endphp
@endrole --}}
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
                <thead class="bg-primary">
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Correo Electrónico</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Teléfono 1</th>
                    <th>Teléfono 2</th>
                    <th>Foto</th>
                    <th width="50px">Acción</th>
                     {{-- @if (Auth::user()->can('agregar-roles')) --}}
                    <th width="50px">Roles</th>
                   {{--  @endif --}}
                </thead>
                <tbody>

                    @foreach($employees as $employee)
                    @php
                    $credential = $employee->credential;
                    @endphp
                    @include('employees.show')
                    @include('employees.roles')
                    @include('employees.addroles')
                    <tr>
                        <td>{!! $employee->name !!}</td>
                        <td>{!! $employee->father_last_name !!}</td>
                        <td>{!! $employee->mother_last_name !!}</td>
                        <td>{!! $employee->email !!}</td>
                        <td>{!! $employee->birthdate->format('l d,F Y') !!}</td>
                        <td>{!! $employee->phone_1 !!}</td>
                        <td>{!! $employee->phone_2 !!}</td>
                        <td><img src="{{ asset('/uploads/avatars') }}/{!! $employee->avatar !!}" style="width: 50px; height: 50px;"></td>
                        <td>
                            <a data-toggle="tooltip" title="Ver"><i class="fa fa-eye fa-2x" data-toggle="modal" data-target="#detail{{ $employee->id }}"></i></a>
                              @if(Auth::user()->hasRole(['administrador', 'director-general']))
                            <a data-toggle="tooltip" title="Eliminar" href="{!! route('employees.delete', [$employee->id]) !!}" onclick="return confirm('¿Estas seguro de eliminar este empleado?')"><i class="fa fa-trash fa-2x"></i></a>
                            @endif
                        </td>
                         {{-- @if (Auth::user()->can('agregar-roles')) --}}
                        <td>
                            <div class="btn-group" data-toggle="buttons">
                            <button type="button" class="btn btn-lg bg-navy btn-block btn-md" data-toggle="modal" data-target="#roles{{$employee->id}}">Ver</button>
                                <button type="button" class="btn btn-lg bg-teal btn-block btn-md" data-toggle="modal" data-target="#rolesadd{{$employee->id}}">Agregar</button>
                            </div>
                        </td>
                        {{-- @endif --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection