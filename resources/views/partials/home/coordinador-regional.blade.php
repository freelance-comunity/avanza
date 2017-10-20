@php
$user_allocation = Auth::user();
$region_allocation = $user_allocation->region;
$clients = $region_allocation->clients;

$filtered_date_now = App\Models\Client::where('region_id',$region_allocation->id)->where(function ($query) {
	$query->whereRaw('DATE(created_at) = CURRENT_DATE');
})->get(); 
$credits = $region_allocation->credits;
$filtered_date_now_credits = App\Models\Credit::where('region_id',$region_allocation->id)->where(function ($query) {
	$query->whereRaw('DATE(created_at) = CURRENT_DATE');
})->get(); 

$vault = $user_allocation->vault;
$expenditures_collection = App\Models\Expenditure::all();
$expenses = $expenditures_collection->where('vault_id', $vault->id);
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

				<p>Total Clientes</p>
			</div>
			<div class="icon">
				<i class="fa fa-users"></i>
			</div>
			<a data-toggle="modal" data-target="#tc" class="small-box-footer">Ver <i class="fa fa-eye"></i></a>
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
			<a data-toggle="modal" data-target="#c" class="small-box-footer">Ver <i class="fa fa-eye"></i></a>
		</div>
	</div>
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
	<div class="col-lg-12 col-md-6">
		<!-- USERS LIST -->
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Mis Gastos</h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
					</button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body no-padding">
				@if($expenses->isEmpty())
				<div class="well text-center">No hay registros.</div>
				@else
				<div class="table-responsive">
					<table class="table" id="gastosCoordinador">
						<thead class="bg-yellow">
							<th>Monto</th>
							<th>Concepto</th>
							<th>Descripción</th>
						</thead>
						<tbody>
							@foreach ($expenses as $expense)
							<tr>
								<td>${{ number_format($expense->ammount,2) }}</td>
								<td>{{ $expense->concept }}</td>
								<td>{{ $expense->description }}</td>
							</tr>
							@endforeach
							{{-- <tr class="bg-navy">
								<td colspan="2">${{ number_format($expenses->sum('ammount'),2) }}</td>
								<td></td>
							</tr> --}}
						</tbody>
					</table>
				</div>
				@endif
				<!-- /.closes-list -->
			</div>
		</div>
		<!--/.box -->
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


