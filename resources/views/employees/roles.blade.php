 <!-- Modal -->
 <div id="roles{{$employee->id}}" class="modal fade modal-default" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Roles de {{$employee->name}} {{ $employee->father_last_name }} {{ $employee->mother_last_name }}</h4>
    </div>
    <div class="modal-body">
        @php
        $roles = $employee->roles;
        @endphp
        @if($roles->isEmpty())
        <div class="text-center">Este empleado no tiene ningun rol asignado.</div>
        @else
        @foreach ($roles as $element)
        <a href="{{ url('/deleterole') }}/{{$employee->id}}/{{$element->id}}" onclick="return confirm('¿Estas seguro de quitar este privilegio a este Empleado?')"><button class="btn btn-default"> <span aria-hidden="true">&times;</span> {{ $element->name }}</button></a>
        @endforeach
        @endif
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>
</div>

</div>
</div>
<!-- End Roles -->