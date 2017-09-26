@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'patch']) !!}

        @include('products.fields-edit')

    {!! Form::close() !!}
</div>
@endsection
