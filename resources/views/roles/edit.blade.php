@extends('layouts.app')

@section('main-content')
@section('contentheader_title')
Editar
@endsection
<div class="container">

    @include('common.errors')

    {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'patch', 'data-parsley-validate' => '']) !!}

        @include('roles.fields')

    {!! Form::close() !!}
</div>
@endsection
