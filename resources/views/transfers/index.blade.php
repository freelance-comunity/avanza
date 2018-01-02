@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('flash::message')
    @include('transfers.transfer')
    <div class="row">
        <h1 class="pull-left">Transferencias</h1>
        <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#transferencias" style="margin-top: 25px">Agregar Transferencia</a>
    </div>

    <div class="row">
        @if($transfers->isEmpty())
        <div class="well text-center">No se encontraron transferencias.</div>
        @else
        <table class="table">
            <thead>
                <th>Fecha</th>
                <th>Monto</th>
                <th>Emisor</th>
                <th>Receptor</th>
                <th width="50px">Acción</th>
            </thead>
            <tbody>

                @foreach($transfers as $transfer)
                <tr>
                   <td>{!! $transfer->date !!}</td>
                   <td>{!! $transfer->ammount !!}</td>
                   <td>{!! $transfer->transsmitter !!}</td>
                   <td>{!! $transfer->receiver !!}</td>
                   <td>
                    <a href="{!! route('transfers.edit', [$transfer->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{!! route('transfers.delete', [$transfer->id]) !!}" onclick="return confirm('Are you sure wants to delete this Transfer?')"><i class="glyphicon glyphicon-remove"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
</div>
@endsection