@extends('layouts.app')

@section('main-content')
@section('contentheader_title')
Roles
@endsection
<div class="container">

    @include('flash::message')

    <div class="row">
        <!--<h1 class="pull-left">Roles</h1>-->
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('roles.create') !!}">Agregar Nuevo</a>
    </div>

    <div class="row">
        @if($roles->isEmpty())
        <div class="well text-center">No Roles found.</div>
        @else
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Display Name</th>
                <th>Description</th>
                <th width="50px">Action</th>
            </thead>
            <tbody>
               
                @foreach($roles as $role)
                <tr>
                    <td>{!! $role->name !!}</td>
                    <td>{!! $role->display_name !!}</td>
                    <td>{!! $role->description !!}</td>
                    <td>
                        <a href="{!! route('roles.edit', [$role->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('roles.delete', [$role->id]) !!}" onclick="return confirm('Are you sure wants to delete this Role?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection