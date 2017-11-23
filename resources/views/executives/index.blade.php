@extends('layouts.app')

@section('main-content')
@section('message_level')
Bovéda
@endsection
@section('message_level_here')
Lista de personal
@endsection
<div class="container">

    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">Bovéda</h1>
    </div>
    @if(Auth::user()->hasRole(['administrador', 'director-general', 'coordinador-regional', 'coordinador-sucursal']))
    <div class="row">
        @if($employees->isEmpty())
        <div class="well text-center">No hay personal registrado.</div>
        @else
        <div class="table-responsive">
            <table class="table" id="example">
                <thead class="bg-primary">
                    <th>Nombre Completo</th>
                    <th>Sucursal</th>
                    <th>Saldo</th>
                    <th width="100px">Detalle Bóveda</th>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                    @php
                    $roles = $employee->role;
                    @endphp
                    @if (Auth::user()->hasRole(['administrador', 'director-general']))
                    <tr>
                        <td>{!! $employee->name !!}  {!! $employee->father_last_name !!} {!! $employee->mother_last_name !!}</td>
                        <td>{{ $employee->branch->name }}</td>
                        <td>${{number_format($employee->vault->ammount,2)}}</td>
                        <td>
                            <a href="{{ url('showVault') }}/{{ $employee->id }}" data-toggle="tooltip" title="Ver detalles" href=""><i class="fa fa-eye fa-2x"></i></a>
                        </td>              
                    </tr>
                    @else
                    @if ($employee->hasRole(['administrador', 'director-general']))
                    <tr style="display: none;">
                        <td>{!! $employee->name !!} {!! $employee->father_last_name !!} {!! $employee->mother_last_name !!}</td>
                        <td>{{ $employee->branch->name }}</td>
                        <td>${{number_format($employee->vault->ammount,2)}}</td>
                        <td>
                            <a href="{{ url('showVault') }}/{{ $employee->id }}" data-toggle="tooltip" title="Ver detalles" href=""><i class="fa fa-eye fa-2x"></i></a>
                        </td>              
                    </tr>
                    @else
                    <tr>
                     <td>{!! $employee->name !!} {!! $employee->father_last_name !!} {!! $employee->mother_last_name !!}</td>
                     <td>{{ $employee->branch->name }}</td>
                     <td>${{number_format($employee->vault->ammount,2)}}</td>
                     <td>
                        <a href="{{ url('showVault') }}/{{ $employee->id }}" data-toggle="tooltip" title="Ver detalles" href=""><i class="fa fa-eye fa-2x"></i></a>
                    </td>             
                </tr>
                @endif
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endif
@role('ejecutivo-de-credito')
<div class="row">
    @if(is_null($user))
    <div class="well text-center">No hay personal registrado.</div>
    @else
    <div class="table-responsive">
        <table class="table" id="example">
            <thead class="thead-inverse">
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Sucursal</th>
                <th width="100px">Acción</th>
            </thead>
            <tbody>
                <tr>
                    <td>{!! $user->name !!}</td>
                    <td>{!! $user->father_last_name !!}</td>
                    <td>{!! $user->mother_last_name !!}</td>
                    <td>{{ $user->branch->name }}</td>
                    <td>
                        <a href="{{ url('showVault') }}/{{ $user->id }}" data-toggle="tooltip" title="Ver detalles" href=""><i class="fa fa-eye fa-2x"></i></a>
                    </td>              
                </tr>
            </tbody>
        </table>
    </div>
    @endif
</div>
@endrole
</div>
@endsection