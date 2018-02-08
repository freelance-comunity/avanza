@php
$month = \Carbon\Carbon::now()->month;
$user_allocation = Auth::user();
$region_allocation = $user_allocation->region;
$clients = $region_allocation->clients;
$filtered_date_now = App\Models\Client::where('region_id',$region_allocation->id)->where(function ($query) {
	$query->whereRaw('DATE(created_at) = CURRENT_DATE');
})->get();
$credits = $region_allocation->credits;
$credits_this_month = App\Models\Credit::where('region_id',$region_allocation->id)->where(DB::raw('MONTH(created_at)'), '=', date($month) )->get();
$expenditures_this_month = App\Models\Expenditure::where('region_id',$region_allocation->id)->where( DB::raw('MONTH(created_at)'), '=', date($month) )->get();
$filtered_date_now_credits = App\Models\Credit::where('region_id',$region_allocation->id)->where(function ($query) {
	$query->whereRaw('DATE(created_at) = CURRENT_DATE');
})->get();

$rosters_this_month = App\Models\Roster::where('region_id',$region_allocation->id)->where( DB::raw('MONTH(created_at)'), '=', date($month) )->get();
$vault = $user_allocation->vault;
$expenditures_collection = App\Models\Expenditure::all();
$expenses = $expenditures_collection->where('vault_id', $vault->id)->sortBy('created_at');

$now = Carbon\Carbon::today()->toDateString();
$user = Auth::user();
$region = $user->region;
$branches = $region->branches;
$total_promoter = 0;

$user_allocation = Auth::user();
$region_allocation = $user_allocation->region;
$collection_payments = App\Models\IncomePayment::all();
$payments = $collection_payments->where('date', $now)->where('region_id', $region_allocation->id);
$payment = App\Models\Payment::where('date',$now)->where('status', 'Pendiente')->where('region_id', $region_allocation->id)->sum('ammount');
@endphp
<!-- Small boxes (Stat box) -->
<div class="row">
	{{-- Include modals --}}
	@include('partials.modals-coordinador.total-clients')
	@include('partials.modals-coordinador.total-clients-now')
	@include('partials.modals-coordinador.total-credits')
	@include('partials.modals-coordinador.total-credits-now')
	<div class="col-lg-3 col-md-4">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3>{{ $clients->count() }}</h3>

				<p>Total Clientes Vigentes</p>
			</div>
			<div class="icon">
				<i class="fa fa-users"></i>
			</div>
			<a data-toggle="modal" data-target="#tc" class="small-box-footer">Ver <i class="fa fa-eye"></i></a>
		</div>
	</div>
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
			<a data-toggle="modal" data-target="#c" class="small-box-footer">Ver <i class="fa fa-eye"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-md-4">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3>{{ $filtered_date_now->count() }}</h3>

				<p>Total Clientes Creados Hoy</p>
			</div>
			<div class="icon">
				<i class="fa fa-calendar"></i>
			</div>
			<a data-toggle="modal" data-target="#tcn" class="small-box-footer">Ver <i class="fa fa-eye"></i></a>
		</div>
	</div>
	<!-- ./col -->
	
	<!-- ./col -->
	<div class="col-lg-3 col-md-4">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>{{ $filtered_date_now_credits->count() }}</h3></a>

				<p>Total Créditos Creados Hoy</p>
			</div>
			<div class="icon">
				<i class="fa fa-clock-o"></i>
			</div>
			<a data-toggle="modal" data-target="#cn" class="small-box-footer">Ver <i class="fa fa-eye"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-md-4">
		<!-- small box -->
		<div class="small-box bg-purple">
			<div class="inner">
				<h3>${{ number_format($credits_this_month->sum('ammount'),2) }}</h3>

				<p>Total Ministrado en el Mes</p>
			</div>
			<div class="icon">
				<i class="fa fa-money"></i>
			</div>
			{{-- <a href="#" class="small-box-footer">Ver <i class="fa fa-eye"></i></a> --}}
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-md-4">
		<!-- small box -->
		<div class="small-box bg-orange">
			<div class="inner">
				<h3>${{ number_format($filtered_date_now_credits->sum('ammount'),2) }}</h3>

				<p>Total Ministrado del día</p>
			</div>
			<div class="icon">
				<i class="fa fa-line-chart"></i>
			</div>
			{{-- <a href="#" class="small-box-footer">Ver <i class="fa fa-eye"></i></a> --}}
		</div>
	</div>
	
	<div class="col-lg-3 col-md-4">
		<!-- small box -->
		<div class="small-box bg-purple">
			<div class="inner">

				<h3>${{ number_format($expenditures_this_month->sum('ammount'),2) }}</h3>

				<p>Total Gastos en el Mes</p>
			</div>
			<div class="icon">
				<i class="fa fa-money"></i>
			</div>
			{{-- <a href="#" class="small-box-footer">Ver <i class="fa fa-eye"></i></a> --}}
		</div>
	</div>
	<div class="col-lg-3 col-md-4">
		<!-- small box -->
		<div class="small-box bg-purple">
			<div class="inner">

				<h3>${{ number_format($rosters_this_month->sum('grandchild_pay'),2) }}</h3>

				<p>Total Sueldos en el Mes</p>
			</div>
			<div class="icon">
				<i class="fa fa-money"></i>
			</div>
			{{-- <a href="#" class="small-box-footer">Ver <i class="fa fa-eye"></i></a> --}}
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-md-4">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				@php
					$sum_payments = $payments->sum('ammount');
					$total_day = $sum_payments + $payment;
				@endphp
				<h3>${{ number_format($payment,2) }}</h3>

				<p>Recuperación Restante del Día</p>
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
	<hr>
	{{-- <div class="col-lg-12 col-md-4">
		<!-- USERS LIST -->
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Sucursales</h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
					</button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body no-padding">
				@if($branches->isEmpty())
				<div class="well text-center">No hay registros.</div>
				@else
				<div class="table-responsive">
					<table class="table" id="example">
						<thead class="bg-green">
							<th>Nombre</th>
							<th>Monto A Recuperar</th>
							<th>Recuperado</th>
						</thead>
						<tbody>
							@foreach ($branches as $branch)
							@php
							$total_payments = DB::table('payments')->where([
								['branch_id', '=', $branch->id],
								['date', '=', $now],
							])->sum('total');
							$users = $branch->users;

							foreach ($users as $key => $user) {
								$vault = $user->vault;
								$total_incomes = DB::table('income_payments')->where([
									['vault_id', '=', $vault->id],
									['date', '=', $now],
								])->sum('ammount');
								$total_promoter = $total_promoter + $total_incomes;
							}
							@endphp
							<tr>
								<td>{{$branch->name}}</td>
								<td>${{number_format($total_payments,2)}}</td>
								<td>${{number_format($total_promoter,2)}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				@endif
				<!-- /.closes-list -->
			</div>
		</div>
		<!--/.box -->
	</div> --}}
	{{--  --}}
{{-- 	<!-- ./col -->
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
	./col
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
	</div> --}}
</div>
<!-- /.row -->
