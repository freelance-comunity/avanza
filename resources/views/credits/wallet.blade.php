
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
                    <table class="table" id="wallet">
                        <thead class="bg-success">
                            <th>ID</th>
                            <th>Folio </th>
                            <th>Región</th>
                            <th>Tipo de Crédito</th>
                            <th>Promotor</th>
                            <th>Cliente</th>
                            <th>Fecha Contrato</th>
                            <th>Sucursal</th>
                            <th>Monto</th>
                            <th>Tasa</th>
                            <th># Cuotas</th>  
                            <th>Cuotas Pagadas</th>
                            <th>Cuotas Parciales</th>
                            <th>Estatus</th>
                        </thead>
                    
                        
                    </table>
                </div>

            </div>
        </div>
    </div>
    @endsection

