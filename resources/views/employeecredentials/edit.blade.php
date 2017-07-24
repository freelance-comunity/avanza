@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($employeecredentials, ['route' => ['employeecredentials.update', $employeecredentials->id], 'method' => 'patch', 'data-parsley-validate' => '']) !!}

        @include('employeecredentials.fields')

    {!! Form::close() !!}
</div>
@endsection
