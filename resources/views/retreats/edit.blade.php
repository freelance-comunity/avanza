@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($retreat, ['route' => ['retreats.update', $retreat->id], 'method' => 'patch']) !!}

        @include('retreats.fields')

    {!! Form::close() !!}
</div>
@endsection
