
    <!DOCTYPE html>
<html>
    
  <head>
       <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema LicaSoft |</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/LOGOLICA.png')}}">

  </head>
  <body class="hold-transition skin-red-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>LicaSoft</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-inverse" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            

                            <ul class="dropdown-menu" role="menu">
                                
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Cerrar Sesi��n</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                   
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
        
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" >

              
              <img src="{{asset('img/LOGOLICA.png')}}" width="230">
            

            @if (Auth::user()->tipo >= 0)
            <li class="treeview">
              <a href="#">
                <i class="fa fa-heartbeat"></i>
                <span>Traslados</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              @if (Auth::user()->tipo >= 2)
                <li><a href="http://www.licasoft.cl/licasoft/ficha/create"><i class="fa fa-circle-o"></i> Nuevo Ficha</a></li>
                @endif
                @if (Auth::user()->tipo >= 0)
                <li><a href="http://www.licasoft.cl/licasoft/fichaPeticion"><i class="fa fa-circle-o"></i> Peticiones de traslados</a></li>
                @endif
                @if (Auth::user()->tipo >= 1)
                 <li><a href="http://www.licasoft.cl/licasoft/fichaPendiente"><i class="fa fa-circle-o"></i> Traslados en Proceso</a></li>
                 @endif
                 @if (Auth::user()->tipo >= 2)
                 <li><a href="http://www.licasoft.cl/licasoft/ficha"><i class="fa fa-circle-o"></i> Traslados Finalizados</a></li>
                 @endif
              </ul>
            </li>
            @endif
            @if (Auth::user()->tipo>= 2)
            <li class="treeview">
              <a href="#">
                <i class="fa fa-ambulance"></i>
                <span>Movil</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="http://www.licasoft.cl/licasoft/movil"><i class="fa fa-circle-o"></i>Móvil</a></li>
                 <li><a href="http://www.licasoft.cl/licasoft/ambulancias"><i class="fa fa-circle-o"></i> Ambulancias</a></li>
                 <li><a href="http://www.licasoft.cl/licasoft/profesionales"><i class="fa fa-circle-o"></i> Profesionales</a></li>

              </ul>
            </li>
            @endif
            @if (Auth::user()->tipo== 0)
            <li class="treeview">
            <li><a href="http://localhost:8000/licasoft/paciente">
            <i class="fa fa-wheelchair" ></i> Paciente</a></li>
            </li>
            @endif
            @if (Auth::user()->tipo== 0)
            <li class="treeview">
            <li><a href="http://www.licasoft.cl/licasoft/deuda">
            <i class="fa fa-wheelchair" ></i> Deuda</a></li>
            </li>
            @endif
 
           
            @if (Auth::user()->tipo >= 0)
            <li class="treeview">
            <li><a href="http://www.licasoft.cl/licasoft/cotizaciones/create">
            <i class="fa fa-dollar" ></i> Cotización</a></li>
            </li>
            @endif
            
            @if (Auth::user()->tipo== 3)        
            <li class="treeview">
            <li><a href="http://www.licasoft.cl/licasoft/convenios">
            <i class="fa fa-hospital-o" ></i> Convenios</a></li>
            </li>
            @endif
            @if (Auth::user()->tipo>= 2 )
            <li class="treeview">
              <a href="#">
                <i class="fa fa-line-chart"></i>
                <span>Reportes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="http://www.licasoft.cl/licasoft/reportes/"><i class="fa  fa-pie-chart"></i>Reporte 1</a></li>
                 <li><a href="http://www.licasoft.cl/licasoft/reportes/create"><i class="fa  fa-pie-chart"></i> Reporte 2</a></li>

              </ul>
            </li>
            @endif
         
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">LICA-SOFT</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-lg-12">
		                          <!--Contenido-->
                             
                              @yield('contenido')
		                          <!--Fin Contenido-->
                           </div>
                        </div>
		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2015-2020 <a href="www.licasoft.cl">Licasoft</a>.</strong> Todos los derechos reservados.
      </footer>

      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    
  </body>
</html>