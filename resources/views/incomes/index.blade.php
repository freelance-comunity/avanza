@extends('app')

@section('content')

<div class="container">

    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">Incomes</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('incomes.create') !!}">Add New</a>
    </div>

    <div class="row">
        @if($incomes->isEmpty())
        <div class="well text-center">No Incomes found.</div>
        @else
        <table class="table">
            <thead>
                <th>Ammount</th>
                <th>Concept</th>
                <th width="50px">Action</th>
            </thead>
            <tbody>
               
                @foreach($incomes as $income)
                <tr>
                    <td>{!! $income->ammount !!}</td>
                    <td>{!! $income->concept !!}</td>
                    <td>
                        <a href="{!! route('incomes.edit', [$income->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('incomes.delete', [$income->id]) !!}" onclick="return confirm('Are you sure wants to delete this Income?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection