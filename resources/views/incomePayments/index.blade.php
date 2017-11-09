@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">IncomePayments</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('incomePayments.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($incomePayments->isEmpty())
                <div class="well text-center">No IncomePayments found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Ammount</th>
			<th>Concept</th>
			<th>Date</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($incomePayments as $incomePayment)
                        <tr>
                            <td>{!! $incomePayment->ammount !!}</td>
					<td>{!! $incomePayment->concept !!}</td>
					<td>{!! $incomePayment->date !!}</td>
                            <td>
                                <a href="{!! route('incomePayments.edit', [$incomePayment->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('incomePayments.delete', [$incomePayment->id]) !!}" onclick="return confirm('Are you sure wants to delete this IncomePayment?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection