@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($investment, ['route' => ['investments.update', $investment->id], 'method' => 'patch']) !!}

        @include('investments.fields')

    {!! Form::close() !!}
</div>
@endsection
