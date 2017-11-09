@extends('layouts.app')

@section('main-content')
@section('message_level')
Roles
@endsection
@section('message_level_here')
Crear
@endsection
@section('contentheader_title')
Crear
@endsection
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'roles.store', 'data-parsley-validate' => '', 'id' => 'test-form']) !!}

        @include('roles.fields')

    {!! Form::close() !!}
</div>
@endsection
