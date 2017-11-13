@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'actives.store']) !!}

        @include('actives.fields')

    {!! Form::close() !!}
</div>
@endsection
