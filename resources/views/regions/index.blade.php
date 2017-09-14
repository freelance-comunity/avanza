@extends('layouts.app')

@section('main-content')

<div class="container">

    {{-- @include('flash::message') --}}

    <div class="row">
        <h1 class="pull-left">Regiones</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('regions.create') !!}">Agregar Nueva</a>
    </div>

    <div class="row">
        @if($regions->isEmpty())
        <div class="well text-center">Ho hay regiones registradas.</div>
        @else
        <table class="table" id="regions">
            <thead class="thead-inverse">
                <th>Id</th>
                <th>Nombre</th>
                <th>Area abarcada</th>
                <th width="50px">Acción</th>
            </thead>
            <tbody>

                @foreach($regions as $region)
                <tr>
                    <td>{!! $region->id !!}</td>
                    <td>{!! $region->name !!}</td>
                    <td>{!! $region->area !!}</td>
                    <td>
                        <a href="{!! route('regions.edit', [$region->id]) !!}"><i class="glyphicon glyphicon-edit fa-2x"></i></a>
                        <a href="{!! route('regions.delete', [$region->id]) !!}" onclick="return confirm('¿Estas segutro de eliminar esta región?')"><i class="glyphicon glyphicon-remove fa-2x"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection