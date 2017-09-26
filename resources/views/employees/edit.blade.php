@extends('layouts.app')

@section('main-content')
@section('message_level')
Personal
@endsection
@section('message_level_here')
Editar
@endsection
<div class="container">

    @include('common.errors')

    {!! Form::model($employee, ['route' => ['employees.update', $employee->id], 'method' => 'patch', 'data-parsley-validate' => '']) !!}

        @include('employees.fields-edit')

    {!! Form::close() !!}
</div>
@endsection