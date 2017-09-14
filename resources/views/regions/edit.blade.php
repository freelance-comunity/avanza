@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($region, ['route' => ['regions.update', $region->id], 'method' => 'patch']) !!}

        @include('regions.fields')

    {!! Form::close() !!}
</div>
@endsection
