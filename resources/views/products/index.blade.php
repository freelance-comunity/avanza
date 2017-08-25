@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">Productos</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('products.create') !!}"> Nuevo Producto</a>
    </div>

    <div class="row">
        @if($products->isEmpty())
        <div class="well text-center">No se encontraron productos.</div>
        @else
        <div class="table-responsive">
            <table class="table"  id="example">
                <thead class="thead-inverse">
                    <th>Codigo </th>
                    <th>Nombre</th>
                    <th>Interés</th>
                    <th>Monto  Máximo</th>
                    <th>Monto Mínimo</th>
                    <th>Recargo</th>
                    <th width="50px">Acción</th>
                </thead>
                <tbody>

                    @foreach($products as $product)
                    <tr>
                        <td>{!! $product->code !!}</td>
                        <td>{!! $product->name !!}</td>
                        <td>{!! $product->interest_of_cup!!} %</td>
                        <td>MXN {!! number_format($product->ammount_max, 2) !!}</td>
                        <td>MXN {!! number_format($product->ammount_min, 2) !!}</td>
                        <td>MXN {!! number_format($product->surcharge, 2) !!}</td>
                        <td>
                            <a href="{!! route('products.edit', [$product->id]) !!}"><i class="fa fa-edit fa-2x" data-toggle="tooltip" title="Editar"></i></a>
                            <a href="{!! route('products.delete', [$product->id]) !!}" onclick="return confirm('¿Esta seguro de eliminar este producto?')"><i class="fa fa-trash fa-2x" data-toggle="tooltip" title="Eliminar"></i></a>
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