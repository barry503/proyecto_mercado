<!-- aqui ava  el Navbar -->
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link"><i class="fas fa-barcode"></i>link surdo</a>
      </li> -->

    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- resumen de usuario -->
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          <img class="user-image img-circle elevation-2 IMAGEN_ACTUALIZADA"  src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" alt="U" />
          <!-- <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg" > -->
          <span class="d-none d-md-inline"><?php echo $_SESSION['usuario']; ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <!-- User image -->
          <li class="user-header bg-orange">
            <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="IMAGEN_ACTUALIZADA img-circle elevation-2" alt="U">
            <!-- <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->

            <p>
              <?php echo $_SESSION['nombre']; ?> - <?php echo $_SESSION['apellido']; ?>
              <small><span class="email"><?php echo $_SESSION['email']; ?></span></small>
            </p>
          </li>
          <!-- Menu Body -->
          <li class="user-body">
            <div class="row">
              <div class="col-6 text-center">
                <a href="configuracion_user.php">Configuración</a>
              </div>
              <div class="col-6 text-center">
                <a href="#">Billetera</a>
              </div>
            </div>
            <!-- /.row -->
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="cuenta_user.php" class="btn btn-default btn-flat">Perfil</a>
            <a onclick="FCerrandOSecion()"  class="btn btn-default btn-flat float-right"> <i class="fa  fa-power-off"></i> Salir</a>
            <input type="hidden" name="usuario0salirXD" value="<?php echo $_SESSION['nombre'].' - '.$_SESSION['apellido']; ?>">
            <input type="hidden" name="ImgSalirXD" value="<?php echo $_SESSION['imagen']; ?>">
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
<!-- /.navbar -->