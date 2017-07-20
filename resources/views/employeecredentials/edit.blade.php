@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($employeecredentials, ['route' => ['employeecredentials.update', $employeecredentials->id], 'method' => 'patch']) !!}

        @include('employeecredentials.fields')

    {!! Form::close() !!}
</div>
@endsection
