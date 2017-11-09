@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'expenditureCredits.store']) !!}

        @include('expenditureCredits.fields')

    {!! Form::close() !!}
</div>
@endsection
