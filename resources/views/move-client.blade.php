@php
$user_allocation = Auth::user();
$region_allocation = $user_allocation->region;
$collection = App\Role::all();
$role = $collection->where('name', 'ejecutivo-de-credito')->first();
$filtered = App\User::where('id', '!=', Auth::id())->get();
$users = $filtered->all();
@endphp
<div class="modal fade" id="moveClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ELEGIR PROMOTOR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => 'moveClient','data-parsley-validate' => '',  'files' => 'true','onsubmit'=>'return enviado()']) !!}
        <div class="form-group col-sm-6 col-lg-12">
              {!! Form::label('user_id', 'Nombre del Ejecutivo:') !!}
              <select name="user_id"  id="" class="form-control input-lg">
                <option selected="">Elige Promotor</option>
                @foreach ($users as $user)
                @if ($user->hasRole(['ejecutivo-de-credito']))
                <option value=" {{ $user->id  }}">
                  {{ $user->name }} {{ $user->father_last_name }} {{ $user->mother_last_name }}
                </option>
                @endif   
                @endforeach
              </select>
            </div>
        </p>
        <div class="form-group col-sm-6 col-lg-12">
        <p>
          {!! Form::submit('SIGUIENTE', ['class' => 'btn btn-lg btn-block bg-navy']) !!}
        </p>
      </div>

        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>

  var cuenta=0;
  function enviado() {
    if (cuenta == 0)
    {
      cuenta++;
      return true;
    }
    else
    {
      alert("El formulario ya está siendo enviado, por favor aguarde un instante.");
      return false;
    }
  }

</script>
