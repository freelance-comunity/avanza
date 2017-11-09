@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'payments.store']) !!}

        @include('payments.fields')

    {!! Form::close() !!}
</div>
@endsection
