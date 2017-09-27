@php
$vault   = App\Models\Vault::all();
$clients = App\Models\Client::all();
$credits = App\Models\Credit::all();
$expenditures = App\Models\Expenditure::all();
@endphp
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>${{ number_format($vault->sum('ammount'),2) }}</h3>

        <p>Total Bovéda</p>
      </div>
      <div class="icon">
        <i class="fa fa-bank"></i>
      </div>
      <a href="{{ url('/report-vault') }}" class="small-box-footer">Descargar <i class="fa fa-file-pdf-o"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{ $clients->count() }}</h3>

        <p>Total Clientes</p>
      </div>
      <div class="icon">
        <i class="fa fa-users"></i>
      </div>
      <a href="{{ url('/report-clients') }}" class="small-box-footer">Descargar <i class="fa fa-file-pdf-o"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{ $credits->count() }}</h3>

        <p>Total Créditos</p>
      </div>
      <div class="icon">
        <i class="fa fa-paperclip"></i>
      </div>
      <a href="{{ url('/report-credits') }}" class="small-box-footer">Descargar <i class="fa fa-file-pdf-o"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>${{ number_format($credits->sum('ammount'),2) }}</h3>

        <p>Total Ministrado</p>
      </div>
      <div class="icon">
        <i class="fa fa-money"></i>
      </div>
      <a href="{{ url('/report-credits') }}" class="small-box-footer">Descargar <i class="fa fa-file-pdf-o"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-purple">
      <div class="inner">
        <h3>${{ number_format($expenditures->sum('ammount'),2) }}</h3>

        <p>Total Gastoss</p>
      </div>
      <div class="icon">
        <i class="fa fa-shopping-cart"></i>
      </div>
      <a href="{{ url('/report-expenditures') }}" class="small-box-footer">Descargar <i class="fa fa-file-pdf-o"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->
