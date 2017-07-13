@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($client, ['route' => ['clients.update', $client->id], 'method' => 'patch']) !!}

        @include('clients.fields')

    {!! Form::close() !!}
</div>
@endsection
