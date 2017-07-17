@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'clientReferences.store']) !!}

        @include('clientReferences.fields')

    {!! Form::close() !!}
</div>
@endsection
