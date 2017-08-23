@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">LatePayments</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('latePayments.create') !!}">Add New</a>
    </div>

    <div class="row">
        @if($latePayments->isEmpty())
        <div class="well text-center">No se encontraron pagos atrasados</div>
        @else
        <table class="table">
            <thead>
                <th>Número de Pago</th>
                <th>Total a Pagar</th>
                <th>Abonado</th>
                <th>aver</th>
                <th width="50px">Acción</th>
            </thead>
            <tbody>
           
                @foreach($latePayments as $latePayments)
                <tr>
                   
                    <td>{!! $latePayments->late_payment !!}</td>
                    <td>{!! $latePayments->late_ammount !!}</td>
                    <td>{!! $latePayments->late_payment!!}</td>
                   
                    <td>
                        <a href="{!! route('latePayments.edit', [$latePayments->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('latePayments.delete', [$latePayments->id]) !!}" onclick="return confirm('Are you sure wants to delete this LatePayments?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection