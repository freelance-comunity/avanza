	<table class="table" id="pagoss">
		<thead class="bg-primary">
			<th style="width: 15px;">No. Cuota</th>
			<th>Día</th>
			<th>Fecha</th>
			<th>Monto</th>
			<th>Capital</th>
			<th>Interés</th>
			<th>Mora</th>
			<th align="center">Total</th>
			<th>Pagado</th>
			<th>Saldo</th>
			<th>Estatus</th>
			<th>Fecha y hora de cobro</th>
		</thead>
		<tbody>
			@foreach($payments as $payment)
			@include('credits.payment')
			@if ($payment->status == "Pendiente")
			<tr class="active">
				<td>#{{ $payment->number }}</td>
				<td>{{$payment->day->format('l')}}</td>
				<td>{{$payment->date->format('d F Y')}}</td>
				<td>$ {{ number_format($payment->ammount, 2) }}</td>
				<td>$ {{ number_format($payment->capital, 2) }}</td>
				<td>$ {{ number_format($payment->interest, 2) }}</td>
				<td>$ {{ number_format($payment->moratorium, 2) }}</td>
				<td>
					@if ($payment->date == $date_now)
					<button type="button" class="btn btn-success btn-lg disabled" >$ {{ number_format($payment->total, 2) }}
					</button>
					@else
					<button type="button" class="btn bg-yellow btn-lg disabled" >$ {{ number_format($payment->total, 2) }}
					</button>
					@endif
				</td>
				<td>${{ number_format($payment->payment, 2)}}</td>
				<td>${{ number_format($payment->balance, 2) }}</td>
				<td><p style="color:gray;">{{$payment->status}}</p></td>
				@if ($payment->status == 'Pagado')
					<td>{{$payment->updated_at}}</td>
				@else
					<td>Pago no realizado aún</td>
				@endif
			</tr>
			@elseif($payment->status == "Parcial")
			<tr class="info">
				<td>#{{ $payment->number }}</td>
				<td>{{$payment->day->format('l')}}</td>
				<td>{{$payment->date->format('d F Y')}}</td>
				<td>$ {{ number_format($payment->ammount, 2) }}</td>
				<td>$ {{ number_format($payment->capital, 2) }}</td>
				<td>$ {{ number_format($payment->interest, 2) }}</td>
				<td>$ {{ number_format($payment->moratorium, 2) }}</td>
				<td> <button type="button" class="btn btn-primary btn-lg disabled">$ {{ number_format($payment->total, 2) }}</button>
					<a href="{{ url('cancel') }}/{{$payment->id}}" class="btn btn-lg bg-black" onclick="return confirm('¿Estas seguro de cancelar el pago?')"><i class="fa fa-angle-double-left"></i></a></td>
					<td>${{ number_format($payment->payment, 2)}}</td>
					<td style="color: blue;">${{ number_format($payment->balance, 2) }}</td>
					<td><p style="color:blue;">{{$payment->status}}</p></td>
					@if ($payment->status == 'Pagado')
						<td>{{$payment->updated_at}}</td>
					@else
						<td>Pago no realizado aún</td>
					@endif
				</tr>
				@elseif($payment->status == "Vencido")
				<tr class="danger">
					<td>#{{ $payment->number }}</td>
					<td>{{$payment->day->format('l')}}</td>
					<td>{{$payment->date->format('d F Y')}}</td>
					<td>$ {{ number_format($payment->ammount, 2) }}</td>
					<td>$ {{ number_format($payment->capital, 2) }}</td>
					<td>$ {{ number_format($payment->interest, 2) }}</td>
					<td>$ {{ number_format($payment->moratorium, 2) }}</td>
					<td> <button type="button" class="btn btn-primary  btn-lg disabled ">$ {{ number_format($payment->total, 2) }}</button><a href="{{ url('mora') }}/{{$payment->id}}"  class=" btn btn-lg bg-red " onclick="return confirm('¿Estas seguro de perdonar el moratorio?')"><i class="fa fa-angle-left"></i></a><a href="{{ url('cancel') }}/{{$payment->id}}" class="btn btn-lg bg-black " onclick="return confirm('¿Estas seguro de cancelar el pago?')"><i class="fa fa-angle-double-left"></i></a></td>
					<td>${{ number_format($payment->payment, 2)}}</td>
					<td>${{ number_format($payment->balance, 2) }}</td>
					<td><p>{{$payment->status}}</p></td>
					@if ($payment->status == 'Pagado')
						<td>{{$payment->updated_at}}</td>
					@else
						<td>Pago no realizado aún</td>
					@endif
				</tr>
				@elseif($payment->status == "Pagado")
				<tr class="success">
					<td>#{{ $payment->number }}</td>
					<td>{{$payment->day->format('l')}}</td>
					<td>{{$payment->date->format('d F Y')}}</td>
					<td>$ {{ number_format($payment->ammount, 2) }}</td>
					<td>$ {{ number_format($payment->capital, 2) }}</td>
					<td>$ {{ number_format($payment->interest, 2) }}</td>
					<td>$ {{ number_format($payment->moratorium, 2) }}</td>
					<td> <button type="button" class="btn bg-default btn-lg disabled" >$ {{ number_format($payment->total, 2) }}</button><a href="{{ url('cancel') }}/{{$payment->id}}"  class="btn btn-lg bg-black" onclick="return confirm('¿Estas seguro de cancelar el pago?')"><i class="fa fa-angle-double-left"></i></a></td>
					<td>${{ number_format($payment->payment, 2)}}</td>
					<td>${{ number_format($payment->balance, 2) }}</td>
					<td><p style="color:green;">{{$payment->status}}</p></td>
					@if ($payment->status == 'Pagado')
						<td>{{$payment->updated_at}}</td>
					@else
						<td>Pago no realizado aún</td>
					@endif
				</tr>
				@endif
				@endforeach
			</tbody>
		</table>
