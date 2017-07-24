@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($clientdocuments, ['route' => ['clientdocuments.update', $clientdocuments->id], 'method' => 'patch']) !!}

        @include('clientdocuments.fields')

    {!! Form::close() !!}
</div>
@endsection
