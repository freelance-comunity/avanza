@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'branches.store']) !!}

        @include('branches.fields')

    {!! Form::close() !!}
</div>
@endsection
