@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($income, ['route' => ['incomes.update', $income->id], 'method' => 'patch']) !!}

        @include('incomes.fields')

    {!! Form::close() !!}
</div>
@endsection
