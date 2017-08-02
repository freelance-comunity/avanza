@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'permissions.store']) !!}

        @include('permissions.fields')

    {!! Form::close() !!}
</div>
@endsection
