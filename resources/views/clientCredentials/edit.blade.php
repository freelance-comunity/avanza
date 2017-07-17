@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($clientCredential, ['route' => ['clientCredentials.update', $clientCredential->id], 'method' => 'patch']) !!}

        @include('clientCredentials.fields')

    {!! Form::close() !!}
</div>
@endsection
