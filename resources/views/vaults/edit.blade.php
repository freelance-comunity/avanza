@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($vault, ['route' => ['vaults.update', $vault->id], 'method' => 'patch']) !!}

        @include('vaults.fields')

    {!! Form::close() !!}
</div>
@endsection
