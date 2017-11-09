@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">PurseAccesses</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('purseAccesses.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($purseAccesses->isEmpty())
                <div class="well text-center">No PurseAccesses found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Ammount</th>
			<th>Concept</th>
			<th>Voucher</th>
			<th>Date</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($purseAccesses as $purseAccess)
                        <tr>
                            <td>{!! $purseAccess->ammount !!}</td>
					<td>{!! $purseAccess->concept !!}</td>
					<td>{!! $purseAccess->voucher !!}</td>
					<td>{!! $purseAccess->date !!}</td>
                            <td>
                                <a href="{!! route('purseAccesses.edit', [$purseAccess->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('purseAccesses.delete', [$purseAccess->id]) !!}" onclick="return confirm('Are you sure wants to delete this PurseAccess?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection