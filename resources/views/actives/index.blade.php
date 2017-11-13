@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Actives</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('actives.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($actives->isEmpty())
                <div class="well text-center">No Actives found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Ammount</th>
			<th>Concept</th>
			<th>Voucher</th>
			<th>Date</th>
			<th>Type</th>
			<th>Description</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($actives as $active)
                        <tr>
                            <td>{!! $active->ammount !!}</td>
					<td>{!! $active->concept !!}</td>
					<td>{!! $active->voucher !!}</td>
					<td>{!! $active->date !!}</td>
					<td>{!! $active->type !!}</td>
					<td>{!! $active->description !!}</td>
                            <td>
                                <a href="{!! route('actives.edit', [$active->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('actives.delete', [$active->id]) !!}" onclick="return confirm('Are you sure wants to delete this Active?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection