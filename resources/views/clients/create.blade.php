@extends('layouts.app')

@section('main-content')
@section('message_level')
Clientes
@endsection
@section('message_level_here')
Crear
@endsection
@section('contentheader_title')
Crear Nuevo Cliente 
@endsection
<div class="container">

	@include('common.errors')

	{!! Form::open(['route' => 'clients.store', 'files' => 'true', 'data-parsley-validate' => '', 'id'=>'formclient','onsubmit'=>'return checkSubmit();']) !!}

	@include('clients.fieldsClient')


	{!! Form::close() !!}
</div>
@endsection
