@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'clientCompanies.store']) !!}

        @include('clientCompanies.fields')

    {!! Form::close() !!}
</div>
@endsection
