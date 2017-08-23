@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($latePayments, ['route' => ['latePayments.update', $latePayments->id], 'method' => 'patch']) !!}

        @include('latePayments.fields')

    {!! Form::close() !!}
</div>
@endsection
