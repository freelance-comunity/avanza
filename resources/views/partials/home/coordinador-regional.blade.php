{{-- @php
$vault   = App\Models\Vault::all();
//$clients = App\Models\Client::all();
$credits = App\Models\Credit::all();
$expenditures = App\Models\Expenditure::all();

$now = Carbon\Carbon::now()->toDateString();
$collection_payments = App\Models\IncomePayment::all();
$payments = $collection_payments->where('date', $now);

$closes = App\Models\Close::orderBy('created_at', 'desc')->take(3)->get();

$user_allocation = Auth::user();
$region_allocation = $user_allocation->region;
$clients = $region_allocation->clients;
$date_now = \Carbon\Carbon::now();
$filtered_date_now = $clients->where('created_at', '<', $date_now);
@endphp
<!-- Small boxes (Stat box) -->
<div class="row">
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
	<!-- ./col -->
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
			<a href="{{ url('/report-payments') }}" class="small-box-footer">Descargar <i class="fa fa-file-pdf-o"></i></a>
		</div>
	</div>
	<!-- ./col -->
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
			<a href="{{ url('/report-payments') }}" class="small-box-footer">Descargar <i class="fa fa-file-pdf-o"></i></a>
		</div>
	</div>
</div>
<!-- /.row -->

 --}}