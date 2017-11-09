@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($payment, ['route' => ['payments.update', $payment->id], 'method' => 'patch']) !!}

        @include('payments.fields')

    {!! Form::close() !!}
</div>
@endsection
