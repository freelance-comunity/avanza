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

    {!! Form::model($employeecredentials, ['route' => ['employeecredentials.update', $employeecredentials->id], 'method' => 'patch', 'data-parsley-validate' => '']) !!}

        @include('employeecredentials.fields')

    {!! Form::close() !!}
</div>
@endsection
