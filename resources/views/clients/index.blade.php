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
                    <th>Curp</th>
                    <th>Ine</th>
                    <th>Estado Civil</th>
                    <th>Sucursal</th>
                    <th>Imagen</th>
                    <th width="50px">Action</th>
                </thead>
                <tbody>

                    @foreach($clients as $client)
                    @php
                    $branch = $client->branch;
                    @endphp
                    <tr>
                        <td>{!! $client->folio !!}</td>
                        <td>{!! $client->firts_name !!}</td>
                        <td>{!! $client->last_name !!}</td>
                        <td>{!! $client->mothers_last_name !!}</td>
                        <td>{!! $client->curp !!}</td>
                        <td>{!! $client->ine !!}</td>
                        <td>{!! $client->civil_status !!}</td>
                        <td>{{$branch->name}}</td>
                        <td><img src="{{ asset('/uploads/avatars') }}/{!! $client->avatar !!}" style="width: 50px; height: 50px;"></td>
                        <td>
                            
                            <a href="{!! route('clients.show', [$client->id]) !!}"><i class="fa fa-eye fa-2x" data-toggle="tooltip" title="Ver Detalles" ></i></a>   
                            <a href="{!! route('clients.delete', [$client->id]) !!}" onclick="return confirm('¿Estas seguro de eliminar este cliente?')"><i class="fa fa-trash fa-2x"></i></a>                            
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