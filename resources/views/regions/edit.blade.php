@extends('layouts.app')

@section('main-content')
@section('message_level')
Regiones
@endsection
@section('message_level_here')
Editar
@endsection
<div class="container">

    @include('common.errors')

    {!! Form::model($region, ['route' => ['regions.update', $region->id], 'method' => 'patch']) !!}

        @include('regions.fields')

    {!! Form::close() !!}
</div>
@endsection
