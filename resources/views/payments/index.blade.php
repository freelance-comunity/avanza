@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">Payments</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('payments.create') !!}">Add New</a>
    </div>

    <div class="row">
        @if($payments->isEmpty())
        <div class="well text-center">No Payments found.</div>
        @else
        <div class="table-responsive">
        <table class="table"  id="example">
            <thead>
                <th>Número</th>
                <th>Día</th>
                <th>Fecha</th>
                <th>Monto</th>
                <th>Capital</th>
                <th>Interés</th>
                <th>Moratorio</th>
                <th>Total</th>
                <th>Pago</th>
                <th>Estatus</th>
                <th width="50px">Acción</th>
            </thead>
            <tbody>

                @foreach($payments as $payment)
                <tr>
                    <td>{!! $payment->number !!}</td>
                    <td>{!! $payment->day->format('l') !!}</td>
                    <td>{!! $payment->date->format('d,F Y') !!}</td>
                    <td>{!! $payment->ammount !!}</td>
                    <td>{!! $payment->capital !!}</td>
                    <td>{!! $payment->interest !!}</td>
                    <td>{!! $payment->moratorium !!}</td>
                    <td>{!! $payment->total !!}</td>
                    <td>{!! $payment->payment !!}</td>
                    <td>{!! $payment->status !!}</td>
                    <td>
                        <a href="{!! route('payments.edit', [$payment->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('payments.delete', [$payment->id]) !!}" onclick="return confirm('Are you sure wants to delete this Payment?')"><i class="glyphicon glyphicon-remove"></i></a>
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