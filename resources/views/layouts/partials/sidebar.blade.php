<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    @if (! Auth::guest())
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('/uploads/avatars')}}/{{ Auth::user()->avatar }}" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
      </div>
    </div>
    @endif
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">Menú</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>Inicio</span></a></li>
      <li><a data-toggle="modal" data-target="#cotizador"><i class="fa fa-calculator"></i><span>Cotizador</span></a></li>
      @role('ejecutivo-de-credito')
      <li><a href="{{ url('showVault') }}/{{ Auth::user()->id }}"><i class="fa fa-university"></i> <span>Bóveda</span></a></li>
      @endrole
      @if(Auth::user()->hasRole(['administrador', 'director-general', 'coordinador-regional', 'coordinador-sucursal']))
      <li><a href="{{ url('vault') }}"><i class="fa fa-university"></i> <span>Bóveda</span></a></li>
      <li><a href="{{ url('boxcut') }}"><i class="fa fa-scissors"></i> <span>Corte de Caja</span></a></li>
      <li><a href="{{ url('graphics') }}"><i class='fa fa-line-chart'></i> <span>Graficas</span></a></li>
      @endif
      <li><a href="{{ url('clients') }}"><i class="fa fa-users"></i> <span>Clientes</span></a></li>
      <li><a href="{{ url('credits') }}"><i class="fa fa-money"></i> <span>Créditos</span></a></li>
      @if(Auth::user()->hasRole(['administrador', 'director-general', 'coordinador-regional', 'coordinador-sucursal']))
      <li class="treeview">
        <a href="#"><i class='fa fa-book'></i>  <span>Pagos</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
          <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
        </ul>
      </li>
      <!--<li><a href="#"><i class="fa fa-th"></i> <span>Corte de Caja</span></a></li>
      <li><a href="#"><i class="fa fa-calendar"></i> <span>Cobranza del día</span></a></li>
      <li><a href="#"><i class="fa fa-dollar"></i> <span>Gastos</span></a></li>-->
      <li class="treeview">
        <a href="#"><i class='fa fa-line-chart'></i>  <span>Inversiones</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
          <li><a href="#">Retiros</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class='fa fa-cogs'></i>  <span>Configuración</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{ url('regions') }}">Regiones</a></li>
         <li><a href="{{ url('branches') }}">Sucursales</a></li>
         <li><a href="{{ url('roles') }}">Roles</a></li>
         <li><a href="{{ url('permissions') }}">Permisos</a></li>
         <li><a href="{{ url('employees') }}">Personal</a></li>
         <li><a href="{{ url('products') }}">Productos</a></li>
       </ul>
     </li>
     @endif
   </ul><!-- /.sidebar-menu -->
 </section>
 <!-- /.sidebar -->
</aside>


<div class="modal fade" id="cotizador">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">COTIZADOR</h4>
        </div>
        <div class="modal-body">
          {!! Form::label('modalidad', 'Modalidad:') !!}        
          <select id="status" onChange="mostrar(this.value);" class="form-control input-lg">
            <option value="" class="selected">PRODUCTO</option>
            <option value="Diario">CrediDiario 25</option>
            <option value="Semanal">CrediSemana</option>
            <option value="CrediDiario4">CrediDiario 4</option>
          </select>
          <script>
            function mostrar(id) {
              if (id == "Diario") {
                $("#diario").show();
                $("#semanal").hide();
                $("#credidiario4").hide();
              }
              if (id == "Semanal") {
                $("#diario").hide();
                $("#semanal").show();
                $("#credidiario4").hide();
              }
              if (id == "CrediDiario4") {
                $("#diario").hide();
                $("#semanal").hide();
                $("#credidiario4").show();
              }
            }
          </script>
          <br>
          <div id="diario" style="display: none;">
           <!--{!! Form::label('modalidad', 'Plazo:') !!}      
           <div class="range-slider color-3">
            <input type="text" id="modalidadr" name="modalidadr" onChange="calcularr()" />
          </div>-->
          <h4>Plazo: <strong><span id="demomodalidad"></span></strong></h4>
          <div class=" col-sm-6 col-lg-12 " id="slidecontainer">
            <input type="range" min="1" max="25" value="2" class="slider" name="modalidadr" onChange="calcularr()" id="modalidadr">
          </div><br>
          <input type="hidden" id="tasar" name="tasar" value="0.25">
          {{-- {!! Form::label('capitalr', 'Monto solicitado:') !!}
          <div class="range-slider color-3">
            <input type="text" id="capitalr" name="capitalr" onChange="calcularr()" />
          </div> --}}
          <h4>Monto Solicitado: <strong>$<span id="demor"></span></strong></h4>
          <div class=" col-sm-6 col-lg-12 " id="slidecontainer">
            <input type="range" min="500" max="5000" value="2000" class="slider" name="capitalr" onChange="calcularr()" id="capitalr">
          </div>
          <br>
          <input type="hidden" id="interesr" name="interesr" value="Norway">
          {!! Form::label('totalr', 'Cuota:') !!}  
          {!! Form::text('totalr', 'null', ['class' => 'form-control input-lg', 'id' => 'totalnr', 'readonly' => 'readonly']) !!} 
          {!! Form::label('totalpayment', 'Total a Pagar:') !!}  
          {!! Form::text('totalpayment', null, ['class' => 'form-control input-lg', 'id' => 'totalpayment', 'readonly' => 'readonly']) !!}               
        </div>


        <div id="semanal" style="display: none;"  ">
          <input type="hidden" name="modalidad" id="modalidad" value="1">
          <input type="hidden" id="tasa" name="tasa" value="0.15">
          <h4>Monto Solicitado: <strong>$<span id="demo"></span></strong></h4>
          <div class=" col-sm-6 col-lg-12 " id="slidecontainer">
            <input type="range" min="200" max="1000" value="550" class="slider" name="capital" onChange="calcular()" id="myRange">
          </div>
          <br>
          {!! Form::label('refrendo', 'Refrendo:') !!}  
          {!! Form::text('refrendo', null, ['class' => 'form-control input-lg', 'id' => 'refrendo', 'readonly' => 'readonly']) !!}
          <input type="hidden" id="interes" name="interes">
          {!! Form::label('total', 'Total a pagar:') !!}  
          {!! Form::text('total', null, ['class' => 'form-control input-lg', 'id' => 'totaln', 'readonly' => 'readonly']) !!}
        </div>



        <div id="credidiario4" style="display: none;"  ">
          <h4>Semanas: <strong><span id="democredi4"></span></strong></h4>
          <div class=" col-sm-6 col-lg-12 " id="slidecontainer">
            <input type="range" min="1" max="4" value="2" class="slider" name="modalidadfour" onChange="calcularcredi4()" id="modalidadfour">
          </div>
          <input type="hidden" id="tasafour" name="tasafour" value="0.28">
          <br>   
          <h4>Monto Solicitado: <strong>$<span id="democredi44"></span></strong></h4>
          <div class=" col-sm-6 col-lg-12 " id="slidecontainer">
            <input type="range" min="500" max="3000" value="" class="slider" name="capitalfour" onChange="calcularcredi4()" id="capitalfour">
          </div>
          <br>
          {!! Form::label('refrendofour', 'Refrendo:') !!}  
          {!! Form::text('refrendofour', null, ['class' => 'form-control input-lg', 'id' => 'refrendofour', 'readonly' => 'readonly']) !!}
          <input type="hidden" id="interesfour" name="interesfour">
          {!! Form::label('totalfour', 'Total a pagar:') !!}  
          {!! Form::text('totalfour', null, ['class' => 'form-control input-lg', 'id' => 'totalnfour', 'readonly' => 'readonly']) !!}
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<style>

.color-3 .irs-min, .irs-max {

  font-size: 12px; line-height: 1.333;
  text-shadow: none;
  top: 0; padding: 1px 3px;
  background: #e1e4e9;
  -moz-border-radius: 4px;
  border-radius: 4px;
}
.color-3 .irs-from, .irs-to, .irs-single {
  color: #fff;
  font-size: 15px; line-height: 1.333;
  text-shadow: none;
  padding: 1px 5px;
  background: black;
  -moz-border-radius: 4px;
  border-radius: 4px;
}
</style>

<script>
  function calcular()
  {
    capital = eval(document.getElementById('myRange').value);
    tasa = eval(document.getElementById('tasa').value);
    interes = capital * tasa;

    document.getElementById('interes').value=interes;
    modalidad = eval(document.getElementById('modalidad').value);

    utilidad_neta = capital + interes;
    total= utilidad_neta/modalidad;
    var formatter = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
      minimumFractionDigits: 2,
    });

    var formatterr = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
      minimumFractionDigits: 2,
    });


    document.getElementById('totaln').value=formatterr.format(total);
    document.getElementById('refrendo').value=formatter.format(interes);         
  }
  function calcularcredi4()
  {
    capitalfour = eval(document.getElementById('capitalfour').value);
    tasafour = eval(document.getElementById('tasafour').value);
    interesfour = capitalfour * tasafour;

    document.getElementById('interesfour').value=interesfour;
    modalidadfour = eval(document.getElementById('modalidadfour').value);

    utilidad_netafour = capitalfour + interesfour;
    totalfour= utilidad_netafour/modalidadfour;
    var formatterfour = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
      minimumFractionDigits: 2,
    });

    var formatterrfourfour = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
      minimumFractionDigits: 2,
    });


    document.getElementById('totalnfour').value=formatterrfourfour.format(totalfour);
    document.getElementById('refrendofour').value=formatterfour.format(interesfour);         
  }
  function calcularr()
  {
    capitalr = eval(document.getElementById('capitalr').value);
    tasar = eval(document.getElementById('tasar').value);
    interesr = capitalr * tasar;

    document.getElementById('interesr').value=interes;
    modalidadr = eval(document.getElementById('modalidadr').value);

    utilidad_netar = capitalr + interesr;
    totalr= utilidad_netar/modalidadr;

    var formatterr = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
      minimumFractionDigits: 2,
    });


    document.getElementById('totalnr').value=formatterr.format(totalr);  

    var formatter = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
      minimumFractionDigits: 2,
    });

    totalpayment =  capitalr + interesr;
    document.getElementById('totalpayment').value = formatter.format(totalpayment);  
  }
</script>


<script>
  var slider = document.getElementById("myRange");
  var output = document.getElementById("demo");
  output.innerHTML = slider.value;

  slider.oninput = function() {
    output.innerHTML = this.value;
  }
</script>

<script>
  var slider = document.getElementById("modalidadfour");
  var output = document.getElementById("democredi4");
  output.innerHTML = slider.value;

  slider.oninput = function() {
    output.innerHTML = this.value;
  }
</script>
<script>
function myFunctioncredi44() {
    var x = document.getElementById("capitalfour").value;
    document.getElementById("democredi44").innerHTML = x;
}
</script>


<script>
  var slider = document.getElementById("modalidadr");
  var output = document.getElementById("demomodalidad");
  output.innerHTML = slider.value;

  slider.oninput = function() {
    output.innerHTML = this.value;
  }
</script>
<script>
function mycapitalr() {
    var x = document.getElementById("capitalr").value;
    document.getElementById("demor").innerHTML = x;
}
</script>


<style>
#slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 15px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  background: #ff3300;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #ff3300;
  cursor: pointer;
}
</style>
