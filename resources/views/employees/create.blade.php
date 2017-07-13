@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'employees.store', 'files' => 'true']) !!}

        @include('employees.fields')

    {!! Form::close() !!}
</div>
@endsection
