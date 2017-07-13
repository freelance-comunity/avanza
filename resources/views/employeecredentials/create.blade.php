@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'employeecredentials.store']) !!}

        @include('employeecredentials.fields')

    {!! Form::close() !!}
</div>
@endsection
