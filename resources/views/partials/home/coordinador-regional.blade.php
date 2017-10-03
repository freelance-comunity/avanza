@php
$user_allocation = Auth::user();
$region_allocation = $user_allocation->region;
$clients = $region_allocation->clients;

$filtered_date_now = App\Models\Client::where('region_id',$region_allocation->id)->where(function ($query) {
    $query->whereRaw('DATE(created_at) = CURRENT_DATE')
          ->orWhereRaw('DATE(updated_at) = CURRENT_DATE');
})->get(); 
$credits = $region_allocation->credits;
$filtered_date_now_credits = App\Models\Credit::where('region_id',$region_allocation->id)->where(function ($query) {
    $query->whereRaw('DATE(created_at) = CURRENT_DATE')
          ->orWhereRaw('DATE(updated_at) = CURRENT_DATE');
})->get(); 
@endphp
<!-- Small boxes (Stat box) -->
<div class="row">
	@include('partials.modals-coordinador.total-clients')
	@include('partials.modals-coordinador.total-clients-now')
	@include('partials.modals-coordinador.total-credits')
	@include('partials.modals-coordinador.total-credits-now')
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
			<a data-toggle="modal" data-target="#tc" class="small-box-footer">Ver <i class="fa fa-eye"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
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
			<a data-toggle="modal" data-target="#c" class="small-box-footer">Ver <i class="fa fa-eye"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
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
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-purple">
			<div class="inner">
				<h3>${{ number_format($credits->sum('ammount'),2) }}</h3>

				<p>Total Ministrado</p>
			</div>
			<div class="icon">
				<i class="fa fa-money"></i>
			</div>
			{{-- <a href="#" class="small-box-footer">Ver <i class="fa fa-eye"></i></a> --}}
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
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

