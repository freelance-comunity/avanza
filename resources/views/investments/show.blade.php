@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('flash::message')
    @include('investments.inversiones')
    <div class="row">
        <h1 class="pull-left">INVERSIONES</h1>
        <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#inversiones" style="margin-top: 25px">AGREGAR INVERSIÓN</a>
    </div>

    <div class="row">
        @if($investments->isEmpty())
        <div class="well text-center">No Hay Inversiones.</div>
        @else
        <div class="table-responsive">
            <table class="table"  id="example">
                 <thead class="thead-inverse">
                    <th>FECHA Y HORA</th>
                    <th>MONTO DE LA INVERSIÓN</th>
                    
                    {{--  <th width="50px">Acción</th> --}}
                </thead>
                <tbody>

                    @foreach($investments as $investment)
                    <tr>
                       <td>{!! $investment->created_at !!}</td>
                        <td>${!! number_format($investment->ammount) !!}</td>
                            {{-- <td>
                                <a href="{!! route('investments.edit', [$investment->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('investments.delete', [$investment->id]) !!}" onclick="return confirm('Are you sure wants to delete this Investment?')"><i class="glyphicon glyphicon-remove"></i></a>
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