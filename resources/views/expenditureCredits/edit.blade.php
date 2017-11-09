@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($expenditureCredit, ['route' => ['expenditureCredits.update', $expenditureCredit->id], 'method' => 'patch']) !!}

        @include('expenditureCredits.fields')

    {!! Form::close() !!}
</div>
@endsection
