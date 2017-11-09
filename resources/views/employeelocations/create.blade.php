@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'employeelocations.store']) !!}

        @include('employeelocations.fields')

    {!! Form::close() !!}
</div>
@endsection
