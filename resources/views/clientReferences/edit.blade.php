@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($clientReferences, ['route' => ['clientReferences.update', $clientReferences->id], 'method' => 'patch']) !!}

        @include('clientReferences.fields')

    {!! Form::close() !!}
</div>
@endsection
