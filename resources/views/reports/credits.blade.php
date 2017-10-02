<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>REPORTE CRÉDITOS</title>
  <link rel="stylesheet" href="style.css" media="all" />
  <link rel="stylesheet" href="{{ asset('css/report.css') }}">
</head>
<body>
  @php
  $credits = App\Models\Credit::orderBy('folio', 'desc')->get();
  @endphp
  <header class="clearfix">
    <div id="logo">
      <img src="{{ asset('img/logo.jpg') }}">
    </div>
    <h1>REPORTE CRÉDITOS</h1>
    <div id="project">
      <div><span>FECHA</span> {{ Carbon\Carbon::now()->toDateTimeString() }}</div>
      <div><span>SOLICITA</span> {{ Auth::user()->name }} {{ Auth::user()->father_last_name }} {{ Auth::user()->mother_last_name }}</div>
    </div>
  </header>
  <main>
    <table>
      <thead>
        <tr>
          <th class="service">FOLIO</th>
          <th class="service">SUCURSAL</th>
          <th class="service">REGISTRO</th>
          <th class="service">SALDO <br> VIGENTE</th>
          <th class="service">SALDO <br> VENCIDO</th>
          <th class="service">SALDO <br> TOTAL</th>
          <th class="service">NOMBRE</th>
          <th class="service">APELLIDOS</th>
          <th class="service">PROMOTOR</th>
          <th class="service">FRECUENCIA</th>
          <th class="service">MONTO</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($credits as $credit)
        @php
          $debt = $credit->debt;
          $filtered_payments = $debt->payments;
          $late_payments = $filtered_payments->where('status','Vencido');
        @endphp
        <tr>
          <td class="service">{{ $credit->folio }}</td>
          <td class="service">{{ $credit->branch }}</td>
          <td class="service">{{ $credit->created_at->toFormattedDateString() }}</td>
          <td class="service">{{ number_format($debt->ammount - $late_payments->sum('ammount'),2) }}</td>
          <td class="service">{{ number_format($late_payments->sum('ammount'),2) }}</td>
          <td class="service">{{ number_format($debt->ammount,2) }}</td>
          <td class="service">{{ $credit->firts_name }}</td>
          <td class="service">{{ $credit->last_name }} {{ $credit->mothers_last_name }}</td>
          <td class="service">{{ $credit->adviser }}</td>
          <td class="service">{{ $credit->periodicity }}</td>
          <td class="service">${{ number_format($credit->ammount,2) }}</td>
        </tr>
        @endforeach
        <tr>
          <td colspan="10" class="grand total">TOTAL MINISTRADO</td>
          <td class="grand total">${{ number_format($credits->sum('ammount'),2) }}</td>
        </tr>
      </tbody>
    </table>
    <div id="notices">
      <div>NOTA:</div>
      <div class="notice">Este reporte puede variar segun el tiempo.</div>
    </div>
  </main>
  <footer>
    El reporte fue creado en el sistema de crediefectivo.mx.
  </footer>
</body>
</html>