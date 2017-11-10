@php
$month = \Carbon\Carbon::now()->month;
$vault = App\Models\Vault::all();
$clients = App\Models\Client::all();
$credits_collection = App\Models\Credit::all();
$credits = $credits_collection->where('status', 'MINISTRADO');
$credits_this_month = App\Models\Credit::where(DB::raw('MONTH(created_at)'), '=', date($month) )->get();
$rosters_this_month = App\Models\Roster::where( DB::raw('MONTH(created_at)'), '=', date($month) )->get();
$expenditures_this_month = App\Models\Expenditure::where( DB::raw('MONTH(created_at)'), '=', date($month) )->get();
$expenditures = App\Models\Expenditure::all();
$now = Carbon\Carbon::now()->toDateString();
$collection_payments = App\Models\IncomePayment::all();
$payments = $collection_payments->where('date', $now);
$payment = App\Models\Payment::where('date',$now)->sum('ammount');
$closes = App\Models\Close::orderBy('created_at', 'desc')->take(3)->get();
$filtered_date_now_credits = App\Models\Credit::where(function ($query) {
	$query->whereRaw('DATE(created_at) = CURRENT_DATE');
})->get();
 @endphp
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
			<a href="{{ url('/report-vault') }}" class="small-box-footer">Ver
				<i class="fa fa-eye"></i>
			</a>
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
			<a href="{{ url('/report-clients') }}" class="small-box-footer">Ver
				<i class="fa fa-eye"></i>
			</a>
		</div>
	</div>

	<!-- ./col -->
	<div class="col-lg-3 col-md-4">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>{{ $credits->count() }}</h3>

				<p>Total Créditos Vigentes</p>
			</div>
			<div class="icon">
				<i class="fa fa-paperclip"></i>
			</div>
			<a href="{{ url('/report-credits') }}" class="small-box-footer">Ver
				<i class="fa fa-eye"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-md-4">
		<!-- small box -->
		<div class="small-box bg-navy">
			<div class="inner">
				<h3>${{ number_format($credits_this_month->sum('ammount'),2) }}</h3>

				<p>Total Ministrado en el Mes</p>
			</div>
			<div class="icon">
				<i class="fa fa-money"></i>
			</div>
			<a href="{{ url('/report-credits-month') }}" class="small-box-footer">Ver
				<i class="fa fa-eye"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-md-4">
		<!-- small box -->
		<div class="small-box bg-maroon">
			<div class="inner">
				<h3>{{ $credits_this_month->count() }}</h3>

				<p>Créditos Otorgados en el Mes</p>
			</div>
			<div class="icon">
				<i class="fa fa-money"></i>
			</div>
			<a href="{{ url('/report-credits-month') }}" class="small-box-footer">Ver
				<i class="fa fa-eye"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-md-4">
		<!-- small box -->
		<div class="small-box bg-primary">
			<div class="inner">
				<h3>${{ number_format($rosters_this_month->sum('grandchild_pay'),2) }}</h3>

				<p>Total Sueldos en el Mes</p>
			</div>
			<div class="icon">
				<i class="fa fa-credit-card"></i>
			</div>
			<a href="{{ url('/report-rosters-month') }}" class="small-box-footer">Ver
				<i class="fa fa-eye"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-md-4">
		<!-- small box -->
		<div class="small-box bg-purple">
			<div class="inner">
				<h3>${{ number_format($expenditures_this_month->sum('ammount'),2) }}</h3>

				<p>Total Gastos en el Mes</p>
			</div>
			<div class="icon">
				<i class="fa fa-shopping-cart"></i>
			</div>
			<a href="{{ url('/report-expenditures-month') }}" class="small-box-footer">Ver
				<i class="fa fa-eye"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-md-4">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3>{{ $filtered_date_now_credits->count() }}</h3>

				<p>Total Créditos Otorgados en el Día</p>
			</div>
			<div class="icon">
				<i class="fa fa-bar-chart"></i>
			</div>
			<a href="{{ url('/report-credits-day') }}" class="small-box-footer">Ver
				<i class="fa fa-eye"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-md-4">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3>${{ number_format($payment,2) }}</h3>

				<p>Recuperación Programada del Día</p>
			</div>
			<div class="icon">
				<i class="fa fa-dollar"></i>
			</div>
			<a href="{{ url('/report-payments-day') }}" class="small-box-footer">Ver
				<i class="fa fa-eye"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<!-- ./col -->
	<div class="col-lg-3 col-md-4">
		<!-- small box -->
		<div class="small-box bg-black	">
			<div class="inner">
				<h3>${{ number_format($payments->sum('ammount'),2) }}</h3>

				<p>Avance Cobranza del Día</p>
			</div>
			<div class="icon">
				<i class="fa fa-line-chart"></i>
			</div>
			<a href="{{ url('/report-payments-now') }}"  class="small-box-footer">Ver
				<i class="fa fa-eye"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	{{--
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-navy">
			<div class="inner">
				<h3>${{ number_format($payments->sum('ammount'),2) }}</h3>

				<p>Saldo Cartera Vigente</p>
			</div>
			<div class="icon">
				<i class="fa fa-retweet"></i>
			</div>
			<a href="{{ url('/report-payments') }}" class="small-box-footer">Descargar
				<i class="fa fa-file-pdf-o"></i>
			</a>
		</div>
	</div> --}}
	<!-- ./col -->
	{{--
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-maroon">
			<div class="inner">
				<h3>${{ number_format($payments->sum('ammount'),2) }}</h3>

				<p>Saldo Cartera Vencida</p>
			</div>
			<div class="icon">
				<i class="fa fa-exclamation"></i>
			</div>
			<a href="{{ url('/report-payments') }}" class="small-box-footer">Descargar
				<i class="fa fa-file-pdf-o"></i>
			</a>
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
					<button type="button" class="btn btn-box-tool" data-widget="collapse">
						<i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="remove">
						<i class="fa fa-times"></i>
					</button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body no-padding">
				<ul class="users-list clearfix">
					@foreach ($activities as $activity) @if ($activity->user->id > 2)
					<li>
						<img src="{{asset('/uploads/avatars')}}/{{ $activity->user->avatar }}" alt="User Image" class="online">
						<a class="users-list-name" href="#">{{ $activity->user->name }}</a>
						{{--
						<span class="users-list-date">{{ Carbon\Carbon::now() }}</span> --}}
					</li>
					@endif @endforeach
				</ul>
				<!-- /.users-list -->
			</div>
			<!-- /.box-body -->
			{{--
			<div class="box-footer text-center">
				<a href="javascript:void(0)" class="uppercase">View All Users</a>
			</div> --}}
			<!-- /.box-footer -->
		</div>
		<!--/.box -->
	</div>
	<!-- /.col -->
</div>
