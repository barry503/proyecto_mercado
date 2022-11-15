<?php if(strlen(session_id()) < 1)
session_start();
?>
<?php include '../config/conexion.php'; ?>

<?php
include '../config/pdo.php';#conexion pdo
include '../config/fun_info.php';#para info de la empresa 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="au theme template">
  <meta name="author" content="barry503 Luis Turcios">
  <meta name="keywords" content="sistema mercado">

  <!-- Title Page-->
  <title><?php echo $nom_section; ?> | <?php echo dataEmpresa("nombre"); ?></title>
  <link rel="shortcut icon" href="../files/logo/<?php echo dataImgUrl("logo"); ?>">

  <!-- Fontfaces CSS-->
<!--     <link href="../public/css/font-face.css" rel="stylesheet" media="all">
    <link href="../public/libs/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../public/libs/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../public/libs/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all"> -->

    <!-- Bootstrap CSS-->
    <link href="../public/libs/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <!-- <link href="../public/libs/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../public/libs/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../public/libs/wow/animate.css" rel="stylesheet" media="all">
    <link href="../public/libs/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../public/libs/slick/slick.css" rel="stylesheet" media="all">
    <link href="../public/libs/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../public/libs/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all"> -->

    <!-- Main CSS-->
    <!-- <link href="../public/css/theme.css" rel="stylesheet" media="all"> -->
    <link rel="stylesheet" type="text/css" href="../public/css/estilos_lte.css">
    
    <!-- datatable with bootstrap 4 CDN-->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.4/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.7/sb-1.3.4/sp-2.0.2/sl-1.4.0/sr-1.1.1/datatables.min.css"/> -->

    <!-- datatable with bootstrap 5 CDN-->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.4/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.7/sb-1.3.4/sp-2.0.2/sl-1.4.0/sr-1.1.1/datatables.min.css"/> -->

    <!-- adminLTE -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome cdn-->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 cdn-->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck cdn-->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap cdn-->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/LTE/dist/css/adminlte.min.css">
    <!-- overlayScrollbars cdn-->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker cdn-->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote cdn-->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/summernote/summernote-bs4.min.css">
    <!-- / adminLTE -->



    <!-- dataTable CSS bootstrap 5 LOCAL-->
    <link href="../public/t/datatables.min.css" rel="stylesheet" media="all">

    <!-- para usar el select con datos live -->
    <link rel="stylesheet" type="text/css" href="../public/bootstrap-select/css/bootstrap-select.min.css">
    <!-- libreria para campos de fecha modernos -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> -->
    <link rel="stylesheet" href="../public/lib_fecha/flatpickr.min.css">
    <!-- tema oscuro -->
    <!-- <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css"> -->
    <link rel="stylesheet" type="text/css" href="../public/lib_fecha/theme.dark.css">

  </head>

  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

      <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <?php include "includes/header-desktop.php";#Navbar ?>
  <?php include 'includes/menu_fun.php';#metodo para validacion de secciones ?>

  <!-- iaqui va el Main Sidebar Container -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../files/logo/<?php echo dataImgUrl('logo'); ?>" alt="L" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo dataEmpresa("abreviatura"); ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['usuario']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="inicio.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inicio</p>
                </a>
              </li>

            </ul>
          </li>

          <!-- aqui el contenido del menu -->
          <?php include "includes/contenido_menu.php";#contenido de los menus ?>


          <!-- <li class="nav-header">MISCELLANEOUS</li> -->

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>