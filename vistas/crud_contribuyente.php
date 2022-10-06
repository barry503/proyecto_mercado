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
<?php $nom_section= nom_section("Crud Contribuyente"); ?>
<?php require'includes/header.php'; ?>



<?php include '../config/fun_permiso.php'; ?>
<?php $name_permiso = retornarNamePermiso(21); ?>
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
                 <h3 class="card-title">Sector  
                  <button class="btn btn-info" id="btnagregar" onclick="mostrarform(true)" >
                    
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
          <table id="tbllistado" class="table display nowrap dataTable dtr-inline collapsed table-borderless table-striped table-bordered table-condensed table-hover" ><!-- table-earning = clase que causa pointer-->
            <div class="box-tools pull-right"></div>
              <thead class="bg-dark text-white">
                 <th>id</th>
                 <th>dui</th>
                 <th>nit</th>
                 <th>apellidos</th>
                 <th>nombres</th>
                 <th>codigo_cta</th>
                 <th>direccion</th>
                 <th title="telefono">tel 1</th>
                 <th title="telefono">tel 2</th>
                 <th>institucion</th>
                 <th>municipio</th>
                 <th>acciones</th>
                 
                            
              </thead>  
                    <tbody>
                        <!-- DATA width dataTable  -->
                    </tbody>
          </table>
          <!-- / fin tabla -->

        </div>
       



       <!-- inicio panel-body -->
       <div class="panel-body"  id="formularioregistros">
            <!--inicio del formulario de registrar y editar -->
            <form name="formulario" id="formulario" method="POST">

              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active show" id="datos-tab" data-toggle="tab" href="#datos" role="tab" aria-controls="datos" aria-selected="false">Datos Personales</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Menu 1</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">Menu 2</a>
                </li>
              </ul>
              <div class="tab-content pl-3 p-1" id="myTabContent">
                <div class="tab-pane fade active show" id="datos" role="tabpanel" aria-labelledby="datos-tab">
                  <h3>Datos Personales del Contribuyente</h3>
                  <div class="row mb-2">

                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <label>Documento de identificacion personal:</label>
                                  <!-- para trabajar con el id -->
                             <input type="hidden" name="id" id="id">

                             <div class="input-group">
                             <div class="input-group-addon">
                             *<b>DUI</b>
                             </div>
                             <input type="text" class="form-control" name="dui" id="dui"  placeholder="Escribe el dui del Contribuyente " required>
                             </div>
                          
                             
                          </div>

                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <label>Documento de identificacion tributaria:</label>
                             <div class="input-group">
                             <div class="input-group-addon">
                             *<b>NIT</b>
                             </div>
                             <input type="text" class="form-control" name="nit" id="nit"  placeholder="Escribe el nit del Contribuyente " required> 
                             </div>

                          </div>

                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <label>Nombre del contribuyente:</label>
                             <div class="input-group">
                             <div class="input-group-addon">
                             *<b>NIT</b>
                             </div>
                             <input type="text" class="form-control" name="nit" id="nit"  placeholder="Escribe el nit del Contribuyente " required> 
                             </div>

                          </div>

                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <label>Documento de identificacion tributaria:</label>
                             <div class="input-group">
                             <div class="input-group-addon">
                             *<b>NIT</b>
                             </div>
                             <input type="text" class="form-control" name="nit" id="nit"  placeholder="Escribe el nit del Contribuyente " required> 
                             </div>

                          </div>



                          



                         <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 cam-por">
                           <label for="institucion_id_fk" >Institucion ala que pertenece</label>
                           <select name="institucion_id_fk" id="institucion_id_fk"  class="form-control " data-live-search="true" required><!-- selectpicker --></select>
                        </div>

                         <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 cam-por">
                           <label for="municipio_id_fk" >Municipio al que pertenece</label>
                           <select name="municipio_id_fk" id="municipio_id_fk"  class="form-control " data-live-search="true" required><!-- selectpicker --></select>
                        </div>

                        

                  </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <h3>Menu 1</h3>
                  <p>Some content here.</p>
                </div>
                <div class="tab-pane fade " id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  <h3>Menu 2</h3>
                  <p>Some content here.</p>
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
<script  src="scripts/script_contribuyente.js"></script>

 

<?php
 } 
ob_end_flush();
 ?>