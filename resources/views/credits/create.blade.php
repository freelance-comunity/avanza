@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'credits.store','data-parsley-validate' => '']) !!}

        @include('credits.fields')

    {!! Form::close() !!}
</div>
@endsection
