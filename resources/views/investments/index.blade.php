@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Investments</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('investments.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($investments->isEmpty())
                <div class="well text-center">No Investments found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Ammount</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($investments as $investment)
                        <tr>
                            <td>{!! $investment->ammount !!}</td>
                            <td>
                                <a href="{!! route('investments.edit', [$investment->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('investments.delete', [$investment->id]) !!}" onclick="return confirm('Are you sure wants to delete this Investment?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection