@extends('layouts.app')

@section('main-content')
@section('message_level')
Créditos
@endsection
@section('message_level_here')
Estado de Cuenta
@endsection
<section class="content-header">

  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <header class="clearfix">
      <div id="logo">
       <img style="max-width: 40%;
       height: auto;
       display: inline;
       margin: auto;" src="{{asset('img/logo.jpg')}}">
     </div>
     @php
     $now = \Carbon\Carbon::today()->toDateString();
     @endphp
   </header><br>
 
   <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i></i> DATOS DEL CRÉDITO
        <small class="pull-right">{{$now}}</small>
      </h2>
    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">

      <address>
        <strong>{{$credit->firts_name}} {{$credit->last_name}} {{$credit->mothers_last_name}}</strong><br>
        {{$credit->street}} {{$credit->number}}<br>
        Colonia: {{$credit->colony}}<br>
        C.P. {{$credit->postal_code}}<br>
        {{$credit->municipality}}, {{$credit->state}}.
      </address>
    </div>
    @php
    $interest = $credit->interest_rate /100;
    $mult = $credit->ammount * $interest;
    $total = $credit->ammount + $mult;
    $debt = $credit->debt;
    $pay =  App\Models\Payment::where('debt_id', $debt->id)->where('status', 'Pagado')->count();
    $rest = $credit->dues - $pay;
    $total_payment = $debt->payments->sum('payment');
    @endphp
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <address>
        <strong>Folio: {{$credit->folio}}</strong><br>
        Fecha de Contrato: {{strtoupper($credit->date->format('d F Y'))}}<br>
        Total a pagar: ${{number_format($total,2)}}<br>
        Tasa: {{$credit->interest_rate}}%<br>
        Estatus del Crédito: {{$credit->debt->status}}
      </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
     Cuotas: {{$credit->dues}}<br>
     Cuotas Pagadas: {{$pay}}<br>
     Cuotas Restantes: {{$rest}}
     <br>
   </div>
   <!-- /.col -->
 </div>


 <div class="row">
   <div class="col-xs-6">
    <p class="lead">Resumen</p>

    <div class="table-responsive">
      <table class="table">
        <tr >
          <th  style="width:50%">Subtotal:</th>
          <td>${{number_format($credit->ammount,2)}}</td>
        </tr>
        <tr>
          <th>Interes ({{$credit->interest_rate}}%)</th>
          <td>${{number_format($mult,2)}}</td>
        </tr>
        <tr>
          <th>Pagado:</th>
          <td>${{number_format($total_payment,2)}}</td>
        </tr>
        <tr>
          <th>Total:</th>
          <td>${{number_format($debt->ammount,2)}}</td>
        </tr>
      </table>
    </div>
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

<!-- this row will not appear when printing -->
<div class="row no-print">
        {{-- <div class="col-xs-12">
          
          
          <a href="{{ url('account_pdf') }}/{{$credit->id}}" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generar PDF
          </a>
        </div> --}}
      </div>
    </section>
    @endsection