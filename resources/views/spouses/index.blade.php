@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Spouses</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('spouses.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($spouses->isEmpty())
                <div class="well text-center">No Spouses found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Firts Name</th>
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
			<th>Postal Code</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($spouses as $spouse)
                        <tr>
                            <td>{!! $spouse->firts_name !!}</td>
					<td>{!! $spouse->last_name !!}</td>
					<td>{!! $spouse->mothers_name !!}</td>
					<td>{!! $spouse->birthdate !!}</td>
					<td>{!! $spouse->curp !!}</td>
					<td>{!! $spouse->phone !!}</td>
					<td>{!! $spouse->civil_status !!}</td>
					<td>{!! $spouse->scholarship !!}</td>
					<td>{!! $spouse->state !!}</td>
					<td>{!! $spouse->municipality !!}</td>
					<td>{!! $spouse->colony !!}</td>
					<td>{!! $spouse->street !!}</td>
					<td>{!! $spouse->number !!}</td>
					<td>{!! $spouse->postal_code !!}</td>
                            <td>
                                <a href="{!! route('spouses.edit', [$spouse->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('spouses.delete', [$spouse->id]) !!}" onclick="return confirm('Are you sure wants to delete this Spouse?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection