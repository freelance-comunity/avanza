@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($employee, ['route' => ['employees.update', $employee->id], 'method' => 'patch', 'data-parsley-validate' => '']) !!}

        @include('employees.fields-edit')

    {!! Form::close() !!}
</div>
@endsection