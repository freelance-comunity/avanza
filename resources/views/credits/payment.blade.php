<div class="modal fade" id="payment_{{ $payment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REALIZAR PAGO # {{ $payment->number }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        {!! Form::open(['url' => 'process','data-parsley-validate' => '']) !!}  
        <p>
          {!! Form::label('payment', 'Monto:') !!}
          {!! Form::text('payment', null, [
            'class' => 'form-control input-lg',
            'placeholder' => 'PAGO',
            'id' => 'payment',
            'required' => 'required',
            'data-parsley-type' => 'number',
            'data-parsley-trigger ' => 'input focusin',]) !!}
            <input type="hidden"  name="payment_id" value="{{ $payment->id }}">
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