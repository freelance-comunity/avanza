@extends('layouts.app')

@section('htmlheader_title')
Home
@endsection
@section('main-content')
@section('message_level')
Transferir
@endsection
@section('message_level_here')
Detalles
@endsection
@php
$user = Auth::user();
$vault = $user->vault;
$date_now = Carbon\Carbon::today();
$payments = Auth::user()->payments;
$now = Carbon\Carbon::today()->toDateString();
$payments_now = $payments->where('day',$now);



$total_payments = DB::table('payments')->where([
  ['user_id', '=', $user->id],
  ['date', '=', $now],
  ['status', '=', 'Pendiente'],
])->sum('total');

$total_payments_losers = DB::table('payments')->where([
  ['user_id', '=', $user->id],
  ['date', '<=', $now],
  ['status', '=', 'Vencido'],
])->sum('balance');

$total_payments_partials = DB::table('payments')->where([
  ['user_id', '=', $user->id],
  ['date', '<=', $now],
  ['status', '=', 'Parcial'],
])->sum('total');

$total_payments_extra = $total_payments_losers + $total_payments_partials;

$total_incomes = DB::table('income_payments')->where([
  ['vault_id', '=', $vault->id],
  ['date', '=', $now],
])->sum('ammount');

if($total_incomes > 0 && $total_payments >0)
{
  $porcent = $total_incomes / $total_payments;
  $porcent_friendly = number_format($porcent * 100,2);
}
else
{
    //Método para controlar el error
  $porcent_friendly = number_format(0,2);
}
@endphp
<div class="row">
  <div class="col-md-4">
    <div class="alert bg-yellow alert-dismissible">
      <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
      <h4>
        <i class="icon fa fa-money"></i>
        Monto a Recuperar Vigente
      </h4>
      ${{ number_format($total_payments,2) }}
    </div>
  </div>
  <div class="col-md-4">
    <div class="alert bg-red alert-dismissible">
      <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
      <h4>
        <i class="icon fa fa-money"></i>
        Monto Vencido
      </h4>
      ${{ number_format($total_payments_losers,2) }}
    </div>
  </div>
  <div class="col-md-4">
    <div class="alert bg-green alert-dismissible">
      <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
      <h4>
        <i class="icon fa fa-money"></i>
        Monto Recuperado
      </h4>
      ${{ number_format($total_incomes,2) }}
    </div>
  </div>
  <div class="col-md-4">
    <h4>Porcentaje Recuperado</h4>
    <div class="progress-lg">
      @if ($porcent_friendly < 30)
      <div class="progress-bar bg-red progress-bar-striped active" role="progressbar"
      aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:100%">
      {{ $porcent_friendly }} %
    </div>
    @elseif ($porcent_friendly >30 AND $porcent_friendly < 70)
    <div class="progress-bar bg-yellow progress-bar-striped active" role="progressbar"
    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:100%">
    {{ $porcent_friendly }} %
  </div>
  @elseif ($porcent_friendly > 70)
  <div class="progress-bar bg-green progress-bar-striped active" role="progressbar"
  aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:100%">
  {{ $porcent_friendly }} %
</div>
@endif
</div>
</div>
</div>
<hr>
<div class="row">
 @php
 $credits = App\Models\Credit::all();
 @endphp
 @if($credits->isEmpty())
 <div class="well text-center">No se encontraron pagos para este día.</div>
 @else
 <div class="table-responsive">
  <table class="table"  id="example">
    <thead class="bg-success">
      <th>Nombre del Cliente</th>
      <th>Total</th>
      <th>Teléfono</th>
      <th width="25px">Acción</th>
    </thead>
    <tbody>
      @foreach ($credits as $credit)
     
      @if (Auth::user()->id === $credit->user_id && $credit->debt->status == 'VIGENTE')
      <tr>
       <td>{{$credit->client->firts_name}}</td>
       <td>{{$credit->debt->ammount}}</td>
       <td>{{$credit->phone}}</td>
       <td><a href="{!! route('credits.show', [$credit->id]) !!}"><i class="fa fa-eye fa-2x" data-toggle="tooltip" title="Ver Detalles"></i></a></td>
     </tr>
     @endif

     
     @endforeach

   </tbody>
 </table>
</div>
@endif
</div>
@endsection
