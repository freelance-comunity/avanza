@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($employeelocation, ['route' => ['employeelocations.update', $employeelocation->id], 'method' => 'patch']) !!}

        @include('employeelocations.fields')

    {!! Form::close() !!}
</div>
@endsection
