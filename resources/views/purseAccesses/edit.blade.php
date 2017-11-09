@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($purseAccess, ['route' => ['purseAccesses.update', $purseAccess->id], 'method' => 'patch']) !!}

        @include('purseAccesses.fields')

    {!! Form::close() !!}
</div>
@endsection
