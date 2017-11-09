@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'retreats.store']) !!}

        @include('retreats.fields')

    {!! Form::close() !!}
</div>
@endsection
