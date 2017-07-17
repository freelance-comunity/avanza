@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">ClientCompanies</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('clientCompanies.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($clientCompanies->isEmpty())
                <div class="well text-center">No ClientCompanies found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Name Company</th>
			<th>Country</th>
			<th>State</th>
			<th>Municipality Company</th>
			<th>Colony Company</th>
			<th>Type Of Road Company</th>
			<th>Name Road</th>
			<th>Outdoor Number</th>
			<th>Interior Number Company</th>
			<th>Postal Code Company</th>
			<th>Latitude Company</th>
			<th>Length Company</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($clientCompanies as $clientCompany)
                        <tr>
                            <td>{!! $clientCompany->name_company !!}</td>
					<td>{!! $clientCompany->country !!}</td>
					<td>{!! $clientCompany->state !!}</td>
					<td>{!! $clientCompany->municipality_company !!}</td>
					<td>{!! $clientCompany->colony_company !!}</td>
					<td>{!! $clientCompany->type_of_road_company !!}</td>
					<td>{!! $clientCompany->name_road !!}</td>
					<td>{!! $clientCompany->outdoor_number !!}</td>
					<td>{!! $clientCompany->interior_number_company !!}</td>
					<td>{!! $clientCompany->postal_code_company !!}</td>
					<td>{!! $clientCompany->latitude_company !!}</td>
					<td>{!! $clientCompany->length_company !!}</td>
                            <td>
                                <a href="{!! route('clientCompanies.edit', [$clientCompany->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('clientCompanies.delete', [$clientCompany->id]) !!}" onclick="return confirm('Are you sure wants to delete this ClientCompany?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection