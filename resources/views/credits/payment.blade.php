<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        @php
        $now = Carbon\Carbon::now()->toDateString();
        $debt = $credit->debt;
        $payment_day = App\Models\Payment::where('date', $now)->where('debt_id', $debt->id)->get();
        @endphp
        <h5 class="modal-title" id="exampleModalLabel">REALIZAR PAGO {{ $now }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '#','data-parsley-validate' => '']) !!}  
        <p>
          {!! Form::label('payment', 'Monto:') !!}
          {!! Form::text('payment', null, [
            'class' => 'form-control input-lg',
            'placeholder' => 'PAGO',
            'id' => 'payment',
            'onkeyup' => 'check()',
            'required' => 'required',
            'data-parsley-pattern' => '^[0-9]*\.[0-9]{2}$',
            'data-parsley-trigger ' => 'input focusin',]) !!}
          </p>
          <p>
            <table class="table" id="payments">
              <thead>
                <th>No. Cuota</th>
                <th>Capital</th>
                <th>Interés</th>
                <th>Moratorio</th>
                <th>Total</th>
                <th>Pago</th>       
              </thead>
              <tbody>
                @foreach($payment_day as $payment)
                <tr>
                  <td>#{{ $payment->number }}</td>
                  <td>$ {{ number_format($payment->capital) }}</td>
                  <td>$ {{ number_format($payment->interest) }}</td>
                  <td>$ {{ number_format($payment->moratorium) }}</td>
                  <td id="total">$ {{ number_format($payment->total) }}</td>
                  <td>{{$payment->payment}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </p>
          <p>
            {!! Form::submit('PAGAR', ['class' => 'btn btn-lg btn-block btn-success']) !!}
          </p>
          {!! Form::close() !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  <script>
  function check() {
      payment = eval(document.getElementById('payment').value); 
      $('#total').html('payment')
    }
  </script>