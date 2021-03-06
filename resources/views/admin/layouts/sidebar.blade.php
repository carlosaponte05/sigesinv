<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="https://lh3.googleusercontent.com/-9xk2RepQ-ik/WEAICgtSI8I/AAAAAAAAAHk/uXTp7pdeiFMvMPnLbKL9wd3orY7bc_8XwCLcB/s328-no/PP.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><a href="#">{{\Sentinel::check()->first_name}}</a></p>
        {{-- <a href="#"><i class="fa fa-circle text-success"></i> En Línea</a> --}}
        <a href="{{ url('admin/logout') }}" class="btn btn-link" title="logout" >
          <p class="text-primary">
            <i class="glyphicon glyphicon-log-out glyphicon-log-out"></i> Salir
          </p>
        </a>
      </div>
    {{-- <ul class="treeview-menu">
      <li><a href="#"><i class="fa fa-user-circle"></i>Perfil</a></li>
      <li><a href="#"><i class="glyphicon glyphicon-log-out"></i>Salir</a></li>
    </ul> --}}
  </div>
  <!-- search form -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
        </button>
      </span>
    </div>
  </form>
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
    <li class="header">NAVEGACIÓN PRINCIPAL</li>
    <!-- \Sentinel::getUser()->roles()->first()->hasAccess(['user.create']) -->
    @if (\Sentinel::getUser()->roles()->first()->hasAccess(['user.view'])==1) 
    <li class="treeview {{ Request::is('admin/user*') ? 'active':'' }}">
      <a href="#">
        <i class="fa fa-users"></i> <span>Usuarios</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
         @if (\Sentinel::getUser()->roles()->first()->hasAccess(['user.view'])==1) 
          <li class="{{ Request::is('admin/user') ? 'active':'' }}"><a href="{{ url('admin/user') }}"><i class="fa fa-users"></i>Listar</a></li>
         @endif 

         @if (\Sentinel::getUser()->roles()->first()->hasAccess(['user.create'])==1) 
          <li class="{{ Request::is('admin/user/create') ? 'active':'' }}"><a href="{{ url('admin/user/create') }}"><i class="fa fa-user-plus"></i>Agregar Nuevo Usuario</a></li>
         @endif 
        <li class="{{ Request::is('admin/user/profile') ? 'active':'' }}"><a href="{{ url('admin/user/'.\Sentinel::check()->id.'/profile') }}"><i class="fa fa-user-circle-o"></i>Tu Perfil</a></li>
      </ul>
    </li>
     @endif 
<!-- Materiales -->
@if (\Sentinel::getUser()->roles()->first()->hasAccess(['materiales.view'])) 
    <li class="treeview {{ Request::is('admin/materiales*') ? 'active':'' }}">
      <a href="#">
        <i class="fa fa-users"></i> <span>Materiales</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
         @if (\Sentinel::getUser()->roles()->first()->hasAccess(['materiales.view'])==1) 
          <li class="{{ Request::is('admin/materiales') ? 'active':'' }}"><a href="{{ url('admin/materiales') }}"><i class="fa fa-users"></i>Listar</a></li>
         @endif 

         @if (\Sentinel::getUser()->roles()->first()->hasAccess(['materiales.create'])==1) 
          <li class="{{ Request::is('admin/materiales/create') ? 'active':'' }}"><a href="{{ url('admin/materiales/create') }}"><i class="fa fa-user-plus"></i>Agregar Nuevo Material</a></li>
         @endif 
        
      </ul>
    </li>
     @endif 

<!-- fin materiales-->
<!-- Proveedores -->
@if (\Sentinel::getUser()->roles()->first()->hasAccess(['proveedores.view'])) 
    <li class="treeview {{ Request::is('admin/proveedores*') ? 'active':'' }}">
      <a href="#">
        <i class="fa fa-users"></i> <span>Proveedores</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
         @if (\Sentinel::getUser()->roles()->first()->hasAccess(['proveedores.view'])==1) 
          <li class="{{ Request::is('admin/proveedores') ? 'active':'' }}"><a href="{{ url('admin/proveedores') }}"><i class="fa fa-users"></i>Listar</a></li>
         @endif 

         @if (\Sentinel::getUser()->roles()->first()->hasAccess(['proveedores.create'])==1) 
          <li class="{{ Request::is('admin/proveedores/create') ? 'active':'' }}"><a href="{{ url('admin/proveedores/create') }}"><i class="fa fa-user-plus"></i>Agregar Nuevo Proveedore</a></li>
         @endif 
        
      </ul>
    </li>
     @endif 

<!-- fin proveedores-->
<!-- Ordenes de Compra -->
@if (\Sentinel::getUser()->roles()->first()->hasAccess(['orden_compra.view'])) 
    <li class="treeview {{ Request::is('admin/orden_compra*') ? 'active':'' }}">
      <a href="#">
        <i class="fa fa-users"></i> <span>Orden de Compra</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
         @if (\Sentinel::getUser()->roles()->first()->hasAccess(['orden_compra.view'])==1) 
          <li class="{{ Request::is('admin/orden_compra/lista') ? 'active':'' }}"><a href="{{ url('admin/orden_compra/lista') }}"><i class="fa fa-users"></i>Listar</a></li>
         @endif 

         @if (\Sentinel::getUser()->roles()->first()->hasAccess(['materiales.create'])==1) 
          <li class="{{ Request::is('admin/orden_compra/create') ? 'active':'' }}"><a href="{{ url('admin/orden_compra/create') }}"><i class="fa fa-user-plus"></i>Crear Orden</a></li>
         @endif 
        
      </ul>
    </li>
     @endif 

<!-- fin orden de compra-->
<!-- Ordenes de Pedido -->
@if (\Sentinel::getUser()->roles()->first()->hasAccess(['orden_pedido.view'])) 
    <li class="treeview {{ Request::is('admin/orden_pedido*') ? 'active':'' }}">
      <a href="#">
        <i class="fa fa-users"></i> <span>Orden de Pedido</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
         @if (\Sentinel::getUser()->roles()->first()->hasAccess(['orden_pedido.view'])==1) 
          <li class="{{ Request::is('admin/orden_pedido/lista') ? 'active':'' }}"><a href="{{ url('admin/orden_pedido/lista') }}"><i class="fa fa-users"></i>Listar</a></li>
         @endif 

         @if (\Sentinel::getUser()->roles()->first()->hasAccess(['materiales.create'])==1) 
          <li class="{{ Request::is('admin/orden_pedido/create') ? 'active':'' }}"><a href="{{ url('admin/orden_pedido/create') }}"><i class="fa fa-user-plus"></i>Crear Orden</a></li>
         @endif 
        
      </ul>
    </li>
     @endif 

<!-- fin orden de pedido-->
    @if (isGod(\Sentinel::check()->id)) 
    <li class="treeview {{ Request::is('admin/role*') ? 'active':'' }}">
      <a href="#">
        <i class="fa fa-star"></i> <span>Roles</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{ Request::is('admin/role') ? 'active':'' }}"><a href="{{ url('admin/role') }}"><i class="fa fa-star"></i>Todos los Roles</a></li>
        <li class="{{ Request::is('admin/role/create') ? 'active':'' }}"><a href="{{ url('admin/role/create') }}"><i class="fa fa-plus-circle"></i>Agregar un nuevo Rol</a></li>
      </ul>
    </li>
    @endif

    @if (isGod(\Sentinel::check()->id)) 
    <li class="treeview {{ Request::is('admin/setting*') ? 'active':'' }}">
      <a href="#">
        <i class="fa fa-gears"></i> <span>Configuración</span>
      </a>
      <ul class="treeview-menu">
        <li class="#"><a href="{{ url('admin/binnacle') }}"><i class="fa fa-gear"></i> Historial</a></li>
        <li class="{{ Request::is('admin/role/create') ? 'active':'' }}"><a href="{{ url('admin/role/create') }}"><i class="fa fa-gear"></i> Roles</a></li>
      </ul>
    </li>
    @endif
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>