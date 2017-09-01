@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'incomes.store']) !!}

        @include('incomes.fields')

    {!! Form::close() !!}
</div>
@endsection
