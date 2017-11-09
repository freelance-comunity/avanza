@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($incomePayment, ['route' => ['incomePayments.update', $incomePayment->id], 'method' => 'patch']) !!}

        @include('incomePayments.fields')

    {!! Form::close() !!}
</div>
@endsection
