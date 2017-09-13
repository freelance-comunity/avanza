@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'regions.store','data-parsley-validate' => '']) !!}

        @include('regions.fields')

    {!! Form::close() !!}
</div>
@endsection
