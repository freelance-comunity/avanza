@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($employeelocation, ['route' => ['employeelocations.update', $employeelocation->id], 'method' => 'patch', 'data-parsley-validate' => '']) !!}

        @include('employeelocations.fields')

    {!! Form::close() !!}
</div>
@endsection
