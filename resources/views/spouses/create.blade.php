@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'spouses.store']) !!}

        @include('spouses.fields')

    {!! Form::close() !!}
</div>
@endsection
