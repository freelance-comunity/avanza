@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($transfer, ['route' => ['transfers.update', $transfer->id], 'method' => 'patch']) !!}

        @include('transfers.fields')

    {!! Form::close() !!}
</div>
@endsection
