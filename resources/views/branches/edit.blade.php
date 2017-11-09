@extends('layouts.app')

@section('main-content')
@section('message_level')
Sucursales
@endsection
@section('message_level_here')
Editar
@endsection
<div class="container">

    @include('common.errors')

    {!! Form::model($branch, ['route' => ['branches.update', $branch->id], 'method' => 'patch', 'data-parsley-validate' => '']) !!}

        @include('branches.fields-edit')

    {!! Form::close() !!}
</div>
@endsection
