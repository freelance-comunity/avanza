@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'vaults.store']) !!}

        @include('vaults.fields')

    {!! Form::close() !!}
</div>
@endsection
