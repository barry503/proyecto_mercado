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
<?php $nom_section= nom_section("Crud Puesto"); ?>
<?php require'includes/header.php'; ?>



<?php include '../config/fun_permiso.php'; ?>
<?php $name_permiso = retornarNamePermiso(9); ?>
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
                  <button class="btn btn-dark" id="btnagregar" onclick="mostrarform(true)" >
                    <i class="fa fa-plus-circle"></i>Agregar
                  </button>
                  </h3>
                  <h3 class="text-right">
                    <button class="btn btn-warning" id="btnagregar_muchos" onclick="mostrarformMas(true)" >
                      <i class="fa fa-th"></i> Agregar varios con las mismas medidas
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
<!--                <th>idpuesto</th>
               <th>modulo</th>
               <th>medida_frente</th>
               <th>medida_fondo</th>
               <th>medida_calificacion</th>
               <th>estado</th>
               <th>medida_compensa</th>
               <th>name_institucion</th>
               <th>name_sector</th>
               <th>acciones</th> -->
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
                <label>modulo(*):</label>
                     <!-- para trabajar con el id -->
                <input type="hidden" class="form-control " name="idpuesto" id="idpuesto" >
             
                <input type="text" class="form-control" name="modulo" id="modulo"  placeholder="Escribe el modulo del Puesto " required>
             </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>medida_frente(*):</label>
                <input type="text" class="form-control" name="medida_frente" id="medida_frente"  placeholder="Escribe la medida_frente del Puesto " required>
             </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>medida_fondo(*):</label>
                <input type="text" class="form-control" name="medida_fondo" id="medida_fondo"  placeholder="Escribe la medida_fondo del Puesto " required>
             </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>medida_calificacion(*):</label>
                <input type="text" class="form-control" name="medida_calificacion" id="medida_calificacion"  placeholder="Escribe la medida_calificacion del Puesto " required>
             </div>
             
              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>medida_compensa(*):</label>
                <input type="text" class="form-control" name="medida_compensa" id="medida_compensa"  placeholder="Escribe la medida_compensa del Puesto " required>
             </div>

            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 cam-po">
              <label for="idsector" >sector al que pertenece</label>
              <select name="idsector" id="idsector"  class="form-control " data-live-search="true" ><!-- selectpicker --></select>
           </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 cam-po">
              <label for="idinstitucion" >institucion al que pertenece</label>
              <select name="idinstitucion" id="idinstitucion"  class="form-control " data-live-search="true" ><!-- selectpicker --></select>
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






    <!-- formulario ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

      <!-- inicio div  -->
      <div   id="formulariomuchos">
           <!--inicio del formulario de registrar y editar -->
           <form name="formularioMas" id="formularioMas" method="POST">
    
         
    <div class="row mb-2 py-3">
      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="input-group">
              <div class="input-group-addon">
                  <i class="fa fa-asterisk"></i>prefijo:
              </div>
              <input type="text" id="prefijo_modulo" name="prefijo_modulo" placeholder="ejemplo: PM-" class="form-control">
          </div>
      </div>

      <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="input-group">
              <div class="input-group-addon">
                  <i class="fa fa-asterisk"></i>rango inicial:
              </div>
              <input type="text" id="rango_inicial" name="rango_inicial" placeholder="1" class="form-control">
          </div>
      </div>
      <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="input-group">
              <div class="input-group-addon">
                  <i class="fa fa-asterisk"></i>rango final:
              </div>
              <input type="text" id="rango_final" name="rango_final" placeholder="10" class="form-control">
          </div>
      </div>

      <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <input type="text" class="form-control text-center bg-warning" name="vista_previa" id="vista_previa"  placeholder="vista Previa" disabled>
      </div>
           <h3 class="py-5">Por favor ingresa todas las caracteristicas que tendran los puestos</h3>

             <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
               <label>medida_frente(*):</label>
               <input type="text" class="form-control" name="medida_frente" id="medida_frenteM"  placeholder="Escribe la medida_frente del Puesto " required>
            </div>
             <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
               <label>medida_fondo(*):</label>
               <input type="text" class="form-control" name="medida_fondo" id="medida_fondoM"  placeholder="Escribe la medida_fondo del Puesto " required>
            </div>
             <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
               <label>medida_calificacion(*):</label>
               <input type="text" class="form-control" name="medida_calificacion" id="medida_calificacionM"  placeholder="Escribe la medida_calificacion del Puesto " required>
            </div>
            
           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 cam-po">
             <label for="idsector" >sector al que pertenece</label>
             <select name="idsector" id="idsector2"  class="form-control " data-live-search="true" ><!-- selectpicker --></select>
          </div>
           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 cam-po">
             <label for="idinstitucion" >institucion al que pertenece</label>
             <select name="idinstitucion" id="idinstitucion2"  class="form-control " data-live-search="true" ><!-- selectpicker --></select>
          </div>
    </div>

    

            
            
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <button class="btn btn-warning " type="submit" id="btnGuardarM">
                   <i class="fa fa-save"></i> Guardar
               </button>

               <button class="btn btn-danger"  onclick="cancelarform()" type="button">
                   <i class="fa fa-arrow-circle-left"></i> Cancelar
               </button>



               </div>
           </form>

      </div><!-- fin div -->
    <!-- formulario ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

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
<script  src="scripts/script_puesto.js"></script>

<script src="scripts/funciones_inputs.js"></script>

<?php
 } 
ob_end_flush();
 ?>