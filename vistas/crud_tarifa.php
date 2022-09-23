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
<?php $nom_section= nom_section("Crud Tarifa"); ?>
<?php require'includes/header.php'; ?>



<?php include '../config/fun_permiso.php'; ?>
<?php $name_permiso = retornarNamePermiso(18); ?>
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
                 <h3 class="card-title">  
                  <button class="btn btn-dark" id="btnagregar" onclick="mostrarform(true)" >
                    
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
              <thead class="bg-dark">
                <th>id</th>
                <th>codigo_presup</th>
                <th>descripcion</th>
                <th>precio_unitario</th>
                <th>aplicafiestas</th>
                <th>aplicamulta</th>
                <th>aplicaintereses</th>
                <th>referencia</th>
                <th>vigencia</th>
                <th>idinstitucion</th>
                 <th>acciones</th>
                 
                            
              </thead>  
                    <tbody>
                        <!-- datos de bd en el archivo url: scripts/sexo.js -->
                    </tbody>

              <tfoot >
                 <th>id</th>
                 <th>codigo_presup</th>
                 <th>descripcion</th>
                 <th>precio_unitario</th>
                 <th>aplicafiestas</th>
                 <th>aplicamulta</th>
                 <th>aplicaintereses</th>
                 <th>referencia</th>
                 <th>vigencia</th>
                 <th>idinstitucion</th>
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
           
           <div class="form-group col-md-6 col-xs-12">
             <label for="codigo_presup">codigo_presup</label>
                    <!-- para trabajar con el id -->
               <input type="hidden" class="form-control" name="id" id="id">
               <input type="text" name="codigo_presup" id="codigo_presup" class="form-control"  required>
           </div>
           <div class="form-group col-md-6 col-xs-12">
             <label for="descripcion">descripcion</label>
               <input type="text" name="descripcion" id="descripcion" class="form-control" required>
           </div>
           <div class="form-group col-md-6 col-xs-12">
             <label for="precio_unitario">precio_unitario</label>
               <input type="text" name="precio_unitario" id="precio_unitario" class="form-control" required>
           </div>
           <div class="form-group col-md-6 col-xs-12">
             <label for="aplicafiestas">aplicafiestas</label>
               <!-- <input type="text" name="aplicafiestas" id="aplicafiestas" class="form-control"> -->
               <select name="aplicafiestas" id="aplicafiestas" class="form-control" required>
                 <option value="0">NO</option>
                 <option value="1">SI</option>
               </select>
           </div>
           <div class="form-group col-md-6 col-xs-12">
             <label for="aplicamulta">aplicamulta</label>
               <!-- <input type="text" name="aplicamulta" id="aplicamulta" class="form-control"> -->
               <select name="aplicamulta" id="aplicamulta" class="form-control" required>
                 <option value="0">NO</option>
                 <option value="1">SI</option>
               </select>
           </div>
           <div class="form-group col-md-6 col-xs-12">
             <label for="aplicaintereses">aplicaintereses</label>
               <!-- <input type="text" > -->
               <select name="aplicaintereses" id="aplicaintereses" class="form-control" required>
                 <option value="0">NO</option>
                 <option value="1">SI</option>
               </select>
           </div>
           <div class="form-group col-md-6 col-xs-12">
             <label for="referencia">referencia</label>
               <!-- <input type="text" > -->
               <textarea name="referencia" id="referencia" class="form-control" required></textarea>
           </div>
           <div class="form-group col-md-6 col-xs-12">
             <label for="vigencia">vigencia</label>
               <input type="date" name="vigencia" id="vigencia" class="form-control" min="<?php echo date('Y-m-d') ?>" max="2050-06-01" required>
           </div>

            <div class="form-group col-md-6 col-xs-12">
              <label for="idinstitucion" >Institucion ala que pertenece</label>
              <select name="idinstitucion" id="idinstitucion"  class="form-control " data-live-search="true"  required><!-- selectpicker --></select>
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
<script  src="scripts/script_tarifa.js"></script>

 

<?php
 } 
ob_end_flush();
 ?>