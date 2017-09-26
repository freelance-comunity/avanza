@extends('layouts.app')

@section('main-content')
@section('message_level')
Regiones
@endsection
@section('message_level_here')
Crear
@endsection
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'regions.store','data-parsley-validate' => '']) !!}

        @include('regions.fields')

    {!! Form::close() !!}
</div>
@endsection
