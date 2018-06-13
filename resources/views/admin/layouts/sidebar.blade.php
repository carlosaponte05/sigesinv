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
    @if (\Sentinel::getRoles(['user.view'])) 
    <li class="treeview {{ Request::is('admin/user*') ? 'active':'' }}">
      <a href="#">
        <i class="fa fa-users"></i> <span>Usuarios</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
         @if (\Sentinel::getRoles(['user.view'])) 
          <li class="{{ Request::is('admin/user') ? 'active':'' }}"><a href="{{ url('admin/user') }}"><i class="fa fa-users"></i>Listar</a></li>
         @endif 

         @if (\Sentinel::getRoles(['user.create'])) 
          <li class="{{ Request::is('admin/user/create') ? 'active':'' }}"><a href="{{ url('admin/user/create') }}"><i class="fa fa-user-plus"></i>Agregar Nuevo Usuario</a></li>
         @endif 
        <li class="{{ Request::is('admin/user/profile') ? 'active':'' }}"><a href="{{ url('admin/user/'.\Sentinel::check()->id.'/profile') }}"><i class="fa fa-user-circle-o"></i>Tu Perfil</a></li>
      </ul>
    </li>
     @endif 

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