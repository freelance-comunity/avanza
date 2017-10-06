<div class="modal fade" id="retiros" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">RETIROS</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      {{-- {!! Form::open(['url' => 'process','data-parsley-validate' => '','onsubmit'=>'return enviado()']) !!}  --}} 
       {!! Form::open(['route' => 'retreats.store']) !!}
        <p>
          {!! Form::label('ammount', 'Monto:') !!}
            <input type="number" name="ammount" class="form-control input-lg" placeholder="ESCRIBE MONTO" required="required" data-parsley-trigger="input focusin" data-parsley-type="digits" data-parsley-maxlength="5">
             <input type="hidden"  name="user_id" value="{{ Auth::user()->id }}">
          </p>
          <p>
            {!! Form::submit('GUARDAR', ['class' => 'btn btn-lg btn-block bg-navy' ]) !!}
          </p>
          {!! Form::close() !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>

      </div>
    </div>
  </div>
  