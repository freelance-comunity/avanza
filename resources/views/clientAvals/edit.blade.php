@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($clientAval, ['route' => ['clientAvals.update', $clientAval->id], 'method' => 'patch']) !!}

        @include('clientAvals.fields')

    {!! Form::close() !!}
</div>
@endsection
