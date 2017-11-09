@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'rosters.store', 'data-parsley-validate' => '']) !!}

        @include('rosters.fields')

    {!! Form::close() !!}
</div>
@endsection
