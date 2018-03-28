@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Finals</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('finals.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($finals->isEmpty())
                <div class="well text-center">No Finals found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Date</th>
			<th>Region</th>
			<th>Branch</th>
			<th>Name</th>
			<th>Vault</th>
			<th>Incomes</th>
			<th>Incomepayment</th>
			<th>Access</th>
			<th>Credit</th>
			<th>Expenditures</th>
			<th>Actives</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($finals as $final)
                        <tr>
                            <td>{!! $final->date !!}</td>
					<td>{!! $final->region !!}</td>
					<td>{!! $final->branch !!}</td>
					<td>{!! $final->name !!}</td>
					<td>{!! $final->vault !!}</td>
					<td>{!! $final->incomes !!}</td>
					<td>{!! $final->incomePayment !!}</td>
					<td>{!! $final->access !!}</td>
					<td>{!! $final->credit !!}</td>
					<td>{!! $final->expenditures !!}</td>
					<td>{!! $final->actives !!}</td>
                            <td>
                                <a href="{!! route('finals.edit', [$final->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('finals.delete', [$final->id]) !!}" onclick="return confirm('Are you sure wants to delete this Final?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection