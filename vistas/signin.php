<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive bootstrap landing template">
    <meta name="author" content="Themesdesign">

    <link rel="shortcut icon" href="images/favicon.ico">

    <title>Crear Cuenta | Sistema Mercado</title>


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

    <section class="sign-in section" style="background: url(../files/images-login/signin.png) center;">
        <div class="container">
            <div class="py-5 log-content ">
                <div class="row ">
                    
                    <div class="col-lg-6 offset-lg-1">
                        <div class="text-center p-5">
                            <p class="text-uppercase mb-0 fw-bold text-muted"><a href="login.php">Volver a Login</a> </p>
                            <h3 class="text-uppercase"> Crear Cuenta</h3>
                            <p class="text-muted">Bienvenido ! Crea tu cuenta aqui</p>

                            <form class="login-form mt-4" method="post" id="registrarmee">
                                <div class="col-md-12">
                                    <div class="position-relative">
                                        <input type="text" class="form-control rounded-pill"  placeholder="Escribe tu Usuario" id="usuario" name="usuario"  >
                                        <div class="login-icon position-absolute top-50 translate-middle-y">
                                            <i class="mdi mdi-account ps-3 f-20"></i>
                                        </div>
                                        <div class="valid-feedback">
                                            Agregar Usuario !
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-4">
                                    <div class="position-relative">
                                        <input type="email" class="form-control rounded-pill" id="email" name="email" placeholder="Escribe tu correo" >
                                        <div class="login-icon position-absolute top-50 translate-middle-y">
                                            <i class="mdi mdi-email ps-3 f-20"></i>
                                        </div>
                                        <div class="valid-feedback">
                                            Agregar correo
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-4">
                                    <div class="position-relative">
                                        <input type="password" class="form-control rounded-pill" placeholder="Contraseña" id="clave" name="clave"    >
                                        <div class="login-icon position-absolute top-50 translate-middle-y">
                                            <i class="mdi mdi-lock ps-3 f-20"></i>
                                        </div>
                                        <div class="invalid-feedback">
                                           agregar Contraseña.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div id="resultados_ajax"></div>
                                    <div class="d-flex justify-content-between">
                                        <div class="text-start">
                                            <!-- <input type="checkbox" value="lsRememberMe" id="rememberMe"> <label for="rememberMe" class="text-muted f-14">Remember me</label> -->
                                            <div class="invalid-feedback">
                                                accept condition!
                                            </div>
                                        </div>

                                        <div class="forget-pass ">
                                            <a href="" class="f-14 text-primary">Olvidaste tu contraseña?</a>
                                        </div>
                                    </div>
                                   
                                </div>
                               
                                <button type="submit" class="btn btn-primary w-100 mt-4">Registrarme <i
                                        class="mdi mdi-telegram ms-2"></i></button>
                            </form>
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
    <!-- <script src="scripts/login_usuario.js"></script> -->
    <!-- agregar nuevo usuario  -->
    <script src="scripts/registrar_usuario.js"></script>
    <!-- forgot password  -->
    <!-- <script src="scripts/restaurar_usuario.js"></script> -->


</body>

</html>