@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($clientCompany, ['route' => ['clientCompanies.update', $clientCompany->id], 'method' => 'patch','data-parsley-validate' => '']) !!}

        @include('clientCompanies.fields')

    {!! Form::close() !!}
</div>
@endsection
