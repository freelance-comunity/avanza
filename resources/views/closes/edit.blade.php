@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($close, ['route' => ['closes.update', $close->id], 'method' => 'patch']) !!}

        @include('closes.fields')

    {!! Form::close() !!}
</div>
@endsection
