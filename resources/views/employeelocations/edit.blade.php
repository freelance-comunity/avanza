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

    {!! Form::model($employeelocation, ['route' => ['employeelocations.update', $employeelocation->id], 'method' => 'patch', 'data-parsley-validate' => '']) !!}

        @include('employeelocations.fields')

    {!! Form::close() !!}
</div>
@endsection
