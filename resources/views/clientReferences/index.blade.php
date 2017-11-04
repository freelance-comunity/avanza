@extends('layouts.app')

@section('main-content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">ClientReferences</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('clientReferences.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($clientReferences->isEmpty())
                <div class="well text-center">No ClientReferences found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Name Reference</th>
			<th>Last Name Reference</th>
			<th>Mothers Name Reference</th>
			<th>Phone Reference</th>
			<th>Relationship</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($clientReferences as $clientReferences)
                        <tr>
                            <td>{!! $clientReferences->name_reference !!}</td>
					<td>{!! $clientReferences->last_name_reference !!}</td>
					<td>{!! $clientReferences->mothers_name_reference !!}</td>
					<td>{!! $clientReferences->phone_reference !!}</td>
					<td>{!! $clientReferences->relationship !!}</td>
                            <td>
                                <a href="{!! route('clientReferences.edit', [$clientReferences->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('clientReferences.delete', [$clientReferences->id]) !!}" onclick="return confirm('Are you sure wants to delete this ClientReferences?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection