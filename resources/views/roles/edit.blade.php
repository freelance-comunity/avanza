@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'patch']) !!}

        @include('roles.fields')

    {!! Form::close() !!}
</div>
@endsection
