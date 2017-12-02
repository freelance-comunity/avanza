<table class="table" id="pagoss">
	<thead class="bg-primary">
		<th style="width: 15px;">No. Cuota</th>
		<th>Fecha</th>
		<th>Cuota a Pagar</th>
		<th>Pagado</th>
		<th>Saldo Total</th>
		<th>Saldo Capital</th>
		<th>Saldo Intereses</th>
		<th>Saldo Moratorios</th>
		<th>Estatus</th>
		<th>Fecha de Pago</th>
	</thead>
	<tbody>
		@foreach($payments as $payment)
		@include('credits.payment')
		@if ($payment->status == "Pendiente")
		<tr class="active">
			<td>{{ $payment->number }}</td>
			<td>{{$payment->date->format('d F Y')}}</td>
			<td>${{number_format($payment->total,2)}}</td>
			<td>${{ number_format($payment->payment, 2)}}</td>
			<td>$ {{ number_format($payment->balance, 2) }}</td>
			<td>$ {{ number_format($payment->capital, 2) }}</td>
			<td>$ {{ number_format($payment->interest, 2) }}</td>
			<td>$ {{ number_format($payment->moratorium, 2) }}</td>
			<td><p>{{$payment->status}}</p></td>
			@if ($payment->status == 'Pagado' OR $payment->status == 'Parcial')
					<td>{{$payment->updated_at}}</td>
				@else
					<td>Pago no realizado aún</td>
				@endif
		</tr>
		@elseif($debt->credit->periodicity == "CREDISEMANA" && $payment->status == "Parcial")
		<tr class="warning">
			<td>{{ $payment->number }}</td>
			<td>{{$payment->date->format('d F Y')}}</td>
			<td>${{number_format($payment->total,2)}}</td>
			<td>${{ number_format($payment->payment, 2)}}</td>
			<td>$ {{ number_format($payment->balance, 2) }}</td>
			<td>$ {{ number_format($payment->capital, 2) }}</td>
			<td>$ {{ number_format($payment->interest, 2) }}</td>
			<td>$ {{ number_format($payment->moratorium, 2) }}</td>
			<td><p>{{$payment->status}}</p></td>
			@if ($payment->status == 'Pagado' OR $payment->status == 'Parcial')
					<td>{{$payment->updated_at}}</td>
				@else
					<td>Pago no realizado aún</td>
				@endif
		</tr>
		@elseif($payment->status == "Parcial")
		<tr class="warning">
			<td>{{ $payment->number }}</td>
			<td>{{$payment->date->format('d F Y')}}</td>
			<td>${{number_format($payment->total,2)}}</td>
			<td>${{ number_format($payment->payment, 2)}}</td>
			<td>$ {{ number_format($payment->balance, 2) }}</td>
			<td>$ {{ number_format($payment->capital, 2) }}</td>
			<td>$ {{ number_format($payment->interest, 2) }}</td>
			<td>$ {{ number_format($payment->moratorium, 2) }}</td>
			<td><p>{{$payment->status}}</p></td>
			@if ($payment->status == 'Pagado' OR $payment->status == 'Parcial')
					<td>{{$payment->updated_at}}</td>
				@else
					<td>Pago no realizado aún</td>
				@endif
		</tr>
		@elseif($payment->status == "Vencido")
		<tr class="danger">
			<td>{{ $payment->number }}</td>
			<td>{{$payment->date->format('d F Y')}}</td>
			<td>${{number_format($payment->total,2)}}</td>
			<td>${{ number_format($payment->payment, 2)}}</td>
			<td>$ {{ number_format($payment->balance, 2) }}</td>
			<td>$ {{ number_format($payment->capital, 2) }}</td>
			<td>$ {{ number_format($payment->interest, 2) }}</td>
			<td>$ {{ number_format($payment->moratorium, 2) }}</td>
			<td><p>{{$payment->status}}</p></td>
			@if ($payment->status == 'Pagado' OR $payment->status == 'Parcial')
					<td>{{$payment->updated_at}}</td>
				@else
					<td>Pago no realizado aún</td>
				@endif
		</tr>
		@elseif($payment->status == "Pagado")
		<tr class="success">
			<td>{{ $payment->number }}</td>
			<td>{{$payment->date->format('d F Y')}}</td>
			<td>${{number_format($payment->total,2)}}</td>
			<td>${{ number_format($payment->payment, 2)}}</td>
			<td>$ {{ number_format($payment->balance, 2) }}</td>
			<td>$ {{ number_format($payment->capital, 2) }}</td>
			<td>$ {{ number_format($payment->interest, 2) }}</td>
			<td>$ {{ number_format($payment->moratorium, 2) }}</td>
			<td><p>{{$payment->status}}</p></td>
			@if ($payment->status == 'Pagado' OR $payment->status == 'Parcial')
					<td>{{$payment->updated_at}}</td>
				@else
					<td>Pago no realizado aún</td>
				@endif
		</tr>
		@endif
		@endforeach
	</tbody>
</table>
<script>
	function myFunction() {
		alert("¿ESTAS SEGURO DE REALIZAR ESTE PAGO?");
	}
</script>
