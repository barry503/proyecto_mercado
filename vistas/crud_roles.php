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
<?php $nom_section= nom_section("Crud Roles"); ?>
<?php require'includes/header.php'; ?>



<?php include '../config/fun_permiso.php'; ?>
<?php $name_permiso = retornarNamePermiso(2); ?>
<?php if($_SESSION[$name_permiso]==1){ ?>

  
<!-- Contenedor de todo -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
                <h1 class="container-text">Crud roles</h1>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Sistema</a></li>
              <li class="breadcrumb-item active">roles</li>
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
                 <h3 class="card-title">roles  
                  <button class="btn btn-info" id="btnagregar" onclick="mostrarform(true)" >
                    
                    <i class="fa fa-plus-circle"></i>Agregar
                  
                  </button>
                  </h3>
                  <h3 class="text-right">
                    <a class="btn btn-lg btn-dark " href="crud_permiso.php"><i class="fas fa fa-check-square"></i> Editar los permisos</a>
                  </h3>
                  <h3 class="mt-3">Agregale permisos a los roles para habilitar los accesso.</h3>
              </div><!-- / fin card-header-->
 
          
      <!-- inicio card-body  -->
     <div class="card-body" >



      
      <div class="box-tools pull-right">  
        <!-- nose si es necesario en esta version -->
      </div>
       
        <!-- inicio panel-body o cuerpo de tabla -->
        <div class="panel-body table-responsive" id="listadoregistros">
              <!-- inicio tabla -->
          <table id="tbllistado" class="table table-borderless table-striped table-earning   table-bordered  table-condensed table-hover" >
              <thead >
                 <th>Opciones</th>
                 <th>id</th>
                 <th>Nombre</th>
                 <th>Estado</th>
                 
                            
              </thead>  
                    <tbody>
                        <!-- datos de bd en el archivo url: scripts/sexo.js -->
                    </tbody>

              <tfoot >
                 <th>Opciones</th>
                 <th>id</th>
                 <th>Nombre</th>
                 <th>Estado</th>
              
               
                            
              </tfoot>


          </table>
          <!-- / fin tabla -->

        </div>
       



       <!-- inicio panel-body -->
       <div class="panel-body"  id="formularioregistros">
            <!--inicio del formulario de registrar y editar -->
            <form name="formulario" id="formulario" method="POST">
    
                

     <div class="row mb-2">
            <!-- <div class="col-md-6 text-muted"> -->
              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Nombre del rol(*):</label>
                     <!-- para trabajar con el id -->
                <input type="hidden" name="idroles" id="idroles">
             
                <input type="text" class="form-control" name="nombre" id="nombre"  placeholder="Escribe el nombre del rol " required>

               

             </div>
           <!-- </div> -->
                          
     </div>
     <div class="card  collapsed-card">
                   <div class="card-header bg-dark text-center ">
                     <h3 class="card-title text-white">Permisos para el rol </h3>

                     <!-- <div class="card-tools">
                       <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                       </button>
                     </div> -->
                     <!-- /.card-tools -->
                   </div>
                   <!-- /.card-header -->
                   <div class="card-body" style="//display: none;">


                     <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                     <label>permisos(*):</label>
                     
                     <ul id="permisos">
                       
                     </ul>
                  </div>

                   </div>
                   <!-- /.card-body -->
                 </div>

    
             
             
             <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button class="btn btn-info " type="submit" id="btnGuardar">
                    <i class="fa fa-save"></i> Guardar
                </button>

                <button class="btn btn-danger"  onclick="cancelarform()" type="button">
                    <i class="fa fa-arrow-circle-left"></i> Cancelar
                </button>



                </div>
            </form>

       </div><!-- fin panel-body -->

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

<script> var urlistar= 'listar';</script> 
<!-- script del crud -->
<script  src="scripts/script_roles.js"></script>


<?php
 } 
ob_end_flush();
 ?>