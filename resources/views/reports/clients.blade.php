<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>REPORTE CLIENTES</title>
  <link rel="stylesheet" href="style.css" media="all" />
  <link rel="stylesheet" href="{{ asset('css/report.css') }}">
</head>
<body>
  @php
  $clients = App\Models\Client::orderBy('folio', 'desc')->get();
  @endphp
  <header class="clearfix">
    <div id="logo">
      <img src="{{ asset('img/logo.jpg') }}">
    </div>
    <h1>REPORTE CLIENTES</h1>
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
          <th class="service">NOMBRE</th>
          <th class="service">APE. PATERNO</th>
          <th class="service">APE. MATERNO</th>
          <th class="service">TELÉFONO</th>
          <th class="service">REGISTRO</th>
          <th class="service">TOTAL<br> CRÉDITOS</th>
          <th class="service">TOTAL CRÉDITOS <br> PAGADOS</th>
          <th class="service">SALDO <br> VIGENTE</th>
          <th class="service">SUCURSAL</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($clients as $client)
        @php
          $credits = $client->credits;
          $paid_out = $credits->where('status', 'Pagado');
        @endphp
        <tr>
          <td class="service">{{ $client->folio }}</td>
          <td class="service">{{ $client->firts_name }}</td>
          <td class="service">{{ $client->last_name }}</td>
          <td class="service">{{ $client->mothers_last_name }}</td>
          <td class="service">{{ $client->phone }}</td>
          <td class="service">{{ $client->created_at->toFormattedDateString()  }}</td>
          <td class="service">{{ $credits->count() }}</td>
          <td class="service">{{ $paid_out->count() }}</td>
          <td class="service"></td>
          <td class="service">{{ $client->branch['name'] }}</td>
        </tr>
        @endforeach
        <tr>
          <td colspan="9" class="grand total">TOTAL CLIENTES</td>
          <td class="grand total">{{ $clients->count() }}</td>
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