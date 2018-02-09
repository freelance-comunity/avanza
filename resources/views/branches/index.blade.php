@extends('layouts.app')

@section('main-content')
@section('message_level')
Sucursales
@endsection
@section('message_level_here')
Lista de sucursales
@endsection
@section('contentheader_title')
Todas las sucursales
@endsection
{{-- 
@role('administrador')
@php
if (Auth::user()->branch->name == 'MATRIZ' ) {
  $branches = App\Models\Branch::all();
}else{
$branches = App\Models\Branch::where('id', Auth::user()->branch_id)->get();
}
@endphp
@endrole
 --}}
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
            <thead class="bg-primary">
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Región</th>
                    <th>Nomenclatura</th>
                   {{--  <th width="100px">Acción</th> --}}
                </thead>
                <tbody>

                    @foreach($branches as $branch)
                    <tr>
                        <td>{!! $branch->name !!}</td>
                        <td>{!! $branch->phone !!}</td>
                        <td>{!! $branch->address !!}</td>
                        <td>{!! $branch->region['name'] !!}</td>
                        <td>{!! $branch->nomenclature!!}</td>
                       {{--  <td>
                            <a href="{!! route('branches.edit', [$branch->id]) !!}"><i class="fa fa-edit fa-2x" data-toggle="tooltip" title="Editar"></i></a>
                            <a href="{!! route('branches.delete', [$branch->id]) !!}" onclick="return confirm('¿Estas seguro de eliminar esta sucursal?')"><i class="fa fa-trash fa-2x" data-toggle="tooltip" title="Eliminar"></i></a> 
                            <a href="{!! route('branches.show', [$branch->id]) !!}"><i class="fa fa-eye fa-2x" data-toggle="tooltip" title="Ver Detalles" ></i></a>    
                        </td> --}}
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection