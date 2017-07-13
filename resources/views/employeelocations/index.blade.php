@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Employeelocations</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('employeelocations.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($employeelocations->isEmpty())
                <div class="well text-center">No Employeelocations found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Country</th>
			<th>State</th>
			<th>Municipality</th>
			<th>Colony</th>
			<th>Type Of Road</th>
			<th>Name Road</th>
			<th>Outdoor Number</th>
			<th>Interior Number</th>
			<th>Postal Code</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($employeelocations as $employeelocation)
                        <tr>
                            <td>{!! $employeelocation->country !!}</td>
					<td>{!! $employeelocation->state !!}</td>
					<td>{!! $employeelocation->municipality !!}</td>
					<td>{!! $employeelocation->colony !!}</td>
					<td>{!! $employeelocation->type_of_road !!}</td>
					<td>{!! $employeelocation->name_road !!}</td>
					<td>{!! $employeelocation->outdoor_number !!}</td>
					<td>{!! $employeelocation->interior_number !!}</td>
					<td>{!! $employeelocation->postal_code !!}</td>
                            <td>
                                <a href="{!! route('employeelocations.edit', [$employeelocation->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('employeelocations.delete', [$employeelocation->id]) !!}" onclick="return confirm('Are you sure wants to delete this Employeelocation?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection