<?php 
// Activamos el almacenamiento en el buffer
ob_start();
session_start();

if(!isset($_SESSION["usuario"])){

  header("Location: login.php");
}else
{

 ?>
<?php include '../config/fun_section.php'; ?>
<?php $nom_section= nom_section("Crud usuario"); ?>
<?php require'includes/header.php'; ?>


<?php include '../config/fun_permiso.php'; ?>
<?php $name_permiso = retornarNamePermiso(1); ?>
<?php if($_SESSION[$name_permiso]==1){ ?>

<h1>AQUI VA LA DATA</h1>
 <?php
  }
 else {
  // require '';
  header("Location: noacceso.php");

 }
  ?>
 
<!-- pie de pajina -->
  <?php require'includes/footer.php'; ?>

<!-- script del crud -->
<script  src="scripts/script_mercados.js"></script>

 

<?php
 } 
ob_end_flush();
 ?>