<header class="main-header">
  <!-- Logo -->
  <a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>SG</b>INV</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>SIGES</b>INV</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Barra de Navegación</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        {{-- <!-- Messages: style can be found in dropdown.less-->
        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success">4</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">Tienes 4 Mensajes</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <li><!-- start message -->
                  <a href="#">
                    <div class="pull-left">
                      <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                      Equipo de Soporte
                      <small><i class="fa fa-clock-o"></i> 5 mins</small>
                    </h4>
                    <p></p>
                  </a>
                </li>
                <!-- end message -->
                <li>
                  <a href="#">
                    <div class="pull-left">
                      <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                      Equipo Diseño Chago
                      <small><i class="fa fa-clock-o"></i> 2 hours</small>
                    </h4>
                    <p></p>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="pull-left">
                      <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                      Desarrolladores
                      <small><i class="fa fa-clock-o"></i> Hoy</small>
                    </h4>
                    <p></p>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="pull-left">
                      <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                      Departamento de Ventas
                      <small><i class="fa fa-clock-o"></i> Ayer</small>
                    </h4>
                    <p></p>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="pull-left">
                      <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                      Revistas
                      <small><i class="fa fa-clock-o"></i> 2 days</small>
                    </h4>
                    <p></p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="footer"><a href="#">Ver todos los mensajes</a></li>
          </ul>
        </li>
        <!-- Notifications: style can be found in dropdown.less -->
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">10</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">Tienes 10 notificaciones</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <li>
                  <a href="#">
                    <i class="fa fa-users text-aqua"></i> 5 nuevos miembros hoy
                  </a>
                </li>
               
              </ul>
            </li>
            <li class="footer"><a href="#">Ver Todos</a></li>
          </ul>
        </li>
        <!-- Tasks: style can be found in dropdown.less -->
        <li class="dropdown tasks-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-flag-o"></i>
            <span class="label label-danger">9</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header"></li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <li><!-- Task item -->
                  <a href="#">
                    <h3>
                      Diseño
                      <small class="pull-right">20%</small>
                    </h3>
                    <div class="progress xs">
                      <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">20% Complete</span>
                      </div>
                    </div>
                  </a>
                </li>
                <!-- end task item -->
                
                
                <!-- end task item -->
              </ul>
            </li>
            <li class="footer">
              <a href="#">Ver todo</a>
            </li>
          </ul>
        </li> --}}
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href=" " class="dropdown-toggle" data-toggle="dropdown">
            <img src="https://lh3.googleusercontent.com/-9xk2RepQ-ik/WEAICgtSI8I/AAAAAAAAAHk/uXTp7pdeiFMvMPnLbKL9wd3orY7bc_8XwCLcB/s328-no/PP.png" class="user-image" alt="User Image">
            <span class="hidden-xs">{{\Sentinel::check()->first_name}}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="{{ asset('AdminLTE-2.3.11/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
              <p>
              {{\Sentinel::check()->first_name}}  
                <small></small>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="row">
                <div class="col-xs-4 text-center">
                  <a href="#">Seguidores</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Ventas</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Amigos</a>
                </div>
              </div>
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="{{ url('admin/user/'.\Sentinel::check()->id.'/profile') }}" class="btn btn-default btn-flat">Perfil</a>
              </div>
              <div class="pull-right">
                <a href="{{ url('admin/logout') }}" class="btn btn-default btn-flat">Salir</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>