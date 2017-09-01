@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Vaults</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('vaults.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($vaults->isEmpty())
                <div class="well text-center">No Vaults found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Ammount</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($vaults as $vault)
                        <tr>
                            <td>{!! $vault->ammount !!}</td>
                            <td>
                                <a href="{!! route('vaults.edit', [$vault->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('vaults.delete', [$vault->id]) !!}" onclick="return confirm('Are you sure wants to delete this Vault?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection