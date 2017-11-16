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
])->sum('total');

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
            ${{ number_format($total_payments_losers + $total_payments_partials,2) }}
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
    @if($payments->isEmpty())
    <div class="well text-center">No se encontraron pagos para este día.</div>
    @else
    <div class="table-responsive">
        <table class="table" id="pagos_promotor">
            <thead class="bg-default">
                <th style="width: 15px;">No. Cuota</th>
                <th>Total</th>
                <th>Cliente</th>
                <th>Crédito</th>
               {{--  <th>Horario de cobro</th>
                <th>Estatus</th> --}}
                <th {{-- width="50px;" --}}>Acción</th>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                @php
                $debt = $payment->debt;
                $credit = $debt->credit;
                @endphp
                @if ($payment->status === 'Vencido')
                <tr {{-- class="bg-danger" --}}>
                    <td>{{ $payment->number }} de {{ $credit->dues }}</td>
                    <td>$ {{ number_format($payment->balance, 2) }}</td>
                    <td>{{ $credit->firts_name }} {{ $credit->last_name }} {{ $credit->mothers_last_name }}
                    </td>
                    <td>{{ $credit->folio }}</td>
                    {{-- <td>{{ $credit->collection_period }}</td>
                    <td>
                        @if ($payment->status == 'Vencido')
                        <p style="color:red;">{{$payment->status}}</p>
                        @else
                        <p style="color:gray;">{{$payment->status}}</p>
                        @endif
                    </td> --}}
                    <td>
                        <a href="{!! route('credits.show', [$credit->id]) !!}" class="btn btn-primary btn-lg btn-block">PAGAR</a>
                    </td>
                </tr>
                @endif
                @if ($payment->status === 'Parcial')
                <tr {{-- class="bg-info" --}}>
                    <td>{{ $payment->number }} de {{ $credit->dues }}</td>
                    <td>$ {{ number_format($payment->balance, 2) }}</td>
                    <td>{{ $credit->firts_name }} {{ $credit->last_name }} {{ $credit->mothers_last_name }}
                    </td>
                    <td>{{ $credit->folio }}</td>
                    {{-- <td>{{ $credit->collection_period }}</td>
                    <td>
                        @if ($payment->status == 'Vencido')
                        <p style="color:red;">{{$payment->status}}</p>
                        @else
                        <p style="color:gray;">{{$payment->status}}</p>
                        @endif
                    </td> --}}
                    <td>
                        <a href="{!! route('credits.show', [$credit->id]) !!}" class="btn btn-primary btn-lg btn-block">PAGAR</a>
                    </td>
                </tr>
                @endif
                @if ($payment->date == $date_now AND $payment->status === 'Pendiente')
                <tr {{-- class="bg-success" --}}>
                    <td>{{ $payment->number }} de {{ $credit->dues }}</td>
                    <td>$ {{ number_format($payment->balance, 2) }}</td>
                    <td>{{ $credit->firts_name }} {{ $credit->last_name }} {{ $credit->mothers_last_name }}
                    </td>
                    <td>{{ $credit->folio }}</td>
                    {{-- <td>{{ $credit->collection_period }}</td>
                    <td>
                        @if ($payment->status == 'Vencido')
                        <p style="color:red;">{{$payment->status}}</p>
                        @else
                        <p style="color:gray;">{{$payment->status}}</p>
                        @endif
                    </td> --}}
                    <td>
                        <a href="{!! route('credits.show', [$credit->id]) !!}" class="btn btn-primary btn-lg btn-block">PAGAR</a>
                    </td>
                </tr>
                @endif
                @if ($payment->date == $date_now AND $payment->status === 'Vencido')
                <tr class="danger">
                    <td>{{ $payment->number }} de {{ $credit->dues }}</td>
                    <td>$ {{ number_format($payment->balance, 2) }}</td>
                    <td>{{ $credit->firts_name }} {{ $credit->last_name }} {{ $credit->mothers_last_name }}
                    </td>
                    <td>{{ $credit->folio }}</td>
                    {{-- <td>{{ $credit->collection_period }}</td>
                    <td>
                        @if ($payment->status == 'Vencido')
                        <p style="color:red;">{{$payment->status}}</p>
                        @else
                        <p style="color:gray;">{{$payment->status}}</p>
                        @endif
                    </td> --}}
                    <td>
                        <a href="{!! route('credits.show', [$credit->id]) !!}" class="btn btn-primary btn-lg btn-block">PAGAR</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
