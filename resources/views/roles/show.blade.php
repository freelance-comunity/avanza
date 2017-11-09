
 @php
 $permissions = $role->permissions;
 @endphp
 <div class="modal fade" id="detail{{ $role->id }}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">{{ $role->display_name }}</h4>
        </div>
        <div class="modal-body">
          <p>
            <label for="name">Nombre Rol:</label> {{ $role->name }}
          </p>
          <p>
            <label for="description">Descripción Rol:</label> {{ $role->description }}
          </p>
          <p style="text-align: center;">
            PERMISOS DEL ROL
          </p>
          <p>
            {{-- Start accordion permissions --}}
            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1_{{ $role->id }}" style="color: black;">
                      <h5>INICIO</h5></a>
                    </h4>
                  </div>
                  <div id="collapse1_{{ $role->id }}" class="panel-collapse collapse">
                    <div class="panel-body">
                      @foreach ($permissions as $permission)
                      @if($permission->code == 'INICIO')
                      <div class="form-group">
                        <a href="{{ url('/deletepermission') }}/{{$role->id}}/{{$permission->id}}" onclick="return confirm('¿Estas seguro de quitar este permiso a este rol?')"><button class="btn btn-lg btn-primary"> <span aria-hidden="true">&times;</span> {{ $permission->display_name }}</button></a>
                      </div>
                      @endif
                      @endforeach
                    </div>
                  </div>
                </div>

                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2_{{ $role->id }}" style="color: black;"><h5>COTIZADOR</h5></a>
                    </h4>
                  </div>
                  <div id="collapse2_{{ $role->id }}" class="panel-collapse collapse">
                    <div class="panel-body">
                      @foreach ($permissions as $permission)
                      @if($permission->code == 'COTIZADOR')
                      <div class="form-group col-sm-6 col-lg-4">
                        <a href="{{ url('/deletepermission') }}/{{$role->id}}/{{$permission->id}}" onclick="return confirm('¿Estas seguro de quitar este permiso a este rol?')"><button class="btn btn-lg btn-primary"> <span aria-hidden="true">&times;</span> {{ $permission->display_name }}</button></a>
                      </div>
                      @endif
                      @endforeach
                    </div>
                  </div>
                </div>

                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse3_{{ $role->id }}" style="color: black;"><h5>CLIENTES</h5></a>
                    </h4>
                  </div>
                  <div id="collapse3_{{ $role->id }}" class="panel-collapse collapse">
                    <div class="panel-body">
                      @foreach ($permissions as $permission)
                      @if($permission->code == 'CLIENTES')
                      <div class="form-group col-sm-6 col-lg-4">
                        <a href="{{ url('/deletepermission') }}/{{$role->id}}/{{$permission->id}}" onclick="return confirm('¿Estas seguro de quitar este permiso a este rol?')"><button class="btn btn-lg btn-primary"> <span aria-hidden="true">&times;</span> {{ $permission->display_name }}</button></a>
                      </div>
                      @endif
                      @endforeach
                    </div>
                  </div>
                </div>

                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse4_{{ $role->id }}" style="color: black;"><h5>CRÉDITOS</h5></a>
                    </h4>
                  </div>
                  <div id="collapse4_{{ $role->id }}" class="panel-collapse collapse">
                    <div class="panel-body">
                      @foreach ($permissions as $permission)
                      @if($permission->code == 'CREDITOS')
                      <div class="form-group col-sm-6 col-lg-4">
                        <a href="{{ url('/deletepermission') }}/{{$role->id}}/{{$permission->id}}" onclick="return confirm('¿Estas seguro de quitar este permiso a este rol?')"><button class="btn btn-lg btn-primary"> <span aria-hidden="true">&times;</span> {{ $permission->display_name }}</button></a>
                      </div>
                      @endif
                      @endforeach
                    </div>
                  </div>
                </div>

                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse5_{{ $role->id }}" style="color: black;"><h5>PAGOS</h5></a>
                    </h4>
                  </div>
                  <div id="collapse5_{{ $role->id }}" class="panel-collapse collapse">
                    <div class="panel-body">
                      @foreach ($permissions as $permission)
                      @if($permission->code == 'PAGOS')
                      <div class="form-group col-sm-6 col-lg-4">
                        <a href="{{ url('/deletepermission') }}/{{$role->id}}/{{$permission->id}}" onclick="return confirm('¿Estas seguro de quitar este permiso a este rol?')"><button class="btn btn-lg btn-primary"> <span aria-hidden="true">&times;</span> {{ $permission->display_name }}</button></a>
                      </div>
                      @endif
                      @endforeach
                    </div>
                  </div>
                </div>

                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse6_{{ $role->id }}" style="color: black;"><h5>CORTE DE CAJA</h5></a>
                    </h4>
                  </div>
                  <div id="collapse6_{{ $role->id }}" class="panel-collapse collapse">
                    <div class="panel-body">
                      @foreach ($permissions as $permission)
                      @if($permission->code == 'CORTE DE CAJA')
                      <div class="form-group col-sm-6 col-lg-4">
                        <a href="{{ url('/deletepermission') }}/{{$role->id}}/{{$permission->id}}" onclick="return confirm('¿Estas seguro de quitar este permiso a este rol?')"><button class="btn btn-lg btn-primary"> <span aria-hidden="true">&times;</span> {{ $permission->display_name }}</button></a>
                      </div>
                      @endif
                      @endforeach
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse7_{{ $role->id }}" style="color: black;"><h5>CONFIGURACIÓN</h5></a>
                    </h4>
                  </div>
                  <div id="collapse7_{{ $role->id }}" class="panel-collapse collapse">
                    <div class="panel-body">
                      @foreach ($permissions as $permission)
                      @if($permission->code == 'CONFIGURACIÓN')
                      <div class="form-group col-sm-6 col-lg-4">
                        <a href="{{ url('/deletepermission') }}/{{$role->id}}/{{$permission->id}}" onclick="return confirm('¿Estas seguro de quitar este permiso a este rol?')"><button class="btn btn-lg btn-primary"> <span aria-hidden="true">&times;</span> {{ $permission->display_name }}</button></a>
                      </div>
                      @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
              {{-- End accordion permissions --}}
            </p>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-lg btn-default pull-left" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  <!-- /.modal -->