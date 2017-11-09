@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'latePayments.store']) !!}

        @include('latePayments.fields')

    {!! Form::close() !!}
</div>
@endsection
