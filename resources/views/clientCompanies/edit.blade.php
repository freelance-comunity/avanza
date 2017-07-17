@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($clientCompany, ['route' => ['clientCompanies.update', $clientCompany->id], 'method' => 'patch']) !!}

        @include('clientCompanies.fields')

    {!! Form::close() !!}
</div>
@endsection
