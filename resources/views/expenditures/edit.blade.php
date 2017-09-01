@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($expenditure, ['route' => ['expenditures.update', $expenditure->id], 'method' => 'patch']) !!}

        @include('expenditures.fields')

    {!! Form::close() !!}
</div>
@endsection
