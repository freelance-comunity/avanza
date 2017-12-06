
@extends('layouts.app')

@section('htmlheader_title')
Home
@endsection
@section('main-content')
@section('message_level')
Reportes
@endsection
@section('message_level_here')
Pagos
@endsection
<div class="row">
    <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Historial de pagos</h3>
            </div>  
            <div class="box-body">

                <div class="table-responsive">
                    <table class="table" id="totalpayments">
                        <thead class="bg-success">
                            <th># Cuota</th>
                            <th>Región</th>
                            <th>Sucursal</th>
                            <th>Promotor</th>
                            <th>Cliente</th>
                            <th>Folio</th>
                            <th>Tipo de Crédito</th>
                            <th>Cuotas</th>
                            <th>Tasa</th>
                            <th>Monto</th>
                            <th>Capital</th>
                            <th>Intereses</th>
                            <th>Moratorio</th>
                            <th>Fecha/Hora asignación</th>

                        </thead>
                    
                        
                    </table>
                </div>

            </div>
        </div>
    </div>
    @endsection

