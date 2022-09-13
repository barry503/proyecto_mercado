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
                        <?php include 'includes/menu_fun.php';#metodo para validacion de secciones ?>
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
                        <?php include "includes/contenido_menu.php";#contenido de los menus ?>
                         
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