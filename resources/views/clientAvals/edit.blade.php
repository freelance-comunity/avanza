@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($clientAval, ['route' => ['clientAvals.update', $clientAval->id], 'method' => 'patch','data-parsley-validate' => '']) !!}

        @include('clientAvals.fields')

    {!! Form::close() !!}
</div>
@endsection
