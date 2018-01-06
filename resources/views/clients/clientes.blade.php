
@extends('layouts.app')

@section('htmlheader_title')
Home
@endsection
@section('main-content')
@section('message_level')
Clientes Jorge
@endsection
@section('message_level_here')
Pagos
@endsection
<div class="row">
    <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Clientes</h3>
            </div>  
            <div class="box-body">

                <div class="table-responsive">
                    <table class="table" id="example">
                        <thead class="bg-success">
                            <th>Nombre del Cliente</th>
                            <th>Curp</th>
                            <th>Ine</th>
                            <th>Sucursal</th>
                           <th>Documentos</th>
                        </thead>
                     <tbody>
                        @foreach ($clients as $client)
                        @php
                            $location = $client->location;
                            $document= $client->document;
                        @endphp
                            <tr>
                                <td>{{$client->firts_name}} {{$client->last_name}} {{$client->mothers_last_name}}</td>
                                <td>{{$client->curp}}</td>
                                <td>{{$client->ine}}</td>
                                <td>{{$client->branch['name']}}</td>
                                <td> <a href="{{ url('pdf') }}/{{ $client->id }}"><i class="fa fa-file-pdf-o fa-5x"></i></a></td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                        
                    </table>
                </div>

            </div>
        </div>
    </div>
    @endsection

