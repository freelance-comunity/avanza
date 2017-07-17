@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">ClientAvals</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('clientAvals.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($clientAvals->isEmpty())
                <div class="well text-center">No ClientAvals found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Name</th>
			<th>Last Name</th>
			<th>Mothers Name</th>
			<th>Birthdate</th>
			<th>Curp</th>
			<th>Phone</th>
			<th>Civil Status</th>
			<th>Scholarship</th>
			<th>State</th>
			<th>Municipality</th>
			<th>Colony</th>
			<th>Street</th>
			<th>Number</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($clientAvals as $clientAval)
                        <tr>
                            <td>{!! $clientAval->name !!}</td>
					<td>{!! $clientAval->last_name !!}</td>
					<td>{!! $clientAval->mothers_name !!}</td>
					<td>{!! $clientAval->birthdate !!}</td>
					<td>{!! $clientAval->curp !!}</td>
					<td>{!! $clientAval->phone !!}</td>
					<td>{!! $clientAval->civil_status !!}</td>
					<td>{!! $clientAval->scholarship !!}</td>
					<td>{!! $clientAval->state !!}</td>
					<td>{!! $clientAval->municipality !!}</td>
					<td>{!! $clientAval->colony !!}</td>
					<td>{!! $clientAval->street !!}</td>
					<td>{!! $clientAval->number !!}</td>
                            <td>
                                <a href="{!! route('clientAvals.edit', [$clientAval->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('clientAvals.delete', [$clientAval->id]) !!}" onclick="return confirm('Are you sure wants to delete this ClientAval?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection