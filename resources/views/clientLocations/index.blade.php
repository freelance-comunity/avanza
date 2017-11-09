@extends('app')

@section('content')

<div class="container">

    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">ClientLocations</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('clientLocations.create') !!}">Add New</a>
    </div>

    <div class="row">
        @if($clientLocations->isEmpty())
        <div class="well text-center">No ClientLocations found.</div>
        @else
        <table class="table">
            <thead>
                <th>Country</th>
                <th>State</th>
                <th>Municipality</th>
                <th>Colony</th>
                <th>Type Of Road</th>
                <th>Name Road</th>
                <th>Outdoor Number</th>
                <th>Interior Number</th>
                <th>Postal Code</th>
                <th>Latitude</th>
                <th>Lenght</th>
                <th width="50px">Action</th>
            </thead>
            <tbody>
               
                @foreach($clientLocations as $clientLocation)
                <tr>
                    <td>{!! $clientLocation->country !!}</td>
                    <td>{!! $clientLocation->state !!}</td>
                    <td>{!! $clientLocation->municipality !!}</td>
                    <td>{!! $clientLocation->colony !!}</td>
                    <td>{!! $clientLocation->type_of_road !!}</td>
                    <td>{!! $clientLocation->name_road !!}</td>
                    <td>{!! $clientLocation->outdoor_number !!}</td>
                    <td>{!! $clientLocation->interior_number !!}</td>
                    <td>{!! $clientLocation->postal_code !!}</td>
                    <td>{!! $clientLocation->latitude !!}</td>
                    <td>{!! $clientLocation->lenght !!}</td>
                    <td>
                        <a href="{!! route('clientLocations.edit', [$clientLocation->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('clientLocations.delete', [$clientLocation->id]) !!}" onclick="return confirm('Are you sure wants to delete this ClientLocation?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection