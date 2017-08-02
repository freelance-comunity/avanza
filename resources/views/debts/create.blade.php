@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'debts.store']) !!}

        @include('debts.fields')

    {!! Form::close() !!}
</div>
@endsection
