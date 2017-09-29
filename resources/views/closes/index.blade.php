@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Closes</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('closes.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($closes->isEmpty())
                <div class="well text-center">No Closes found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Name User</th>
			<th>Role User</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($closes as $close)
                        <tr>
                            <td>{!! $close->name_user !!}</td>
					<td>{!! $close->role_user !!}</td>
                            <td>
                                <a href="{!! route('closes.edit', [$close->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('closes.delete', [$close->id]) !!}" onclick="return confirm('Are you sure wants to delete this Close?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection