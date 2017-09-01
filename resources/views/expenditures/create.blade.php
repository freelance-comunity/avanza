@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'expenditures.store']) !!}

        @include('expenditures.fields')

    {!! Form::close() !!}
</div>
@endsection
