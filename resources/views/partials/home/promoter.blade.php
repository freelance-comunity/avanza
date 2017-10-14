@php
$date_now = Carbon\Carbon::today();
$payments = Auth::user()->payments;
$count_credits = 0;
foreach ($payments as $element) {
    if ($element->date == $date_now AND $element->status === 'Pendiente') {
        $count_credits = $count_credits + 1;
    }
    if ($element->status === 'Vencido') {
        $count_credits = $count_credits + 1;
    }
    if ($element->status === 'Parcial') {
        $count_credits = $count_credits + 1;
    }
}
@endphp
<div class="row">
    <div class="col-md-4">
        <div class="alert bg-success alert-dismissible">
            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h4>
                <i class="icon fa fa-map-marker"></i>
                {{ Date::now()->format('l j F Y') }}
            </h4>
            RUTA DE COBRO
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <th>Ruta del día</th>
                <th>Cobrados</th>
                <th>Tu avance</th>
            </thead>
            <tbody>
                <tr class="bg-primary">
                    <td>{{ $count_credits }} créditos</td>
                   <td>60 créditos</td>
                   <td>58%</td>
               </tr>
               <tr class="bg-warning">
                   <td>89 clientes</td>
                   <td>59 clientes</td>
                   <td>66%</td>
               </tr>
           </tbody>
       </table>
   </div>
</div>
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

{{-- <div class="row">
    <div class="table-responsive">
        <table class="table" id="pagos_promotor">
            <thead>
                <th>
                    VISITAS
                </th>
            </thead>
            <tbody>
                <tr>
                    <td>
                     <div class="col-lg-12 col-xs-12">
                        <!-- small box -->
                        <div class="small-box bg-teal">
                          <div class="inner">
                            <h3>MXN 450.00</h3>
                            <p>JOSÉ PEREZ</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <a href="#" class="small-box-footer">PAGAR <i class="fa fa-file-pdf-o"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </td>
        </tr>
    </tbody>
</table>
</div>
</div>

 --}}