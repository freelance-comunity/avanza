@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('flash::message')
    @include('retreats.retiros')
    <div class="row">
        <h1 class="pull-left">RETIROS</h1>
        <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#retiros" style="margin-top: 25px" >RETIRAR</a>
    </div>

    <div class="row">
        @if($retreats->isEmpty())
        <div class="well text-center">No Hay Retiros</div>
        @else
        <div class="table-responsive">
            <table class="table"  id="example">
               <thead class="thead-inverse">
                <th>FECHA Y HORA</th>
                <th>MONTO RETIRADO</th>
                <th>CONCEPTO</th>
            </thead>
            <tbody>
               
                @foreach($retreats as $retreat)
                <tr>
                    <td>{!! $retreat->created_at !!}</td>
                    <td>${!! number_format($retreat->ammount,2) !!}</td>
                    <td>{!! $retreat->concept!!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection