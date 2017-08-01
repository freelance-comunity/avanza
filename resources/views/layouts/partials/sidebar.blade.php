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
            <li><a><i class="fa fa-calculator" data-toggle="modal" data-target="#cotizador"></i><span>Cotizador</span></a></li>
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
                   <li><a href="{{ url('employees') }}">Personal</a></li>
                   <li><a href="{{ url('products') }}">Productos</a></li>
               </ul>
           </li>
       </ul><!-- /.sidebar-menu -->
   </section>
   <!-- /.sidebar -->
</aside>


<div class="modal modal-danger fade" id="cotizador">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">COTIZADOR</h4>
        </div>
        <div class="modal-body">

            {!! Form::label('capital', 'Capital:') !!}
            {!! Form::text('capital', null, ['class' => 'form-control', 'id' => 'capital', 'value' => '0', 'onkeyup' => 'calcular()']) !!}




            {!! Form::label('tasa', 'Tasa:') !!}
            {!! Form::select('tasa',['0.15'=> '15%', '0.60' =>'60%'],null, ['class' => 'form-control', 'id' => 'tasa', 'value' => '15', 'onchange' => 'calcular()']) !!}




            {!! Form::label('interes', 'Interés:') !!}
            {!! Form::text('interes', null, ['class' => 'form-control', 'id' => 'interes', 'readonly' => 'readonly']) !!}



            {!! Form::label('modalidad', 'Modalidad:') !!}         
            {!! Form::select('modalidad',['30'=>'Diario', '1'=>'Semanal'] ,null, ['class' => 'form-control', 'id' => 'modalidad', 'onchange' => 'calcular()']) !!}


            {!! Form::label('total', 'TOTAL:') !!}  
            {!! Form::text('total', null, ['class' => 'form-control', 'id' => 'totaln', 'readonly' => 'readonly']) !!}   

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <script>
  function calcular()
  {
    capital = eval(document.getElementById('capital').value);
    tasa = eval(document.getElementById('tasa').value);
    utilidad = capital * tasa;

    document.getElementById('interes').value=utilidad;
    modalidad = eval(document.getElementById('modalidad').value);

    utilidad_neta = capital + utilidad;
    total= utilidad_neta/modalidad;

    document.getElementById('totaln').value=Math.ceil(total);
  }
</script>