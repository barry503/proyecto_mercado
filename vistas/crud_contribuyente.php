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
                 <h3 class="card-title">Contribuyente  
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
<!--                 <li class="nav-item">
                  <a class="nav-link active show" id="datos-tab" data-toggle="tab" href="#datos" role="tab" aria-controls="datos" aria-selected="false">Datos Generales</a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link active show" id="generales-tab" data-toggle="tab" href="#generales" role="tab" aria-controls="generales" aria-selected="false">Datos Personales</a>
                </li>
                <li class="nav-item hover_edit">
                  <a class="nav-link" id="puestos-tab" data-toggle="tab" href="#puestos" role="tab" aria-controls="puestos" aria-selected="true">Datos Puesto</a>
                </li>
                <li class="nav-item hover_edit">
                  <a class="nav-link" id="giros-tab" data-toggle="tab" href="#giros" role="tab" aria-controls="giros" aria-selected="true">Datos Giros y Tarifa</a>
                </li>
              </ul>
              <div class="tab-content pl-3 p-1" id="myTabContent">
<!--                 <div class="tab-pane fade active show" id="datos" role="tabpanel" aria-labelledby="datos-tab">
                  




                </div> -->
                <div class="tab-pane fade active show" id="generales" role="tabpanel" aria-labelledby="generales-tab">
                  <h3>Datos Generales</h3>
                  <div class="row mb-2">
                   <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                     <label for="institucion_id_fk" >Institucion ala que pertenece</label>
                      <!-- <input type="hidden" name="idcontribuyente" id="idcontribuyente" > ya esta agregado  -->
                     <select name="institucion_id_fk" id="institucion_id_fk"  class="form-control  " data-live-search="true" required><!-- selectpicker --></select>
                     <input type="hidden" name="institucion_id_fk1" id="institucion_id_fk1" >
                  </div>
                   <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                     <label>codigo de cuenta:</label>
                     <input type="text" class="form-control " name="codigo_cta" id="codigo_cta"  placeholder="Escribe el codigo_cta del Contribuyente " required> 
                  </div>

                   

                  </div>
                  
                  <h3>Datos Personales del Contribuyente</h3>
                  <div class="row mb-2">
                     <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                       <label>Nombres del contribuyente: </label>
                       <div class="input-group">
                       <div class="input-group-addon">
                       *<b>NOMBRES</b>
                       </div>
                       <input type="text" class="form-control " name="nombres" id="nombres"  placeholder="Escribe los nombres " required> 
                       </div>

                    </div>

                     <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                       <label>apellidos del contribuyente:</label>
                       <div class="input-group">
                       <div class="input-group-addon">
                       *<b>APELLIDOS</b>
                       </div>
                       <input type="text" class="form-control " name="apellidos" id="apellidos"  placeholder="Escribe los apellidos " required> 
                       </div>

                    </div>


                           <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                             <label title="Documento de identificacion personal">Documento:</label>
                                  <!-- para trabajar con el id -->
                             <input type="hidden" name="id" id="id" value="0">

                             <div class="input-group">
                             <div class="input-group-addon">
                             *<b>DUI</b>
                             </div>
                             <input type="text" class="form-control " name="dui" id="dui"  placeholder="Escribe el dui " required>
                             </div>
                          
                             
                          </div>

                           <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                             <label>Documento tributario:</label>
                             <div class="input-group">
                             <div class="input-group-addon">
                             *<b>NIT</b>
                             </div>
                             <input type="text" class="form-control " name="nit" id="nit"  placeholder="Escribe el nit del Contribuyente " required> 
                             </div>

                          </div>

                           <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                             <label>telefono principal:</label>
                             <div class="input-group">
                             <div class="input-group-addon">
                             *<b>Tel:</b>
                             </div>
                             <input type="text" class="form-control " name="telefono_principal" id="telefono_principal"  placeholder="Escribe telefono principal" required> 
                             </div>

                          </div>

                           <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                             <label>telefono secundario:</label>
                             <div class="input-group">
                             <div class="input-group-addon">
                             *<b>Tel:</b>
                             </div>
                             <input type="text" class="form-control " name="telefono_secundario" id="telefono_secundario"  placeholder="Escribe telefono secundario " required> 
                             </div>

                          </div>




                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <label>direccion del contribuyente:</label>
                             <input type="text" class="form-control " name="direccion" id="direccion"  placeholder="Escribe la direccion" required>
                          </div>


                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <label for="municipio_id_fk" >Municipio al que pertenece</label>
                             <select name="municipio_id_fk" id="municipio_id_fk"  class="form-control  " data-live-search="true" required><!-- selectpicker --></select>
                          </div>



                          </div>
                </div>
                <div class="tab-pane fade " id="puestos" role="tabpanel" aria-labelledby="puestos-tab">
                  <h3>Datos del puesto asignado o por asignar</h3>

                   <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 cam-po">
                     <label for="idsector" >sector al que pertenece</label>
                     <select name="idsector" id="idsector"  class="form-control  " data-live-search="true" required><!-- selectpicker --></select>
                  </div>

                   <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 cam-po">
                     <label for="puesto" >Puesto a agregar</label>
                     <select name="puesto" id="puesto"  class="form-control  " data-live-search="true" required><!-- selectpicker --></select>
                  </div>

                  <div class=" col-md-12 text-center">
                    <h2>Datos del puesto</h2>
                    <div class="row">
                        <div class="col-md-4">
                          <img src="https://img.freepik.com/vector-premium/ilustracion-vector-plano-mercado-agricola-exterior-edificio-tienda-alimentos-fachada-tienda-verduras-letrero-aislado-sobre-fondo-blanco-quiosco-verduras-frescas-tienda-comestibles-maiz-escaparate_198278-5854.jpg">
                        </div>
                        <div class="col-md-4 text-left"><br><br><div id="informacion_puesto"><!-- aqui va la informacion del puesto --></div></div>

                    </div>
                  </div>
                </div>
                <div class="tab-pane fade " id="giros" role="tabpanel" aria-labelledby="giros-tab">
                  <h3>Giros y Tarifa</h3>

                  <div class="row mb-2">
                     <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 cam-po">
                       <label for="idgiros" >Selecciona el giro</label>
                       <select name="idgiros" id="idgiros"  class="form-control  " data-live-search="true" required><!-- selectpicker --></select>
                    </div>

                     <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 cam-po">
                       <label for="idtarifa" >Selecciona la tarifa</label>
                       <select name="idtarifa" id="idtarifa"  class="form-control  " data-live-search="true" required><!-- selectpicker --></select>
                       
                    </div>

                     <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 cam-po">
                       <label for="fecha_ingreso" >Selecciona la fecha de ingreso </label>
                       <input type="date" name="fecha_ingreso" id="fecha_ingreso"  class="form-control  campo_fecha" required>
                    </div>

                     <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 cam-po">
                       <label for="observaciones" >Escribe alguna observacion </label>
                       <input type="text"  name="observaciones" id="observaciones"  class="form-control " required>
                    </div>
                  </div>


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