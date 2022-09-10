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
<?php $nom_section= nom_section("Administracion mercados"); ?>
<?php require'includes/header.php'; ?>


<?php include '../config/fun_permiso.php'; ?>
<?php $name_permiso = retornarNamePermiso(1); ?>
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
 <div class="container bg-light" >
   <div class="main-content">
     <div class="section__content section__content--p30">
       <div class="container-fluid">
         <div class="row">
           <div class="col-md-6">
             <h1> Puestos </h1>
             <div class="alert alert-warning" role="alert">
               <h4 class="alert-heading">agregar un nuevo puesto!</h4><br>
                  <p>
                    <button type="button" class="btn btn-warning btn-lg btn-block" id="puesto">
                        <i class="fa  fa-puzzle-piece"></i> Agregar un nuevo  puesto
                     </button><br>
                   En este formulario puedes agregar mas puestos.</p>
                  <hr>
                  <p class="mb-0">Aqui puedes agregar los puestos.</p>
             </div>
           </div>
           <div class="col-md-6 ">
             <h1>sectores</h1>
             <div class="alert alert-info" role="alert">
               <h4 class="alert-heading">agregar un nuevo sector!</h4><br>
                  <p>
                    <button type="button" class="btn btn-info btn-lg btn-block" id="sector">
                        <i class="fa fa-sitemap"></i> Agregar un nuevo sector
                    </button><br>

                  En este formulario puedes agregar mas sectores.</p>
                  <hr>
                  <p class="mb-0">Aqui puedes agregar los sectores.</p>
             </div>
           </div>
           <div class="col-md-12 py-5">
             <h1 class="text-center">Tablas de los puestos y los sectores</h1>
           </div>
           <div class="col-md-12">
            
                 <!-- inicio tabla -->
             <table id="tbllistadoPuestos" class=" table table-striped table-bordered  table-condensed table-hover" >
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
                   <th>acciones</th>
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
                  <th>acciones</th>
                 </tfoot>
             </table>
             <!-- / fin tabla -->
           </div>
           <div class="col-md-12">

                 <!-- inicio tabla -->
             <!-- <table id="tbllistadoSectores" class=" table table-striped table-bordered  table-condensed table-hover" >
                 <thead >
                   <th>id</th>
                   <th>nombre sector</th>
                   <th>nombre Institucion</th>
                 </thead>  
                       <tbody>
                           
                       </tbody>
                 <tfoot >
                  <th>id</th>
                  <th>nombre sector</th>
                  <th>nombre Institucion</th>
                 </tfoot>
             </table> -->
             <!-- / fin tabla -->
                         

           </div>
         </div>
       </div>
     </div>
   </div>
 </div>


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

<!-- script del crud -->
<script  src="scripts/script_mercados.js"></script>


  

<?php
 } 
ob_end_flush();
 ?>

