@extends('layouts.app')

@section('main-content')

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
            <thead>
                <th>Nombre Rol</th>
                <th>Descripción Rol</th>
                <th width="70px">Acción</th>
            </thead>
            <tbody>
             
                @foreach($roles as $role)
                @include('roles.show')
                <tr>
                    <td>{!! $role->name !!}</td>
                    <td>{!! $role->description !!}</td>
                    <td>
                        <a href="{!! route('roles.edit', [$role->id]) !!}"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Editar"></i></a>
                        <a href="{!! route('roles.delete', [$role->id]) !!}" onclick="return confirm('Are you sure wants to delete this Role?')"><i class="glyphicon glyphicon-remove" data-toggle="tooltip" title="Eliminar"></i></a>
                        <a data-toggle="tooltip" title="Ver"><i class="glyphicon glyphicon-eye-open" data-toggle="modal" data-target="#detail{{ $role->id }}"></i></a>
                        <a href="#"><i class="glyphicon glyphicon-lock" data-toggle="tooltip" title="Permisos"></i></a>
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