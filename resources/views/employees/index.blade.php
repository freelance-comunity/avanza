@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Employees</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('employees.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($employees->isEmpty())
                <div class="well text-center">No Employees found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Name</th>
			<th>Mother Last Name</th>
			<th>Father Last Name</th>
			<th>Address</th>
			<th>Latitude</th>
			<th>Length</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Branch Id</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($employees as $employee)
                        <tr>
                            <td>{!! $employee->name !!}</td>
					<td>{!! $employee->mother_last_name !!}</td>
					<td>{!! $employee->father_last_name !!}</td>
					<td>{!! $employee->address !!}</td>
					<td>{!! $employee->latitude !!}</td>
					<td>{!! $employee->length !!}</td>
					<td>{!! $employee->phone !!}</td>
					<td>{!! $employee->email !!}</td>
					<td>{!! $employee->branch_id !!}</td>
                            <td>
                                <a href="{!! route('employees.edit', [$employee->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('employees.delete', [$employee->id]) !!}" onclick="return confirm('Are you sure wants to delete this Employee?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection