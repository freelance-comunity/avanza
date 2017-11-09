@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'incomePayments.store']) !!}

        @include('incomePayments.fields')

    {!! Form::close() !!}
</div>
@endsection
