@extends('layouts.app')

@section('main-content')
@section('message_level')
Cierre de Operación
@endsection
@section('message_level_here')
Lista de cierres
@endsection
<div class="container">

    @include('flash::message')

    <div class="row">
        {{-- <h1 class="pull-left">Closes</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('closes.create') !!}">Add New</a> --}}
    </div>

    <div class="row">
        @if($closes->isEmpty())
        <div class="well text-center">No hay registros.</div>
        @else
        <div class="table-responsive">
            <table class="table" id="example">
                <thead class="thead-inverse">
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Fecha/Hora</th>
                </thead>
                <tbody>

                    @foreach($closes as $close)
                    <tr>
                        <td>{!! $close->name_user !!}</td>
                        <td>{!! $close->user['father_last_name'] !!}</td>
                        <td>{!! $close->user['mother_last_name'] !!}</td>
                        <td>{!! $close->created_at !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection