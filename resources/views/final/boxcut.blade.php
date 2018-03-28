@extends('layouts.app')

@section('main-content')
@section('message_level')
Corte de caja
@endsection
@section('message_level_here')
Lista de personal
@endsection
<div class="container">

    @include('flash::message')
    @include('final.modalBoxCut')

    <div class="row">
        <h1 class="pull-left">CORTE DE CAJA</h1>
        
        <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalBoxCut" >CIERRE BÓVEDA </a>
    </div>


</div>
@endsection