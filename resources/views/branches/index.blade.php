@extends('layouts.app')

@section('main-content')
@section('contentheader_title')
Todas las sucursales
@endsection

<div class="container">

    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">Sucursales</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('branches.create') !!}">Agregar Nuevo</a>        
    </div>
    <div class="row">
        @if($branches->isEmpty())
        <div class="well text-center">No se encontraron sucursales</div>
        @else
        <div class="table-responsive">
            <table class="table"  id="example">
                <thead>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th width="50px">Acción</th>
                </thead>
                <tbody>

                    @foreach($branches as $branch)
                    <tr>
                        <td>{!! $branch->name !!}</td>
                        <td>{!! $branch->phone !!}</td>
                        <td>{!! $branch->address !!}</td>
                        <td>
                            <a href="{!! route('branches.edit', [$branch->id]) !!}"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Editar"></i></a>
                            <a href="{!! route('branches.delete', [$branch->id]) !!}" onclick="return confirm('¿Estas seguro de eliminar esta sucursal?')"><i class="glyphicon glyphicon-remove" data-toggle="tooltip" title="Eliminar"></i></a> 
                            <a href="{!! route('branches.show', [$branch->id]) !!}"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="Ver Detalles" ></i></a>    
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