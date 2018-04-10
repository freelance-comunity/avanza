@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">Pagos Por Vencer</h1>

    </div>

    <div class="row">
        @if($payments->isEmpty())
        <div class="well text-center">No Se Encontraron Pagos.</div>
        @else
        <div class="table-responsive">
            <table class="table"  id="example">
                <thead>
                    <th>Sucursal</th>
                    <th>Cliente</th>
                    <th>Crédito</th>
                    <th>Fecha</th>
                    <th>Monto</th>
                    <th>Capital</th>
                    <th>Interés</th>
                    <th>Moratorio</th>
                    <th>Total</th>
                    <th>Pago</th>
                    <th>Estatus</th>

                </thead>
                <tbody>

                    @foreach($payments as $payment)
                    @php
                    $current =  \Carbon\Carbon::today()->toDateString();
                    $debt = $payment->debt;
                    $credit = $debt->credit;
                    $fecha= $payment->date->toDateString();
                    @endphp

                    @if ( $fecha <= $current AND $payment->status == 'Pendiente' OR $payment->status == 'Parcial' )
                    <tr>
                        <td>{{$payment->branch['name']}}</td>
                        <td>{{ $credit->firts_name }} {{ $credit->last_name }} {{ $credit->mothers_last_name }}
                        </td>
                        <td>{{ $credit->folio }}</td>
                        <td>{{$fecha}}</td>
                        <td>{!! $payment->ammount !!}</td>
                        <td>{!! $payment->capital !!}</td>
                        <td>{!! $payment->interest !!}</td>
                        <td>{!! $payment->moratorium !!}</td>
                        <td>{!! $payment->total !!}</td>
                        <td>{!! $payment->payment !!}</td>
                        <td>{!! $payment->status !!}</td>

                    </tr>
                    @endif

                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection