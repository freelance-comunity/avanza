@extends('layouts.app')

@section('main-content')
@section('contentheader_title')
Crear
@endsection
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'roles.store']) !!}

        @include('roles.fields')

    {!! Form::close() !!}
</div>
@endsection
