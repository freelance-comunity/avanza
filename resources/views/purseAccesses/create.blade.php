@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'purseAccesses.store']) !!}

        @include('purseAccesses.fields')

    {!! Form::close() !!}
</div>
@endsection
