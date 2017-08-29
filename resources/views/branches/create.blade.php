@extends('layouts.app')

@section('main-content')
@section('contentheader_title')
Crear nueva sucursal
@endsection
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'branches.store', 'data-parsley-validate' => '', 'id' => 'demo-form form']) !!}

        @include('branches.fields')

    {!! Form::close() !!}
</div>

@endsection
