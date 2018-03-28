@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($final, ['route' => ['finals.update', $final->id], 'method' => 'patch']) !!}

        @include('finals.fields')

    {!! Form::close() !!}
</div>
@endsection
