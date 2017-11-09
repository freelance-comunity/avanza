@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'clientReferences.store','data-parsley-validate' => '', 'onsubmit'=>'return checkSubmit();']) !!}

        @include('clientReferences.fields')

    {!! Form::close() !!}
</div>
@endsection
