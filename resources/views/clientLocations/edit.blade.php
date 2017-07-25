@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($clientLocation, ['route' => ['clientLocations.update', $clientLocation->id], 'method' => 'patch','data-parsley-validate' => '']) !!}

        @include('clientLocations.fields')

    {!! Form::close() !!}
</div>
@endsection
