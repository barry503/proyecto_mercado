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
<?php $nom_section= nom_section("Vista Puesto"); ?>
<?php require'includes/header.php'; ?>



<?php include '../config/fun_permiso.php'; ?>
<?php $name_permiso = retornarNamePermiso(4); ?>
<?php if($_SESSION[$name_permiso]==1){ ?>

  
<!-- Contenedor de todo -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
                <h1 class="container-text"><?php echo $nom_section; ?></h1>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Sistema</a></li>
              <li class="breadcrumb-item active"><?php echo $nom_section; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<!-- seccion del contenido -->
<section class="content">





<!-- inicio card -->
 <div class="card">
              <div class="card-header"> <!-- inicio card-header-->
                 <h3 class="card-title">Puesto  

                  </h3>
              
              </div><!-- / fin card-header-->
 
          
      <!-- inicio card-body  -->
     <div class="card-body" >



      
      <div class="box-tools pull-right">  
        <!-- nose si es necesario en esta version -->
      </div>
       
        <!-- inicio panel-body o cuerpo de tabla -->
        <div class="panel-body table-responsive" id="listadoregistros">
              <!-- inicio tabla -->
          <table id="tbllistado" class=" table table-striped table-bordered  table-condensed table-hover" >
              <thead >
                <th>idpuesto</th>
                <th>modulo</th>
                <th>medida_frente</th>
                <th>medida_fondo</th>
                <th>medida_calificacion</th>
                <th>estado</th>
                <th>medida_compensa</th>
                <th>name_institucion</th>
                <th>name_sector</th>
                <!-- <th>acciones</th> -->
              </thead>  
                    <tbody>
                        <!-- datos de bd en  js-->
                    </tbody>
              <tfoot >
               <th>idpuesto</th>
               <th>modulo</th>
               <th>medida_frente</th>
               <th>medida_fondo</th>
               <th>medida_calificacion</th>
               <th>estado</th>
               <th>medida_compensa</th>
               <th>name_institucion</th>
               <th>name_sector</th>
               <!-- <th>acciones</th> -->
              </tfoot>
          </table>
          <!-- / fin tabla -->

        </div>
       



     </div> <!-- / card body fin -->


<br><br><br>

 </div>  <!-- / fin card  -->


</section>
  <!--fin de  seccion del contenido -->


</div>
<!-- fin  Contenedor de todo -->




 <?php
  }
 else {
  // require '';
  header("Location: noacceso.php");

 }
  ?>
 
<!-- pie de pajina -->
  <?php require'includes/footer.php'; ?>
  
<script> var urlistar= 'listarVista';</script>
<!-- script del crud -->
<script  src="scripts/script_puesto.js"></script>

 

<?php
 } 
ob_end_flush();
 ?>