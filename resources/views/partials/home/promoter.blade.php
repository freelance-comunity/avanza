<div class="row">
    <div class="col-md-4">
        <div class="alert alert-success alert-dismissible">
            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h4>
                <i class="icon fa fa-map-marker"></i>
                {{ Date::now()->format('l j F Y') }}
            </h4>
            RUTA DE COBRO
        </div>
    </div>
</div>
@php
$date_now = Carbon\Carbon::today();
$payments = Auth::user()->payments;
@endphp
<div class="row">
    @if($payments->isEmpty())
    <div class="well text-center">No se encontraron pagos para este día.</div>
    @else
    <div class="table-responsive">
        <table class="table" id="pagos_promotor">
            <thead class="thead-inverse">
                <th style="width: 15px;">No. Cuota</th>
                <th>Total</th>      
                <th>Cliente</th>   
                <th>Crédito</th>   
                <th>Horario de cobro</th>   
                <th>Estatus</th>
                <th width="50px;">Acción</th>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                @php
                $debt = $payment->debt;
                $credit = $debt->credit;
                @endphp
                @if ($payment->status === 'Vencido')
                <tr class="danger">
                    <td>{{ $payment->number }} de {{ $credit->dues }}</td>
                    <td>$ {{ number_format($payment->balance, 2) }}</td>
                    <td>{{ $credit->firts_name }} {{ $credit->last_name }} {{ $credit->mothers_last_name }}
                    </td>
                    <td>{{ $credit->folio }}</td>
                    <td>{{ $credit->collection_period }}</td>
                    <td>
                        @if ($payment->status == 'Vencido')
                        <p style="color:red;">{{$payment->status}}</p>
                        @else
                        <p style="color:gray;">{{$payment->status}}</p>
                        @endif
                    </td>
                    <td>
                        <a href="{!! route('credits.show', [$credit->id]) !!}" class="btn btn-success btn-lg btn-block">PAGAR</a>
                    </td>
                </tr>
                @endif
                @if ($payment->status === 'Parcial')
                <tr class="info">
                    <td>{{ $payment->number }} de {{ $credit->dues }}</td>
                    <td>$ {{ number_format($payment->balance, 2) }}</td>
                    <td>{{ $credit->firts_name }} {{ $credit->last_name }} {{ $credit->mothers_last_name }}
                    </td>
                    <td>{{ $credit->folio }}</td>
                    <td>{{ $credit->collection_period }}</td>
                    <td>
                        @if ($payment->status == 'Vencido')
                        <p style="color:red;">{{$payment->status}}</p>
                        @else
                        <p style="color:gray;">{{$payment->status}}</p>
                        @endif
                    </td>
                    <td>
                        <a href="{!! route('credits.show', [$credit->id]) !!}" class="btn btn-success btn-lg btn-block">PAGAR</a>
                    </td>
                </tr>
                @endif
                @if ($payment->date == $date_now AND $payment->status === 'Pendiente')
                <tr class="success">
                    <td>{{ $payment->number }} de {{ $credit->dues }}</td>
                    <td>$ {{ number_format($payment->balance, 2) }}</td>
                    <td>{{ $credit->firts_name }} {{ $credit->last_name }} {{ $credit->mothers_last_name }}
                    </td>
                    <td>{{ $credit->folio }}</td>
                    <td>{{ $credit->collection_period }}</td>
                    <td>
                        @if ($payment->status == 'Vencido')
                        <p style="color:red;">{{$payment->status}}</p>
                        @else
                        <p style="color:gray;">{{$payment->status}}</p>
                        @endif
                    </td>
                    <td>
                        <a href="{!! route('credits.show', [$credit->id]) !!}" class="btn btn-success btn-lg btn-block">PAGAR</a>
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
                    <td>{{ $credit->collection_period }}</td>
                    <td>
                        @if ($payment->status == 'Vencido')
                        <p style="color:red;">{{$payment->status}}</p>
                        @else
                        <p style="color:gray;">{{$payment->status}}</p>
                        @endif
                    </td>
                    <td>
                        <a href="{!! route('credits.show', [$credit->id]) !!}" class="btn btn-success btn-lg btn-block">PAGAR</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>

