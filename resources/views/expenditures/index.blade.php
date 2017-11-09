@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Expenditures</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('expenditures.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($expenditures->isEmpty())
                <div class="well text-center">No Expenditures found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Ammount</th>
			<th>Concept</th>
			<th>Voucher</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($expenditures as $expenditure)
                        <tr>
                            <td>{!! $expenditure->ammount !!}</td>
					<td>{!! $expenditure->concept !!}</td>
					<td>{!! $expenditure->voucher !!}</td>
                            <td>
                                <a href="{!! route('expenditures.edit', [$expenditure->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('expenditures.delete', [$expenditure->id]) !!}" onclick="return confirm('Are you sure wants to delete this Expenditure?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection