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
<?php $nom_section= nom_section("Crud Usuarios Andriod"); ?>
<?php require'includes/header.php'; ?>



<?php include '../config/fun_permiso.php'; ?>
<?php $name_permiso = retornarNamePermiso(10);#falta modificar ?>
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
                 <h3 class="card-title"> <?php echo $nom_section; ?> 
                  <button class="btn btn-info" id="btnagregar" onclick="mostrarformNew(true)" >
                    
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
          <table id="tbllistado" class=" table table-striped table-bordered  table-condensed table-hover" >
              <thead >
                 <th>email</th>
                 <th>nombre</th>
                 <th>password</th>
                 <th>idinstitucion</th>
                 <th>device_prefix</th>
                 <th>alcance</th>
                 <th>acciones</th>
                 
                            
              </thead>  
                    <tbody>
                        <!-- datos de bd en el archivo url: scripts/sexo.js -->
                    </tbody>

              <tfoot >
                <th>email</th>
                <th>nombre</th>
                <th>password</th>
                <th>idinstitucion</th>
                <th>device_prefix</th>
                <th>alcance</th>
                <th>acciones</th>
              
                            
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
                 <!-- <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> -->
                   <!-- <label>Escribe tu email(*):</label> -->
                <!-- </div> -->
                 <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <!-- para trabajar con el id -->
                   <input type="hidden"  class="form-control" name="email" id="email">
                   <label for="nombre">Escribe tu Nombre(*):</label>
                   <input type="text" class="form-control" name="nombre" id="nombre"  placeholder="Escribe tu nombre " required>
                </div>
                 <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <label for="password">Escribe tu Contraseña(*):</label>
                   <input type="text" class="form-control" name="password" id="password"  placeholder="Escribe tu password " required>
                </div>

                 <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <label for="device_prefix">Escribe tu N° de dispositivo(*):</label>
                   <input type="text" class="form-control" name="device_prefix" id="device_prefix"  placeholder="Escribe tu device_prefix " required>
                </div>

                 <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <label for="alcance">Alcance del usuario(*):</label>
                   <input type="text" class="form-control" name="alcance" id="alcance"  placeholder="Escribe tu alcance " required>
                </div>

                

                
              <!-- </div> -->
               <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 cam-po">
                 <label for="idinstitucion" >Institucion ala que pertenece</label>
                 <select name="idinstitucion" id="idinstitucion"  class="form-control selectpicker" data-live-search="true" ></select>
              </div>
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
<!-- _____________________________________________________________________________________ -->
  <!-- inicio panel-body -->
  <div class="panel-body"  id="formularioregistrosNew">
       <!--inicio del formulario de registrar y editar -->
       <form name="formulario" id="formulario2" method="POST">

           

<div class="row mb-2">
       <!-- <div class="col-md-6 text-muted"> -->
         <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
           <label>Escribe tu email(*):</label>
                <!-- para trabajar con el id -->
           <input type="text"  class="form-control" name="email" id="email" placeholder="escribe tu correo">
        </div>
         <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
           <label for="nombre">Escribe tu Nombre(*):</label>
           <input type="text" class="form-control" name="nombre" id="nombre"  placeholder="Escribe tu nombre " required>
        </div>
         <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
           <label for="password">Escribe tu Contraseña(*):</label>
           <input type="text" class="form-control" name="password" id="password"  placeholder="Escribe tu password " required>
        </div>

         <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
           <label for="device_prefix">Escribe tu N° de dispositivo(*):</label>
           <input type="text" class="form-control" name="device_prefix" id="device_prefix"  placeholder="Escribe tu device_prefix " required>
        </div>

         <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
           <label for="alcance">Alcance del usuario(*):</label>
           <input type="text" class="form-control" name="alcance" id="alcance"  placeholder="Escribe tu alcance " required>
        </div>

        

        
      <!-- </div> -->
       <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 cam-po">
         <label for="idinstitucion" >Institucion ala que pertenece</label>
         <select name="idinstitucion" id="idinstitucion1"  class="form-control selectpicker" data-live-search="true" ></select>
      </div>
</div>







        
        
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
           <button class="btn btn-info " type="submit" id="btnGuardarN">
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
<script  src="scripts/script_androide.js"></script>

 

<?php
 } 
ob_end_flush();
 ?>