@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($active, ['route' => ['actives.update', $active->id], 'method' => 'patch']) !!}

        @include('actives.fields')

    {!! Form::close() !!}
</div>
@endsection
