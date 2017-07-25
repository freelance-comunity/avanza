@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'products.store','data-parsley-validate' => '']) !!}

        @include('products.fields')

    {!! Form::close() !!}
</div>
@endsection
