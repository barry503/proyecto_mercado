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

    <!-- Fontfaces CSS-->
    <link href="../public/css/font-face.css" rel="stylesheet" media="all">
    <link href="../public/libs/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../public/libs/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../public/libs/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../public/libs/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../public/libs/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../public/libs/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../public/libs/wow/animate.css" rel="stylesheet" media="all">
    <link href="../public/libs/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../public/libs/slick/slick.css" rel="stylesheet" media="all">
    <link href="../public/libs/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../public/libs/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../public/css/theme.css" rel="stylesheet" media="all">
    <!-- dataTable CSS-->
    <link href="../public/t/datatables.min.css" rel="stylesheet" media="all">

    <!-- para usar el select con datos live -->
    <link rel="stylesheet" type="text/css" href="../public/bootstrap-select/css/bootstrap-select.min.css">

</head>

<body class="animsition">
    

    <div class="page-wrapper">
        <!-- HEADER MOBILE Android-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar bg-dark">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="#" >
                            <img src="../files/logo/<?php echo dataImgUrl("logo"); ?>" width="80px" alt="Cool Admin" class="img_refresh-logo" />
                            <?php echo dataEmpresa("abreviatura"); ?>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- clase navbar-mobile -->
            <?php include "includes/navbar-mobile.php" ?>
        </header>
        <!-- END HEADER MOBILE Android-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="../files/logo/<?php echo dataImgUrl("logo"); ?>" width="90px" alt="Cool Admin" class="img_refresh-logo" />
                    <?php echo dataEmpresa("abreviatura"); ?>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">

                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: none;">
                                <li>
                                    <a href="inicio.php">
                                        <i class="fas fa-home"></i>Inicio</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class=" has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas  fa-code"></i>Administracion
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <?php include 'includes/menu_fun.php';#metodo para validacion de secciones ?>
                            <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: none;">
                                <li>
                                    <?php $menu_permiso = menu_fun(1); ?>
                                    <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                                        <a href="crud_website.php">
                                        <i class="fa fa-building"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                                        </a>
                                    <?php endif; ?>
                                    <?php $menu_permiso = menu_fun(2); ?>
                                    <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                                        <a href="crud_permiso.php">
                                        <i class="far fa-check-square"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                                        </a>
                                    <?php endif; ?>

                                    <?php $menu_permiso = menu_fun(3); ?>
                                    <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                                        <a href="crud_usuario.php">
                                        <i class="fas fa-users"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                                        </a>
                                    <?php endif; ?>

                                    <?php $menu_permiso = menu_fun(7); ?>
                                    <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                                        <a href="crud_sectores.php">
                                        <i class="fas fa-shopping-cart"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                                        </a>
                                    <?php endif; ?>
                                    
                                </li>
                            </ul>
                        </li>


                        <li class=" has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas  fa-refresh"></i>Procesos
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>

                            <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: none;">
                                <li>
                                    <?php $menu_permiso = menu_fun(4); ?>
                                    <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                                        <a href="view_puesto.php">
                                            <i class="fas fa-puzzle-piece"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                                        </a>
                                    <?php endif; ?>
                                    <?php $menu_permiso = menu_fun(5); ?>
                                    <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                                        <a href="view_permiso.php">
                                        <i class="far fa-check-square"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                                        </a>
                                    <?php endif; ?>

                                    <?php $menu_permiso = menu_fun(6); ?>
                                    <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                                        <a href="view_usuario.php">
                                        <i class="fas fa-users"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                                        </a>
                                    <?php endif; ?>

                                    <?php $menu_permiso = menu_fun(8); ?>
                                    <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                                        <a href="view_sectores.php">
                                        <i class="fas fa-shopping-cart"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                                        </a>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </li>
                         


<!-- fa-shopping-cart
                         <li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li> -->
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

<!-- HEADER DESKTOP-->
            
            <?php include "includes/header-desktop.php" ?>
            <!-- HEADER DESKTOP-->