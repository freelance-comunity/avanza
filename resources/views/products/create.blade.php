@extends('layouts.app')

@section('main-content')
@section('message_level')
Productos
@endsection
@section('message_level_here')
Crear
@endsection
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'products.store','data-parsley-validate' => '']) !!}

        @include('products.fields')

    {!! Form::close() !!}
</div>
@endsection
