@extends('layouts.app')

@section('main-content')
@section('contentheader_title')
Todos los Clientes
@endsection
<div class="container">

    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">Clientes</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('clients.create') !!}">Agregar Nuevo Cliente</a>
    </div>
    
    <div class="row">
        @if($clients->isEmpty())
        <div class="well text-center">No se encontraron cliente en el sistema.</div>
        @else
        <div class="table-responsive">
            <table class="table"  id="example">
                <thead>
                    <th>Folio</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Entidad de Nacimiento</th>
                    <th>Genero</th>
                    <th>Sucursal</th>
                    <th>Imagen</th>
                    <th width="50px">Action</th>
                </thead>
                <tbody>

                    @foreach($clients as $client)
                    @include('clients.show')
                    @php
                    $branch = $client->branch;
                    @endphp
                    <tr>
                        <td>{!! $client->folio !!}</td>
                        <td>{!! $client->firts_name !!}</td>
                        <td>{!! $client->last_name !!}</td>
                        <td>{!! $client->mothers_last_name !!}</td>
                        <td>{!! $client->birthdate !!}</td>
                        <td>{!! $client->birth_entity !!}</td>
                        <td>{!! $client->gender !!}</td>
                        <td>{{$branch->name}}</td>
                        <td><img src="{{ asset('/uploads/avatars') }}/{!! $client->avatar !!}" style="width: 50px; height: 50px;"></td>
                        <td>
                            <a href="{!! route('clients.edit', [$client->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="{!! route('clients.delete', [$client->id]) !!}" onclick="return confirm('¿Estas seguro de eliminar este cliente?')"><i class="glyphicon glyphicon-remove"></i></a>
                            <a  data-toggle="tooltip" title="Ver"><i class="glyphicon glyphicon-eye-open" data-toggle="modal" data-target="#detail{{$client->id}}"></i></a>                           
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