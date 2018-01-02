@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'transfers.store']) !!}

        @include('transfers.fields')

    {!! Form::close() !!}
</div>
@endsection
