@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Debts</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('debts.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($debts->isEmpty())
                <div class="well text-center">No Debts found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Ammount</th>
			<th>Status</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($debts as $debt)
                        <tr>
                            <td>{!! $debt->ammount !!}</td>
					<td>{!! $debt->status !!}</td>
                            <td>
                                <a href="{!! route('debts.edit', [$debt->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('debts.delete', [$debt->id]) !!}" onclick="return confirm('Are you sure wants to delete this Debt?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection