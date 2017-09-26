@extends('layouts.app')

@section('main-content')
@section('message_level')
Clientes
@endsection
@section('message_level_here')
Editar
@endsection
@section('contentheader_title')
Editar Cliente	
@endsection
<div class="container">

    @include('common.errors')

    {!! Form::model($client, ['route' => ['clients.update', $client->id], 'method' => 'patch','data-parsley-validate' => '']) !!}

        @include('clients.fields-edit')

    {!! Form::close() !!}
</div>
@endsection
