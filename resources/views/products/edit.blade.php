@extends('layouts.app')

@section('main-content')
@section('message_level')
Productos
@endsection
@section('message_level_here')
Editar
@endsection
<div class="container">

    @include('common.errors')

    {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'patch']) !!}

        @include('products.fields-edit')

    {!! Form::close() !!}
</div>
@endsection
