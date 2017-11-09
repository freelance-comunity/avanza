@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($debt, ['route' => ['debts.update', $debt->id], 'method' => 'patch']) !!}

        @include('debts.fields')

    {!! Form::close() !!}
</div>
@endsection
