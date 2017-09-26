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

	</header><br>
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i></i> DATOS DEL CRÉDITO
            <small class="pull-right">{{strtoupper($credit->date->format('l, d F Y'))}}</small>
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
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
           Cuotas: {{$credit->dues}}<br>
            Cuotas Pagadas: {{$pay}}<br>
           Cuotas Restantes: {{$rest}}
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

     {{--  <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Product</th>
              <th>Serial #</th>
              <th>Description</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>1</td>
              <td>Call of Duty</td>
              <td>455-981-221</td>
              <td>El snort testosterone trophy driving gloves handsome</td>
              <td>$64.50</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Need for Speed IV</td>
              <td>247-925-726</td>
              <td>Wes Anderson umami biodiesel</td>
              <td>$50.00</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Monsters DVD</td>
              <td>735-845-642</td>
              <td>Terry Richardson helvetica tousled street art master</td>
              <td>$10.70</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Grown Ups Blue Ray</td>
              <td>422-568-642</td>
              <td>Tousled lomo letterpress</td>
              <td>$25.99</td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div> --}}
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        {{-- <div class="col-xs-6">
          <p class="lead">Payment Methods:</p>
          <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p>
        </div> --}}
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Resumen</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
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
        <div class="col-xs-12">
          
          
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generar PDF
          </button>
        </div>
      </div>
    </section>
@endsection