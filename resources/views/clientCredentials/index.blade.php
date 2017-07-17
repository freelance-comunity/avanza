@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">ClientCredentials</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('clientCredentials.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($clientCredentials->isEmpty())
                <div class="well text-center">No ClientCredentials found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Ine</th>
			<th>Curp</th>
			<th>Rfc</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($clientCredentials as $clientCredential)
                        <tr>
                            <td>{!! $clientCredential->ine !!}</td>
					<td>{!! $clientCredential->curp !!}</td>
					<td>{!! $clientCredential->rfc !!}</td>
                            <td>
                                <a href="{!! route('clientCredentials.edit', [$clientCredential->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('clientCredentials.delete', [$clientCredential->id]) !!}" onclick="return confirm('Are you sure wants to delete this ClientCredential?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection