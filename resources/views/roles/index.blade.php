@extends('layouts.app')

@section('main-content')
@section('message_level')
Roles
@endsection
@section('message_level_here')
Lista de roles
@endsection
<div class="container">

    @include('flash::message')
    <div class="row">
        <h1 class="pull-left">Roles</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('roles.create') !!}">Agregar Nuevo</a>
    </div>

    <div class="row">
        @if($roles->isEmpty())
        <div class="well text-center">No hay roles registrados.</div>
        @else
        <div class="table-responsive">
            <table class="table"  id="example">
                <thead class="thead-inverse">
                    <th>Nombre Rol</th>
                    <th>Descripción Rol</th>
                    <th width="150px">Acción</th>
                </thead>
                <tbody>
                   
                    @foreach($roles as $role)
                    @include('roles.show')
                    <tr>
                        <td>{!! $role->name !!}</td>
                        <td>{!! $role->description !!}</td>
                        <td>
                            <a href="{!! route('roles.edit', [$role->id]) !!}"><i class="glyphicon glyphicon-edit fa-2x" data-toggle="tooltip" title="Editar"></i></a>
                            <a href="{!! route('roles.delete', [$role->id]) !!}" onclick="return confirm('Are you sure wants to delete this Role?')"><i class="glyphicon glyphicon-remove fa-2x" data-toggle="tooltip" title="Eliminar"></i></a>
                            <a data-toggle="tooltip" title="Ver"><i class="glyphicon glyphicon-eye-open fa-2x" data-toggle="modal" data-target="#detail{{ $role->id }}"></i></a>
                            <a href="{{ url('permission-to-role') }}/{{ $role->id }}"><i class="glyphicon glyphicon-lock fa-2x" data-toggle="tooltip" title="Permisos"></i></a>
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