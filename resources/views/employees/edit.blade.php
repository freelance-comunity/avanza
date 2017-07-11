@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($employee, ['route' => ['employees.update', $employee->id], 'method' => 'patch']) !!}

        @include('employees.fields')

    {!! Form::close() !!}
</div>
@endsection
