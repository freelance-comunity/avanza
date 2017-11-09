@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($credit, ['route' => ['credits.update', $credit->id], 'method' => 'patch']) !!}

        @include('credits.fields')

    {!! Form::close() !!}
</div>
@endsection
