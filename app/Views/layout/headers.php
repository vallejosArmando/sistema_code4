


<?php 

$session=session();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url()?>/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url()?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/plugins/fontello/css/fontello.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/plugins/fontello/css/animation.css">

  <!-- Theme style -->
</head>
<body class=" sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

 

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
  <!--<nav class="main-header navbar navbar-expand navbar-white navbar-light">-->

    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
     
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown"  href="#" aria-expanded="false" >
        <i class="fas fa-user fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         
         
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url()?>/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                <?php echo $session->usuario ?>
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">  </p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i><?php echo $session->rol ?></p>
              </div>
            </div>
            <!-- Message End -->
          </a> 
          <div class="dropdown-divider"></div>
         <a class="dropdown-item" href="<?php echo base_url(); ?>/usuario/cambiar_password">Camviar contraseña</a>
          <div class="dropdown-divider"></div>
         <a class="dropdown-item" href="<?php echo base_url(); ?>/usuario/logout">Cerrar sesion</a></li>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
 
   
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url()?>/menu"

    class="brand-link">
    <?php foreach($sistem as $sist){ ?>
      <img  class="img-thumbnail" src=" <?= base_url()?>/fotos/<?php echo $sist['logo'];  ?> " alt="" width="60">
      <span class="brand-text font-weight-light" ><?= $sist['nombre'];?></span>
      <?php } ?>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url()?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          			
	
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $session->usuario?>_Rol_<?php echo $session->rol ?></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Menu item
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?php echo base_url()?>/grupo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>/opcion" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Submenu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>/permiso" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permisos</p>
                </a>
              </li>
              
            </ul>
          </li>
        
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Herramientas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?php echo base_url()?>/persona" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Personas</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="<?php echo base_url()?>/usuario" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuario</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>/usurol" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuario Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>/rol" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>/acceso" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Accesos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>/opcion" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Opciones</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>/grupo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grupos</p>
                </a>
              </li>
            
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Parametros
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?php echo base_url()?>/grupo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>/opcion" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Submenu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>/permiso" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permisos</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
               Sistema
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url()?>/sistema" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sistema</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>/area" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Areas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>/jefe_area" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jefe de Areas</p>
                </a>
              </li>
            
              <li class="nav-item">
                <a href="<?php echo base_url()?>/empleado" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Empleados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>/asignacion" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Asignaciones</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>/tipo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipo de Empleados</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="<?php echo base_url()?>/reclamo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reclamos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>/reclamo_conf" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reclamos Confirmados</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Reportes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?php echo base_url()?>/rep_p_usuario" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rep. Presona-Usuario</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>/rep_p_fecha" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rep. Personas-Fechas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>/rep_area_fecha" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rep. Area-fecha</p>
                </a>
              </li>
              
            </ul>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard v2</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    <?php  if (session('mensaje')){?>
<div class="alert alert-danger" role="alert">
  
  <?php echo session('mensaje'); ?>
</div>

<?php } ?>