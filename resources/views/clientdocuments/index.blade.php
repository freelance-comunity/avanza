@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Clientdocuments</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('clientdocuments.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($clientdocuments->isEmpty())
                <div class="well text-center">No Clientdocuments found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Ine</th>
			<th>Curp</th>
			<th>Proof Of Addres</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($clientdocuments as $clientdocuments)
                        <tr>
                            <td>{!! $clientdocuments->ine !!}</td>
					<td>{!! $clientdocuments->curp !!}</td>
					<td>{!! $clientdocuments->proof_of_addres !!}</td>
                            <td>
                                <a href="{!! route('clientdocuments.edit', [$clientdocuments->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('clientdocuments.delete', [$clientdocuments->id]) !!}" onclick="return confirm('Are you sure wants to delete this Clientdocuments?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection