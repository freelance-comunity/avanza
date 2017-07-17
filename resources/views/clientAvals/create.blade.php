@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'clientAvals.store']) !!}

        @include('clientAvals.fields')

    {!! Form::close() !!}
</div>
@endsection
