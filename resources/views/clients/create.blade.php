@extends('layouts.app')

@section('main-content')
@section('contentheader_title')
Crear Nuevo Cliente 
@endsection
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'clients.store']) !!}

        @include('clients.fields')

    {!! Form::close() !!}
</div>
@endsection
