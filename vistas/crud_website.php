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
<?php $nom_section= nom_section("Crud Informacion del Sitio web"); ?>
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
          
              <h1 class="container-text">Crud Informacion del Sitio web</h1>

        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Sistema</a></li>
            <li class="breadcrumb-item active">Informacion Institucion</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- seccion del contenido -->
<section class="content">
 <div class="container bg-light" >
  <div class="row">
    <div class="col text-center mt-5">
      <!-- poner imagen de su perfil -->
      <div id="cargando_img"><img class="imgILogo" width="250px" style="border-radius: 50px;" src="../files/logo/<?php echo dataImgUrl("logo"); ?>"></div>
        <div class="row form-group">
            <div class="col-12 ">
              <label for="imagefile" class=" form-control-label">Cambiar logo de la Empresa </label>
              <!-- <input type="file" id="file-input" name="imagefile" id="imagefile" onchange="actualizar_image();" class="btn btn-lg btn-outline-secondary form-control-file text-center"> -->

              <input  title="la img  se actualizara automaticamente cuando ingreses la nueva imagen si los cambios no se efectuan cierra la session y vuelve a ingresar" class='form-control btn btn-outline-secondary' data-buttonText="cambiar logoo" type="file" name="imagefile" id="imagefile" onchange="actualizar_image();" >

            </div>
        </div>
    </div>
    <div class="col text-center mt-5">
      <!-- poner imagen de su perfil -->
      <div id="cargando_background"><img class="imgILogo" width="" style="border-radius: 50px;" src="../files/logo/<?php echo dataImgUrl("background"); ?>"></div>
        <div class="row form-group">
            <div class="col-12 ">
              <label for="imagefilea" class=" form-control-label">Cambiar background de la Empresa </label>
              <!-- <input type="file" id="file-input" name="imagefilea" id="imagefilea" onchange="actualizar_image();" class="btn btn-lg btn-outline-secondary form-control-file text-center"> -->

              <input  title="la img  se actualizara automaticamente cuando ingreses la nueva imagen si los cambios no se efectuan cierra la session y vuelve a ingresar" class='form-control btn btn-outline-secondary' data-buttonText="cambiar logoo" type="file" name="imagefilea" id="imagefilea" onchange="actualizar_background();" >

            </div>
        </div>
    </div>

        <div class="col text-center mt-5">
      <!-- poner imagen de su perfil -->
      <div id="cargando_historia"><img class="imgILogo" width="" style="border-radius: 50px;" src="../files/logo/<?php echo dataImgUrl("historia"); ?>"></div>
        <div class="row form-group">
            <div class="col-12 ">
              <label for="imagefilee" class=" form-control-label">Cambiar imagen de reseña historica de la Empresa </label>
              <!-- <input type="file" id="file-input" name="imagefile" id="imagefile" onchange="actualizar_image();" class="btn btn-lg btn-outline-secondary form-control-file text-center"> -->

              <input  title="la img se actualizara automaticamente cuando ingreses la nueva imagen si los cambios no se efectuan cierra la session y vuelve a ingresar" class='form-control btn btn-outline-secondary' data-buttonText="cambiar logoo" type="file" name="imagefilee" id="imagefilee" onchange="actualizar_historia();" >

            </div>
        </div>
    </div>    
  </div>
 </div>

<!-- <div class="text-center"><i class="fas fa-shopping-basket text-info" style="font-size: 500px;"></i></div> -->
<!-- inicio card -->
 <div class="card">
              <div class="card-header"> <!-- inicio card-header-->
                 <h3 class="card-title"><!-- Informacion Empresa -->  
                  <button class="btn btn-lg btn-dark" id="btnagregar" onclick="mostrarform(true)" >
                    
                    <i class="fa fa-plus-circle"></i>Agregar nueva seccion
                  
                  </button>
                  </h3>
              
              </div><!-- / fin card-header-->
 

      <!-- inicio card-body  -->
     <div class="card-body" >

      
      <div class="box-tools pull-right">  
        <!-- botones para imprimir -->
      </div>
       
        <!-- inicio panel-body o cuerpo de tabla -->
        <div class="panel-body table-responsive" id="listadoregistros">
              <!-- inicio tabla -->
          <table id="tbllistado" class=" table table-striped table-bordered  table-condensed table-hover" >
              <thead >
                <th>id</th>
                <th>nombre seccion</th>
                <th>contenido publico</th>
                <th>descripcion</th>
                <th>estado</th>
                <th>fecha de creacion</th>
              </thead>  
                    <tbody>
                        <!-- datos de bd en el archivo url: scripts/Informacion Empresa.js -->
                    </tbody>

              <tfoot >
                <th>id</th>
                <th>nombre seccion</th>
                <th>contenido publico</th>
                <th>descripcion</th>
                <th>estado</th>
                <th>fecha de creacion</th>
              </tfoot>


          </table>
          <!-- / fin tabla -->

        </div>
       



       <!-- inicio panel-body -->
       <div class="panel-body"  id="formularioregistros">
            <!--inicio del formulario de registrar y editar -->
            <form name="formulario" id="formulario" method="POST">
    
                

     <div class="row mb-2">
            <div class="col-md-6 text-muted">
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <!-- para trabajar con el id -->
                <input type="hidden" name="id" id="id">
                <label>Nombre de la seccion(*):</label>
                <p>Procura escribir una sola palabra la keyword</p>
                <!-- <input > -->
                <input name="nom_section" id="nom_section"  class="form-control nom_section" placeholder="palabra">
             </div>
           </div>

            <div class="col-md-6 text-muted">
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                
                <label>Contenido publico(*):</label>
                <input name="public_data" id="public_data"  class="form-control public_data" placeholder="Contenido que se visualiza en pantalla">
             </div>
           </div>

            <div class="col-md-6 text-muted">
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                
                <label>Descripcion del contenido(*):</label>
                <input name="des_section" id="des_section"  class="form-control des_section" placeholder="breve descripcion del contenido">
             </div>
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
 
<?php require'includes/footer.php'; ?>
<script  src="scripts/script_website.js"></script>
<script  src="scripts/script_logo.js"></script>

<?php
 } 
ob_end_flush();
 ?>