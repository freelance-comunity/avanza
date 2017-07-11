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
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Latitude</th>
                <th>Length</th>
                <th width="50px">Acción</th>
            </thead>
            <tbody>

                @foreach($branches as $branch)
                <tr>
                    <td>{!! $branch->name !!}</td>
                    <td>{!! $branch->phone !!}</td>
                    <td>{!! $branch->address !!}</td>
                    <td>{!! $branch->latitude !!}</td>
                    <td>{!! $branch->length !!}</td>
                    <td>
                        <a href="{!! route('branches.edit', [$branch->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('branches.delete', [$branch->id]) !!}" onclick="return confirm('Are you sure wants to delete this Branch?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myMapModal" id="trigger-btn">Pantalla completa</button>
                        @include('branches.modal-map')
                        
                    </td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection