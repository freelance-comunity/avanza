@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">ExpenditureCredits</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('expenditureCredits.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($expenditureCredits->isEmpty())
                <div class="well text-center">No ExpenditureCredits found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Ammount</th>
			<th>Concept</th>
			<th>Date</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($expenditureCredits as $expenditureCredit)
                        <tr>
                            <td>{!! $expenditureCredit->ammount !!}</td>
					<td>{!! $expenditureCredit->concept !!}</td>
					<td>{!! $expenditureCredit->date !!}</td>
                            <td>
                                <a href="{!! route('expenditureCredits.edit', [$expenditureCredit->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('expenditureCredits.delete', [$expenditureCredit->id]) !!}" onclick="return confirm('Are you sure wants to delete this ExpenditureCredit?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection