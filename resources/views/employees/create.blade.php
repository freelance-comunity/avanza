@extends('layouts.app')

@section('main-content')
@section('message_level')
Personal
@endsection
@section('message_level_here')
Crear
@endsection
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'employees.store', 'files' => 'true', 'data-parsley-validate' => '', 'id' => 'demo-form']) !!}

        @include('employees.fields')

    {!! Form::close() !!}
</div>
@endsection
