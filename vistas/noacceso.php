<?php 
// Activamos el almacenamiento en el buffer
ob_start();
session_start();
?>
<?php include '../config/fun_section.php'; ?>
<?php $nom_section= nom_section("404 Pagina bloqueada"); ?>

<!-- cabezera -->
<?php require'includes/header.php'; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br><br> 
     <div class="container">
    <div class="row">
      <div class=" text-center col-lg-12 col-lg-offset-3 p404 centered">
        <img src="../files/images-login/404.png" alt="">
        <h1>DON'T PANIC!!</h1>
        <h3>No tienes acceso a esta pagina .</h3>
        <br>
        
        <h5 class="mt">Atento!?, si quieres tener acceso a la pagina comunicate con el administrador:</h5>
        <p>
          <a href="inicio.php">Volver a inicio</a> 
          | 
          <!-- <a href="mailto:<?php echo $correo; ?>">Enviar un correo</a>  -->
        </p>
      </div>
    </div>
  </div>


<br><br><br><br><br> 
  </div>
  <!-- /.content-wrapper -->

 
<!-- pie de pajina -->
  <?php require'includes/footer.php'; ?>


<?php 
ob_end_flush();
 ?>