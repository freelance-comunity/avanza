@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'employees.store', 'files' => 'true', 'data-parsley-validate' => '']) !!}

        @include('employees.fields')

    {!! Form::close() !!}
</div>
@endsection
