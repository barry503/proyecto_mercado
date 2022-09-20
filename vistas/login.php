<?php 
// Activamos el almacenamiento en el buffer
ob_start();
session_start();  /*Con php*/

// si existe un usuario
if(isset($_SESSION["usuario"]) > 0){
header("Location: inicio.php");
}else{
 ?>
 <?php
 include '../config/pdo.php';#conexion pdo
 include '../config/fun_info.php';#para info de la empresa 
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive sistema mercado">
    <meta name="author" content="barry503 Luis Turcios">

    <link rel="shortcut icon" href="../files/logo/<?php echo dataImgUrl('logo'); ?>">

    <title>Login | <?php echo dataEmpresa("nombre"); ?></title>


    <!-- Bootstrap core CSS -->
    <link href="../public/style-login/bootstrap.min.css" rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> -->
    <link rel="stylesheet" type="text/css" href="../public/style-login/all.css">
    <!-- Materialdesign icons css -->
    <link href="../public/style-login/materialdesignicons.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../public/style-login/style.css" rel="stylesheet">

</head>

<body>


    <section class="log-in section" style="background: url(../files/logo/<?php echo dataImgUrl('background'); ?>) center;">
        <div class="container">
            <div class="py-5 log-content ">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="p-5 text-center">
                            <img  src="../files/logo/<?php echo dataImgUrl('logo'); ?>" width="180px">
                            <h2>Login | <?php echo dataEmpresa("nombre"); ?></h2>
                        <h5>"Bienvenido al sistema "</h5>
                        </div>
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center p-5">
                            <h3 class="text-uppercase">Login Usuario</h3>
                            <p class="text-muted">Bienvenido ! Ingresa con tu cuenta</p>

                            <form class="login-form mt-4" method="post" id="frmAcceso">
                                <div class="col-md-12">
                                    <div class="position-relative">
                                        <input type="text" class="form-control rounded-pill"  placeholder="Escribe tu Usuario" id="logina" name="logina"  >
                                        <div class="login-icon position-absolute top-50 translate-middle-y">
                                            <i class="mdi mdi-account ps-3 f-20"></i>
                                        </div>
                                        <div class="valid-feedback">
                                            ingresa tu usuario!
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-4">
                                    <div class="position-relative">
                                        <input type="password" class="form-control rounded-pill" placeholder="Contraseña" id="clavea" name="clavea"    >
                                        <div class="login-icon position-absolute top-50 translate-middle-y">
                                            <i class="mdi mdi-lock ps-3 f-20 iconoClave"></i>
                                        </div>
                                        <div class="invalid-feedback">
                                           agregar contraseña.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div class="d-flex justify-content-between">
                                        <div class="text-start">
                                            <input type="checkbox" value="lsRememberMe" id="rememberMe"> <label for="rememberMe" class="text-muted f-14">Recordarme</label>
                                            <div class="invalid-feedback">
                                                acepto terminos y condiciones!
                                            </div>
                                        </div>

                                        <div class="forget-pass ">
                                            <a href="restaurar_usuario.php" class="f-14 text-danger">Olvido su Contraseña ?</a>
                                        </div>
                                    </div>
                                   
                                </div>
                               
                                <button type="submit" class="btn btn-primary w-100 mt-4">Iniciar Session <i
                                        class="mdi mdi-telegram ms-2"></i></button>
                            </form>
                            <p class=" mb-0 fw-bold text-muted py-3 m-3"><a href="signin.php">Registrate Ahora !</a> </p>
                            <a href="terminos.php" class="f-14 text-primary">Leer Terminos y condiciones</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- bootstrap -->
    <script src="../public/script-login/bootstrap.bundle.min.js"></script>
    <!-- jquery -->
    <script src="../public/t/jQuery-3.3.1/jquery-3.3.1.min.js"></script>
    <!-- lib de alertas -->
    <script  src="../public/libs_alerts/sweetalert2/sweetalert2@9.js"></script>
    <!-- login  -->
    <script src="scripts/login_usuario.js"></script>
    <!-- nuevo  -->
    <!-- <script src="scripts/registrar_usuario.js"></script> -->
    <!-- forgot password  -->
    <!-- <script src="scripts/restaurar_usuario.js"></script> -->

    <script>
        // logica para el ojo de la pass
          var valuer = 0;

        $('.iconoClave').on('click', function(e) {
          if (valuer == 0) {
            $('.iconoClave').removeClass('mdi-lock');
            $('.iconoClave').addClass('mdi-eye');
            valuer = 1;
            // console.log(valuer);
            $("#clavea").attr("type", "text");
                }else{

          $('.iconoClave').removeClass('mdi-eye');
          $('.iconoClave').addClass('mdi-lock');
          valuer = 0;
          // console.log(valuer);
          $("#clavea").attr("type", "password");
                }
        })
    </script>
    
<!--
/***********************************
*version: 1                        *
*fecha: 02-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/ -->

</body>

</html>
<?php }
ob_end_flush(); #limpiamos el buffer
 ?>