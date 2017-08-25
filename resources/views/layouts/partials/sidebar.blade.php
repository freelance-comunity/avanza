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

    <!-- search form (Optional) -->
        <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>-->
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">Menú</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>Inicio</span></a></li>
            <li><a data-toggle="modal" data-target="#cotizador"><i class="fa fa-calculator"></i><span>Cotizador</span></a></li>
            <li><a href="{{ url('clients') }}"><i class="fa fa-users"></i> <span>Clientes</span></a></li>
            <li><a href="{{ url('credits') }}"><i class="fa fa-money"></i> <span>Créditos</span></a></li>
            <li class="treeview">
              <a href="#"><i class='fa fa-book'></i>  <span>Pagos</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-th"></i> <span>Corte de Caja</span></a></li>
            <li><a href="#"><i class="fa fa-calendar"></i> <span>Cobranza del día</span></a></li>
            <li><a href="#"><i class="fa fa-dollar"></i> <span>Gastos</span></a></li>
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
               <li><a href="{{ url('branches') }}">Sucursales</a></li>
               <li><a href="{{ url('roles') }}">Roles</a></li>
               <li><a href="{{ url('permissions') }}">Permisos</a></li>
               <li><a href="{{ url('employees') }}">Personal</a></li>
               <li><a href="{{ url('products') }}">Productos</a></li>
             </ul>
           </li>
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
                <option value="" class="selected">Elige Modalidad</option>
                <option value="Diario">Diario</option>
                <option value="Semanal">Semanal</option>
              </select>
              <script>
                function mostrar(id) {
                  if (id == "Diario") {
                    $("#diario").show();
                    $("#semanal").hide();
                  }
                  if (id == "Semanal") {
                    $("#diario").hide();
                    $("#semanal").show();
                  }
                }
              </script>
              <br>
              <div id="diario" style="display: none;" class="form-group col-sm-6 col-lg-12 ">
                <select id="modalidadr" name="modalidadr" onChange="mostrar(this.value); calcularr()" class="form-control input-lg">
                  <option  value="25">25 días</option>
                  <option value="30">30 días</option>
                  <option value="52">52 días</option>
                  <option value="60">60 días</option>
                </select><br>
                <input type="hidden" id="tasar" name="tasar" value="0.15">
                {!! Form::label('capitalr', 'Capital:') !!}
                <div class="range-slider color-3">
                  <input type="text" id="capitalr" name="capitalr" onChange="calcularr()" />
                </div>
                <br>
                <!-- {!! Form::text('capitalr', null, ['class' => 'form-control input-lg', 'id' => 'capitalr', 'value' => '0', 'onkeyup' => 'calcularr()']) !!}-->
                <input type="hidden" id="interesr" name="interesr" value="Norway">

                {!! Form::label('totalr', 'TOTAL:') !!}  
                {!! Form::text('totalr', null, ['class' => 'form-control input-lg', 'id' => 'totalnr', 'readonly' => 'readonly']) !!}               
              </div>




              <div id="semanal" style="display: none;" class="form-group col-sm-6 col-lg-12 ">
                <select id="modalidad" name="modalidad"  onChange="mostrar(this.value); calcular()" class="form-control input-lg">
                  <option onChange="calcular()" value="1">1 Semana</option>
                </select> <br>
                <input type="hidden" id="tasa" name="tasa" value="0.15">
                {!! Form::label('capital', 'Capital:') !!}
                <div class="range-slider color-3">
                <input type="text" id="capital" name="capital" onChange="calcular()" />
                </div>
                <br>
                <!--{!! Form::text('capital', null, ['class' => 'form-control input-lg', 'id' => 'capital', 'value' => '0', 'onkeyup' => 'calcular()']) !!}-->

                <input type="hidden" id="interes" name="interes">
                {!! Form::label('total', 'TOTAL:') !!}  
                {!! Form::text('total', null, ['class' => 'form-control input-lg', 'id' => 'totaln', 'readonly' => 'readonly']) !!}
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
        $("#capitalr").ionRangeSlider({
         grid: true,
         from: 0,
         values: [0,1000, 1500, 2000, 2500, 3000, 3500, 4000,4500,5000,5500,6000,6500,7000,7500,8000,8500, 9000, 9500,10000,10500,11000,11500, 12000, 12500, 13000, 13500, 14000,14500, 15000,15500,16000,16500, 17000,17500,18000,18500,19000,19500, 20000],
         prefix: "$"
       });
     </script>
     <script>
      $("#capital").ionRangeSlider({
        grid: true,
         from: 0,
         values: [0,1000, 1500, 2000, 2500, 3000, 3500, 4000,4500,5000,5500,6000,6500,7000,7500,8000,8500, 9000, 9500,10000,10500,11000,11500, 12000, 12500, 13000, 13500, 14000,14500, 15000,15500,16000,16500, 17000,17500,18000,18500,19000,19500, 20000],
         prefix: "$"
      });
    </script>
    <script>
      function calcular()
      {
        capital = eval(document.getElementById('capital').value);
        tasa = eval(document.getElementById('tasa').value);
        interes = capital * tasa;

        document.getElementById('interes').value=interes;
        modalidad = eval(document.getElementById('modalidad').value);

        utilidad_neta = capital + interes;
        total= utilidad_neta/modalidad;

        document.getElementById('totaln').value=Math.ceil(total);         
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

        document.getElementById('totalnr').value=Math.ceil(totalr);         
      }
    </script>

