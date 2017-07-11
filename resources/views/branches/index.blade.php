@extends('layouts.app')

@section('main-content')

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
                @include('branches.show')
                <tr>
                    <td>{!! $branch->name !!}</td>
                    <td>{!! $branch->phone !!}</td>
                    <td>{!! $branch->address !!}</td>
                    <td>
                        <a href="{!! route('branches.edit', [$branch->id]) !!}"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Editar"></i></a>
                        <a href="{!! route('branches.delete', [$branch->id]) !!}" onclick="return confirm('Are you sure wants to delete this Branch?')"><i class="glyphicon glyphicon-remove" data-toggle="tooltip" title="Eliminar"></i></a>
                         <a data-toggle="tooltip" title="Ver"><i class="glyphicon glyphicon-eye-open" data-toggle="modal" data-target="#myMapModal{{$branch->id}}"></i></a>
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