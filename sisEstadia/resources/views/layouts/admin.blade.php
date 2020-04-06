<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Nombre en la pestaña-->
    <title>Fisio 360° </title>
    <!-- Termina el nombre de la pestaña-->
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
      <link rel="med" href="{{asset('img/med.png')}}">     
    <link rel="shortcut icon" href="{{asset('img/med.png')}}">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>FISIO</b>V</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>FISIO 360</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
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
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red">Online</small>
                  <span class="hidden-xs">Admin</span>
                </a>

                
                <ul class="dropdown-menu">
                  <!- User image ->
                  <li class="user-header">
                    
                    <p>
                      www.incanatoit.com - Desarrollando Software
                      <small>www.youtube.com/jcarlosad7</small>
                    </p>
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
          <ul class="sidebar-menu">
            <li class="header"></li>          
              <li class="treeview"><!-- creando principal --->
                <a href="{{url('tablero/index')}}"> <!-- creando principal --->
                  <i class="glyphicon glyphicon-home"></i>
                  <span>Principal</span>              
                </a>
              </li><!-- termina princiapl --->
              <li class="treeview"><!-- creando principal --->
                <a href="{{url('tablero/index')}}"> <!-- creando principal --->
                  <i class="glyphicon glyphicon-envelope"></i>
                  <span>Correo</span>              
                </a>
              </li><!-- termina princiapl --->
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-laptop"></i>
                  <span>Mantenimiento</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu"> 
                  <!--PACIENTES Y PROFESIONES-->          
                  <li class="treeview">
                    <a href="#">                  
                      <span class="glyphicon glyphicon-user"></span><span>Pacientes</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="{{url('registro/paciente')}}"><i class="fa fa-circle-o"></i> Pacientes</a></li>            
                        <li><a href="{{url('registro/profesion')}}"><i class="fa fa-circle-o"></i> Ocupación</a></li> 
                    </ul>
                  </li>
                  <!--TERMINA PACIENTE Y FISIOTERAPEUTAS-->

                  <!--FISIOTERAPEUTAS Y ESPECIALIDADES-->
                  <li class="treeview">
                    <a href="#">                  
                      <span class="fa fa-user-md"> Fisioterapeutas</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="{{url('registro/fisioterapeuta')}}"><i class="fa fa-circle-o"></i> Fisioterapeuta</a></li>            
                      <li><a href="{{url('registro/especialidad')}}"><i class="fa fa-circle-o"></i> Especialidades</a></li> 
                    </ul>
                  </li>
                  <!--TERMINA FISIOTERAPEUTAS Y ESPECIALIDADES-->

                  <!--FISIOTERAPEUTAS Y ESPECIALIDADES-->
                  <li class="treeview">
                    <a href="#">                        
                        <span>Horarios</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="{{url('registro/dia')}}"><i class="fa fa-circle-o"></i> Horario</a></li>            
                      <li><a href="{{url('registro/horario')}}"><i class="fa fa-circle-o"></i> Turno</a></li> 
                    </ul>
                  </li>
                  <!--TERMINA FISIOTERAPEUTAS Y ESPECIALIDADES-->


                  <!--FISIOTERAPEUTAS Y ESPECIALIDADES-->
                  <li class="treeview">
                    <a href="#">        
                      <span>Lesiones</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="{{url('registro/ejercicio')}}"><i class="fa fa-circle-o"></i> Ejercicio</a></li>
                      <li><a href="{{url('registro/material')}}"><i class="fa fa-circle-o"></i> Material</a></li>
                      <li><a href="{{url('registro/estudio')}}"><i class="fa fa-circle-o"></i> Estudio</a></li>
                      <li><a href="{{url('registro/lesion')}}"><i class="fa fa-circle-o"></i> Lesión</a></li>
                    </ul>
                  </li>
                  <!--TERMINA FISIOTERAPEUTAS Y ESPECIALIDADES-->                
                </ul>
              </li>

              <!-- CONSULTAS -->
              <li class="treeview">
                <a href="">
                  <i class="fa fa-folder"></i> <span>Evento</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{url('vconsulta/consulta')}}"><i class="fa fa-stethoscope"></i> Consulta</a></li>
                  <li><a href="{{url('vconsulta/cita')}}"><i class="glyphicon glyphicon-calendar"></i> Cita</a></li>
                  <li><a href="{{url('vconsulta/terapia')}}"><i class="glyphicon glyphicon-tasks"></i> Terapia</a></li>
                  <li><a href="{{url('vconsulta/asignar')}}"><i class="fa fa-circle-o"></i> Asignar Terapias</a></li>                
                </ul>
              </li>
              <li class="treeview">
                <a href="">
                  <i class="fa fa-folder"></i> <span>Acceso</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Usuarios</a></li>                  
                </ul>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-plus-square"></i> <span>Reportes</span>
                  <small class="label pull-right bg-red">PDF</small>
                </a>
              </li>
              <li>
                <a href=>
                  <i class="  glyphicon glyphicon-th-list"></i> <span>Gráficas</span>
                  
                </a>
                <ul class="treeview-menu">
                      <li><a href="{{url('graficas/graficaProfesion')}}"><i class="fa fa-circle-o"></i> Profesiones</a></li>
                      <li><a href="{{url('graficas/graficaSexo')}}"><i class="fa fa-circle-o"></i> Sexo Pacientes</a></li>
                      <li><a href="{{url('graficas/sexoFisio')}}"><i class="fa fa-circle-o"></i> Sexo Fisios</a></li>
                      <li><a href="{{url('registro/lesion')}}"><i class="fa fa-circle-o"></i> Lesión</a></li>
                    </ul>
              </li>
              <li>
                <a href="{{url('backup')}}">
                  <i class="glyphicon glyphicon-cloud-download"></i> <span>Respaldo de la BD</span>
                  <small class="label pull-right bg-yellow">IT</small>
                </a>
              </li>                        
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
                  <!--<h3 class="box-title">Sistema de estadia</h3>-->
                  <br>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                              @yield('contenido')
		                          <!--Fin Contenido-->  
                              
                      </div>        
             	      </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
     <!-- <footer class="main-footer">
      <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
      </div>
       <!-
      <strong>Copyright &copy; 2015-2020 <a href="www.incanatoit.com">IncanatoIT</a>.</strong> All rights reserved.
      </footer>




      -->



     

      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    @stack('scrips')
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    <!-- Este es para las graficas esta en public js highcharts -->
    <script src="{{asset('js/highcharts.js')}}"></script>
    <script src="{{asset('js/graficas.js')}}"></script>    
  </body>
</html>
