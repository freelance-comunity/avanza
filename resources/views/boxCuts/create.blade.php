@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'boxCuts.store']) !!}

        @include('boxCuts.fields')

    {!! Form::close() !!}
</div>
@endsection
