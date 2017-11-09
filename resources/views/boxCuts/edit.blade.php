@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($boxCut, ['route' => ['boxCuts.update', $boxCut->id], 'method' => 'patch']) !!}

        @include('boxCuts.fields')

    {!! Form::close() !!}
</div>
@endsection
