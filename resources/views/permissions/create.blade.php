@extends('layouts.app')

@section('main-content')
@section('message_level')
Permisos
@endsection
@section('message_level_here')
Crear
@endsection
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'permissions.store', 'data-parsley-validate' => '']) !!}

        @include('permissions.fields')

    {!! Form::close() !!}
</div>
@endsection
