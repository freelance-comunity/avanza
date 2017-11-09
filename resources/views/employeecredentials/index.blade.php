@extends('app')

@section('content')

<div class="container">

    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">Employeecredentials</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('employeecredentials.create') !!}">Add New</a>
    </div>

    <div class="row">
        @if($employeecredentials->isEmpty())
        <div class="well text-center">No Employeecredentials found.</div>
        @else
        <table class="table">
            <thead>
                <th>Ine</th>
                <th>Curp</th>
                <th>Rfc</th>
                <th>Passport</th>
                <th>Number Imss</th>
                <th>Driver License</th>
                <th>Professional Id</th>
                <th width="50px">Action</th>
            </thead>
            <tbody>
               
                @foreach($employeecredentials as $employeecredentials)
                <tr>
                    <td>{!! $employeecredentials->ine !!}</td>
                    <td>{!! $employeecredentials->curp !!}</td>
                    <td>{!! $employeecredentials->rfc !!}</td>
                    <td>{!! $employeecredentials->passport !!}</td>
                    <td>{!! $employeecredentials->number_imss !!}</td>
                    <td>{!! $employeecredentials->driver_license !!}</td>
                    <td>{!! $employeecredentials->professional_id !!}</td>
                    <td>
                        <a href="{!! route('employeecredentials.edit', [$employeecredentials->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('employeecredentials.delete', [$employeecredentials->id]) !!}" onclick="return confirm('Are you sure wants to delete this Employeecredentials?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection