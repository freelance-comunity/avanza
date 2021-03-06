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
        <a><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
      </div>
    </div>
    @endif
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">Menú</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>Inicio</span></a></li>
      {{--     <li><a data-toggle="modal" data-target="#cotizador"><i class="fa fa-calculator"></i><span>Cotizador</span></a></li> --}}
      @role('ejecutivo-de-credito')
      <li><a href="{{ url('showVault') }}/{{ Auth::user()->id }}"><i class="fa fa-university"></i> <span>Bóveda</span></a></li>  
      @endrole


      @if(Auth::user()->hasRole(['administrador', 'director-general', 'coordinador-regional', 'coordinador-sucursal']))
      <li><a href="{{ url('vault') }}"><i class="fa fa-university"></i> <span>Bóveda</span></a></li>
     {{--  @if(Auth::user()->hasRole(['administrador', 'director-general']))
      <li><a data-toggle="modal" data-target="#gastoDA"><i class="fa fa-dollar"></i><span>Registrar Gasto </span></a></li>
      @endif      --}}
     {{--  @role('coordinador-regional')
      <li><a data-toggle="modal" data-target="#gastoC"><i class="fa fa-dollar"></i><span>Registrar Gasto </span></a></li>    
      @endrole  --}}
      {{--  <li><a href="{{ url('boxcut') }}"><i class="fa fa-scissors"></i> <span>Corte de Caja</span></a></li> --}}
      {{-- <li><a href="{{ url('reportPayment') }}"><i class="fa fa-scissors"></i> <span>Historial de pagos</span></a></li> --}}
      <li class="treeview">
        <a><i class='fa fa-cubes'></i><span> Administración</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          @if(Auth::user()->hasRole(['administrador', 'director-general']))
          <li><a href="{{ url('showInvestments') }}/{{ Auth::user()->id }}">Inversiones</a></li>
          <li><a href="{{ url('showRetreats') }}/{{ Auth::user()->id }}">Retiros</a></li>
          @if (Auth::user()->id == 1 OR Auth::user()->id == 20)
          <li><a href="{{ url('transfer') }}">Reasignación de Cartera</a></li>
          {{-- <li><a href="{{ url('moveCredits') }}">Transferir Credito</a></li> --}}
          {{-- <li><a data-toggle="modal" data-target="#move"><span>Transferir Crédito</span></a></li>--}}          
          <li><a data-toggle="modal" data-target="#moveClient"><span>Transferir Cliente</span></a></li>
          @endif
          @endif
          <li><a href="{{ route('rosters.store') }}">Sueldos</a></li>
          {{-- <li><a href="{{ url('expenses-admin') }}">Gastos</a></li> --}}
          @if(Auth::user()->hasRole(['administrador', 'director-general']))
          <li><a data-toggle="modal" data-target="#gastoDA"><span>Registrar Gasto </span></a></li>
          @endif     
          @role('coordinador-regional')
          <li><a data-toggle="modal" data-target="#gastoC"></i><span>Registrar Gasto </span></a></li>    
          @endrole 
          {{--   <li><a href="{{ url('actives-admin') }}">Inversiones en Activos</a></li> --}}
        </ul>
      </li>

      
      {{-- <li><a href="{{ url('graphics') }}"><i class='fa fa-line-chart'></i> <span>Graficas</span></a></li> --}}
      @if(Auth::user()->hasRole(['administrador', 'director-general']))
      {{--   <li><a href="{{ url('graphics2') }}"><i class='fa fa-line-chart'></i> <span>Graficas 2</span></a></li> --}}
      <li class="treeview">
        <a><i class='ion ion-pie-graph'></i><span> Reportes</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
         <li><a href="{{ url('walletExpired') }}">Cartera Total</a></li>
         {{--  <li><a href="{{ url('wallet') }}">Cartera ajax</a></li> --}}
         <li><a href="{{ url('reportVaults') }}">Bóveda</a></li>
         {{-- <li><a href="{{ url('totalVault') }}">Total bovéda</a></li> --}}
         <li><a href="{{ url('finalDay') }}">Cierre Bóveda</a></li>
         
       </ul>
     </li>
     <li class="treeview">
      <a><i class='fa fa-dollar'></i><span> Historial De Pagos</span> <i class="fa fa-angle-left pull-right"></i></a>
      
      <ul class="treeview-menu">
        <li><a href="{{ url('totalPayments') }}">Todos los Pagos</a></li>
        {{-- <li class="treeview">
          <a>Región Centro
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('reportPaymentTeran') }}"><i class="fa fa-circle-o"></i>Terán</a></li>
            <li><a href="{{ url('reportPayment24') }}"><i class="fa fa-circle-o"></i>24 de Junio</a></li>
          </ul>
        </li> --}}
        <li><a href="{{ url('reportPaymentCentro') }}">Región Centro</a></li>
        <li><a href="{{ url('reportPaymentAltos') }}">Región Altos</a></li>
        <li><a href="{{ url('reportPaymentMezcalapa') }}">Región Mezcalapa</a></li>
        <li><a href="{{ url('reportPaymentNorte') }}">Región Norte</a></li>

      </ul>
    </li>
    @endif
    {{-- <li><a href="{{ url('movements') }}"><i class='fa fa-external-link'></i> <span>Movimientos</span></a></li> --}}
    <li class="treeview">
      <a><i class='fa fa-external-link'></i><span> Movimientos</span> <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
       {{-- <li><a href="{{ url('movementsBalance') }}">Saldo en Caja</a></li> --}}
       <li><a href="{{ url('movementsBeginning') }}">Asignacion en Efectivo</a></li>
       {{--  <li><a href="{{ url('movementsBeginningNorte') }}">Asignacion en Efectivo</a></li> --}}
       {{-- <li><a href="{{ url('movementsEffective') }}">Asignacion en Efectivo</a></li> --}}
       @if(Auth::user()->hasRole(['coordinador-regional']))
       <li><a href="{{ url('movementsRecovery') }}">Recuperación</a></li>
       @endif
       <li><a href="{{ url('movementsRecoveryAccess') }}">Recuperación Access</a></li>
       <li><a href="{{ url('movementsPlacement') }}">Colocación</a></li>
       <li><a href="{{ url('movementsExpenses') }}">Gastos</a></li>
       <li><a href="{{ url('movementsSalaries') }}">Sueldos</a></li>
       <li><a href="{{ url('movementsCut') }}">Cortes de Caja</a></li>
       {{--  <li><a href="{{ url('movementsActives') }}">Inversión en Activos</a></li> --}}
     </ul>
   </li>
    <li><a href="{{ url('paymentsDueToday') }}"><i class="fa fa-exclamation-triangle"></i> <span>Pagos Por Vencer</span></a></li>
   @endif
   {{--  <li><a href="{{ url('ruta') }}"><i class="fa fa-users"></i> <span>Ruta</span></a></li> --}}

   <li><a href="{{ url('clients') }}"><i class="fa fa-users"></i> <span>Clientes</span></a></li>
   @if(Auth::user()->hasRole(['ejecutivo-de-credito']))
   <li><a data-toggle="modal" data-target="#selection"><i class="fa fa-user"></i><span>Nuevo Cliente</span></a></li>
   @endif
   <li class="treeview">
     <li class="treeview">
      <a><i class='fa fa-money'></i><span> Créditos</span><i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
       <li><a href="{{ url('credits') }}">Todos</a></li>
       <li><a href="{{ url('creditsValid') }}">Vigentes</a></li>
       <li><a href="{{ url('creditsPaidOut') }}">Pagados</a></li>
     </ul>
   </li>

   {{-- <li><a href="{{ url('transfers')}}"><i class="fa fa-paper-plane"></i> <span>Tranferencias</span></a></li> --}}
   {{-- @if(Auth::user()->hasRole(['administrador', 'director-general']))
   <li><a href="{{ url('restructures')}}"><i class="fa fa-dollar"></i> <span>Reestructurados</span></a></li>
   @endif --}}
   @if(Auth::user()->hasRole(['administrador', 'director-general']))
   @if (Auth::user()->id == 1 OR Auth::user()->id == 20)
   <li class="treeview">
    <a href="#"><i class='fa fa-cogs'></i>  <span>Configuración</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
      @if (Auth::user()->can('region'))
      <li><a href="{{ url('regions') }}">Regiones</a></li>
      @endif
      @if (Auth::user()->can('sucursales'))
      <li><a href="{{ url('branches') }}">Sucursales</a></li>
      @endif
      {{-- @if (Auth::user()->can('roles')) --}}
      @if (Auth::user()->id == 1)
      <li><a href="{{ url('roles') }}">Roles</a></li>
      @endif
      {{-- @endif --}}
      {{--  @if (Auth::user()->can('permisos')) --}}
      @if (Auth::user()->id == 1)
      <li><a href="{{ url('permissions') }}">Permisos</a></li>
      @endif
      @if (Auth::user()->can('personal'))
      <li><a href="{{ url('employees') }}">Personal</a></li>
      @endif
      @if (Auth::user()->can('productos'))
      <li><a href="{{ url('products') }}">Productos</a></li>
      @endif
     
    </ul>
    @endif
  </li>
  @endif
</ul><!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>
@include('cotizador')
@include('partials.move')
@include('move-client')
@include('clients.selection')
@include('expenditures.gastoP')
@include('expenditures.gastoDA')
@include('expenditures.gastoC')
