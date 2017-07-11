@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($branch, ['route' => ['branches.update', $branch->id], 'method' => 'patch']) !!}

        @include('branches.fields')

    {!! Form::close() !!}
</div>
@endsection
