@php
$vault   = App\Models\Vault::all();
$clients = App\Models\Client::all();
$credits = App\Models\Credit::all();
$expenditures = App\Models\Expenditure::all();

$now = Carbon\Carbon::now()->toDateString();
$collection_payments = App\Models\IncomePayment::all();
$payments = $collection_payments->where('date', $now);
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

        <p>Total Gastos</p>
      </div>
      <div class="icon">
        <i class="fa fa-shopping-cart"></i>
      </div>
      <a href="{{ url('/report-expenditures') }}" class="small-box-footer">Descargar <i class="fa fa-file-pdf-o"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-orange">
      <div class="inner">
        <h3>${{ number_format($payments->sum('ammount'),2) }}</h3>

        <p>Total Recuperado del día</p>
      </div>
      <div class="icon">
        <i class="fa fa-line-chart"></i>
      </div>
      <a href="{{ url('/report-payments') }}" class="small-box-footer">Descargar <i class="fa fa-file-pdf-o"></i></a>
    </div>
  </div>
</div>
<!-- /.row -->
<div class="row">
  <div class="col-md-6">
    <!-- USERS LIST -->
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Usuarios en Linea</h3>

        <div class="box-tools pull-right">
          <span class="label label-success">{{ $activities->count() }} en linea</span>
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <ul class="users-list clearfix">
          @foreach ($activities as $activity)
          <li>
            <img src="{{asset('/uploads/avatars')}}/{{ $activity->user->avatar }}" alt="User Image" class="online">
            <a class="users-list-name" href="#">{{ $activity->user->name }}</a>
            {{-- <span class="users-list-date">{{ Carbon\Carbon::now() }}</span> --}}
          </li>
          @endforeach
        </ul>
        <!-- /.users-list -->
      </div>
      <!-- /.box-body -->
      {{-- <div class="box-footer text-center">
        <a href="javascript:void(0)" class="uppercase">View All Users</a>
      </div> --}}
      <!-- /.box-footer -->
    </div>
    <!--/.box -->
  </div>
  <!-- /.col -->
</div>
