@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'closes.store']) !!}

        @include('closes.fields')

    {!! Form::close() !!}
</div>
@endsection
