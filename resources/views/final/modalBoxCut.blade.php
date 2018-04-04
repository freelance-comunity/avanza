<div class="modal fade" id="modalBoxCut" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CIERRE BÓVEDA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => 'finalDay','' => '','onsubmit'=>'return enviado()']) !!}  
        <div class="table-inverse">
         <div class="table-responsive">
           <table class="table" id="gs">
            <thead class="thead-inverse">
              <th>Fecha</th>
              <th>Región</th>
              <th>Sucursal</th>
              <th>Empleado</th>
              <th>Saldo Bóveda</th>
              <th>Asignación en Efectivo</th>
              <th>Recuperación</th>
              <th>Recuperación Access</th>
              <th>Colocación</th>
              <th>Gastos</th>
              <th>Inversión en Activos</th>
            </thead>
            <tbody>
              @php

              $users = App\User::all();
              // $boxcuts = App\Models\Boxcut::where('created_at', '>=', \Carbon\Carbon::now()->toDateString() . ' 00:00:00')->where('created_at', '<=', \Carbon\Carbon::now()->toDateString() . ' 23:59:59')->get();

              $now = \Carbon\Carbon::now()->toDateString();
              @endphp
              @foreach ($users as $user)
              @php
              $current =  \Carbon\Carbon::today()->toDateString();
              $vault = $user->vault;
              $vault_total = App\Models\Vault::all();
              $incomes = $vault->incomes->where('date', $current);
              $incomePayment = $vault->incomePayment->where('date', $current);
              $purseAccess = $vault->purseAccess->where('date', $current);
              $expendituresCredit = $vault->expendituresCredit->where('date', $current);
              $expenditures = $vault->expenditures->where('date', $current);
              $actives = $vault->actives->where('date', $current);
              @endphp
              <tr>
                <td>{{$now}}</td>
                <td>{{$user->region['name']}}</td>
                <td>{{$user->branch['name']}}</td>
                <td>{{$user->name}} {{$user->father_last_name}} {{$user->mother_last_name}}</td>
                <td>${{ number_format($vault->ammount,2) }}</td>
                <td>${{number_format($incomes->sum('ammount',2))}}</td>
                <td>${{number_format($incomePayment->sum('ammount',2))}}</td>
                <td>${{number_format($purseAccess->sum('ammount',2))}}</td>
                <td>${{number_format($expendituresCredit->sum('ammount',2))}}</td>
                <td>${{number_format($expenditures->sum('ammount',2))}}</td>
                <td>${{number_format($actives->sum('ammount',2))}}</td>
              </tr>
              <input type="text" name="date" value="{{$now}}">
              <input type="text" name="region" value="{{ $user->region['name'] }}">
              <input type="text" name="branch" value="{{ $user->branch['name']}}">
              <input type="text" name="name" value="{{$user->name}} {{$user->father_last_name}} {{$user->mother_last_name}}">
              <input type="text" name="vault" value="{{$vault->ammount}}">
              <input type="text" name="incomes" value="{{$incomes->sum('ammount')}}">
              <input type="text" name="incomePayment" value="{{$incomePayment->sum('ammount')}}">
              <input type="text" name="access" value="{{$purseAccess->sum('ammount')}}">
              <input type="text" name="credit" value="{{$expendituresCredit->sum('ammount')}}">
              <input type="text" name="expenditures" value="{{$expenditures->sum('ammount')}}">
              <input type="text" name="actives" value="{{$actives->sum('ammount')}}"> 

              @endforeach
              

              
            </tbody>
          </table>
        </div>
      </div>
      <p>
        {!! Form::submit('Cerrar Bóveda', ['class' => 'btn btn-lg btn-block bg-navy']) !!}
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