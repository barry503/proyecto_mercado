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
<?php $name_permiso = retornarNamePermiso(3); ?>
<?php if($_SESSION[$name_permiso]==1){ ?>


  <!-- Contenedor de todo -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              
                  <h1 class="container-text">Crud usuario</h1>

            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Sistema</a></li>
                <li class="breadcrumb-item active">usuario</li>
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
                   <h3 class="card-title">usuario  
                    <button class="btn btn-dark" id="btnagregar" onclick="mostrarform(true)">
                      
                      <i class="fa fa-plus-circle"></i>Agregar
                    
                    </button>
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
            <table id="tbllistado" class="table table-borderless table-striped table-earning   table-bordered  table-condensed table-hover" >
                <thead >
                   <th>ID</th>
                   <th>Usuario</th>
                   <th>Rol</th>
                   <th>Nombre y apellido</th>
                   <th>Institucion</th>
                   <th title="Si esta dentro del sistema">Conexion</th>
                   <th>Telefono</th>
                   <th>Email</th>
                   <th>Imagen</th>
                   <th>Direccion</th>
                   <th>Estado del usuario</th>
                   <th>Acciones</th>
                              
                </thead>  
                      <tbody>
                          <!-- datos de bd en el archivo url: scripts/articulo.js -->
                      </tbody>

                <tfoot >
                   <th>ID</th>
                   <th>Usuario</th>
                   <th title="Si esta dentro del sistema">Conexion</th>
                   <th>Rol</th>
                   <th>Nombre y apellido</th>
                   <th>Institucion</th>
                   <th>Telefono</th>
                   <th>Email</th>
                   <th>Imagen</th>
                   <th>Direccion</th>
                   <th>Estado del usuario</th>
                   <th>Acciones</th>
                              
                </tfoot>


            </table>
            <!-- / fin tabla -->

          </div>
         



         <!-- inicio panel-body -->
         <div class="panel-body"  id="formularioregistros">
              <!--inicio del formulario de registrar y editar -->
              <form name="formulario" id="formulario" method="POST">
      

  <input type="hidden" name="imagenactual" id="imagenactual">
                  <img src="" width="180px" height="150px" id="imagenmuestra">
  <div class="row mb-2">


              <div class="col-md-6 text-muted">
                <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                  <label>Nombre(*):</label>
                       <!-- para trabajar con el id -->
                  <input type="hidden" name="idusuario" id="idusuario">
               
                  <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>

               </div>
             </div>

              <div class="col-md-6 text-muted">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Apellido(*):</label>
                       <input type="text" class="form-control" name="apellido" id="apellido" maxlength="100" placeholder="apellido" required>
              


               </div>
             </div>

  </div>


  <div class="row mb-2">
     <div class=" col-md-6 col-md-6 text-muted">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
               
                  <label>Usuario(*):</label>
                
                
                 <input type="text" class="form-control" id="usuario" name="usuario" maxlength="20"  placeholder="usuario" required>

               </div>
             </div>


   <div class=" col-md-6 col-md-6 text-muted">
              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Clave(*):</label>
                  
                  <input type="password" class="form-control" name="clave" id="clave" maxlength="64" placeholder="clave" required>

               </div>

              </div>


  </div>

  <div class="row mb-2">

              <div class=" col-md-6 col-md-6 text-muted">
              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Email:</label>
                  
                  <input type="email" class="form-control" name="email" id="email" maxlength="50" placeholder="email" >

               </div>

              </div>

              <div class=" col-md-6 col-md-6 text-muted">
              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Telefono:</label>
                  
                  <input type="text" class="form-control" name="telefono" id="telefono" maxlength="20" placeholder="telefono" >

               </div>

              </div>


    
  </div>


  <div class="row mb-2">

     <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 cam-po">
       <label for="idinstitucion" >Institucion ala que pertenece</label>
       <select name="idinstitucion" id="idinstitucion"  class="form-control " data-live-search="true" ><!-- selectpicker --></select>
    </div>
    
     <div class=" col-md-6 col-md-6 text-muted">
              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Direccion:</label>
                  
                  <input type="text" class="form-control" name="direccion" id="direccion"  placeholder="escribe tu direccion" >

               </div>

              </div>

              <div class="col-md-6 text-muted">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Imagen:</label>
                  
                  <input type="file" class="form-control" name="imagen" id="imagen"  placeholder="imagen" >
                  <br>
                  
                 </div> 
          </div>
  </div>

  <div class="row mb-2">

   <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 cam-po">
     <label for="idroles" >Rol del usuario</label>
     <select name="idroles" id="idroles"  class="form-control " data-live-search="true" ><!-- selectpicker --></select>
  </div>
   

  </div>       
               
               
               <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <button class="btn btn-dark " type="submit" id="btnGuardar">
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

<script> let urlistar= 'listar';</script>
<!-- script del crud -->
<script  src="scripts/script_usuario.js"></script>

 

<?php
 } 
ob_end_flush();
 ?>