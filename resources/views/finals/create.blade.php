@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'finals.store']) !!}

        @include('finals.fields')

    {!! Form::close() !!}
</div>
@endsection
