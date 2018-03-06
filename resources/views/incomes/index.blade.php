@extends('layouts.app')

@section('main-content')

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
        <table class="table" id="example">
            <thead>
                <th>Emisor</th>
                <th>Ammount</th>
                <th>Concept</th>
                {{-- <th width="50px">Action</th> --}}
                <th>Receptor</th>
                <th>Fecha Edit</th>

            </thead>
            <tbody>
                @foreach($incomes as $income)
                @php
                $vault = $income->vault;
                $user = $vault->user;
                @endphp
                <tr>
                    <td>{{$income->emisor}}</td>
                    <td>{!! $income->ammount !!}</td>
                    <td>{!! $income->concept !!}</td>
                    <td>{{$vault->user->name}}</td>
                   {{--  <td>
                        <a href="{!! route('incomes.edit', [$income->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('incomes.delete', [$income->id]) !!}" onclick="return confirm('Are you sure wants to delete this Income?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td> --}}
                    <td>{{$income->updated_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection