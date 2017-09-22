@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'clientAvals.store','id'=>'formaval']) !!}

        @include('clientAvals.fields')

    {!! Form::close() !!}
</div>
@endsection
