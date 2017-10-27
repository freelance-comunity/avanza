@php
$vault   = App\Models\Vault::all();
$clients = App\Models\Client::all();
$credits = App\Models\Credit::all();
$expenditures = App\Models\Expenditure::all();

$now = Carbon\Carbon::now()->toDateString();
$collection_payments = App\Models\IncomePayment::all();
$payments = $collection_payments->where('date', $now);
$payment = App\Models\payment::where('date',$now)->sum('ammount');
$closes = App\Models\Close::orderBy('created_at', 'desc')->take(3)->get();


@endphp
<!-- Small boxes (Stat box) -->
{{-- <style>

@media only screen and (max-width: 500px) {  
    p {
      font-size: 5px;

    }
    h3 {
    font-size: 50%;
    background-color: red;
    }
    
} 
</style> --}}
<div class="row">
<div class="col-lg-3 col-md-4">
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
<div class="col-lg-3 col-md-4">
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
<div class="col-lg-3 col-md-4">
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
<div class="col-lg-3 col-md-4">
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
<div class="col-lg-3 col-md-4">
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
<div class="col-lg-3 col-md-4">
  <!-- small box -->
  <div class="small-box bg-blue">
    <div class="inner">
      <h3>${{ number_format($payment,2) }}</h3>

      <p>Proyección de Recuperación</p>
    </div>
    <div class="icon">
      <i class="fa fa-dollar"></i>
    </div>
    <a href="{{ url('/report-payments') }}" class="small-box-footer">Descargar <i class="fa fa-file-pdf-o"></i></a>
  </div>
</div>
<!-- ./col -->
<!-- ./col -->
<div class="col-lg-3 col-md-4">
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
<!-- ./col -->
  {{-- <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-navy">
      <div class="inner">
        <h3>${{ number_format($payments->sum('ammount'),2) }}</h3>

        <p>Saldo Cartera Vigente</p>
      </div>
      <div class="icon">
        <i class="fa fa-retweet"></i>
      </div>
      <a href="{{ url('/report-payments') }}" class="small-box-footer">Descargar <i class="fa fa-file-pdf-o"></i></a>
    </div>
  </div> --}}
  <!-- ./col -->
{{--   <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-maroon">
      <div class="inner">
        <h3>${{ number_format($payments->sum('ammount'),2) }}</h3>

        <p>Saldo Cartera Vencida</p>
      </div>
      <div class="icon">
        <i class="fa fa-exclamation"></i>
      </div>
      <a href="{{ url('/report-payments') }}" class="small-box-footer">Descargar <i class="fa fa-file-pdf-o"></i></a>
    </div>
  </div> --}}
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
  <div class="col-md-3">
    <!-- USERS LIST -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Cierres de operación</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        @if($closes->isEmpty())
        <div class="well text-center">No hay registros.</div>
        @else
        <table class="table">
          <thead>
            <th>Usuario</th>
            <th>Fecha/hora</th>
            {{--  <th width="50px">Acción</th> --}}
          </thead>
          <tbody>
            @foreach($closes as $close)
            <tr>
              <td>{!! $close->name_user !!}</td>
              <td>{!! $close->created_at !!}</td>
              {{-- <td>
                <a href="{!! route('closes.edit', [$close->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('closes.delete', [$close->id]) !!}" onclick="return confirm('Are you sure wants to delete this Close?')"><i class="glyphicon glyphicon-remove"></i></a>
              </td> --}}
            </tr>
            @endforeach
          </tbody>
        </table>
        @endif
        <!-- /.closes-list -->
      </div>
      <div class="box-footer text-center">
        <a href="{{ url('closes') }}" class="uppercase">Ver más</a>
      </div>
      <!-- /.box-footer -->
    </div>
    <!--/.box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3">
   <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Cerrar operación</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
      <a href="{{ url('lock-payments') }}" class="btn btn-default btn-block" onclick="return confirm('¿Seguro que quieres cerrar operación?')">
        <i class="fa fa-3x fa-clock-o"></i>
        <h3>Cerrar operación</h3>
      </a>
    </div>
  </div>
  <!--/.box -->
</div>
<!-- /.col -->
</div>
