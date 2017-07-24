@extends('layouts.app')

@section('main-content')
@section('contentheader_title')
Crear
@endsection
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'roles.store', 'data-parsley-validate' => '']) !!}

        @include('roles.fields')

    {!! Form::close() !!}
</div>
@endsection
