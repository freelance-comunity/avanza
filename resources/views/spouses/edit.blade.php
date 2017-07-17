@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($spouse, ['route' => ['spouses.update', $spouse->id], 'method' => 'patch']) !!}

        @include('spouses.fields')

    {!! Form::close() !!}
</div>
@endsection
