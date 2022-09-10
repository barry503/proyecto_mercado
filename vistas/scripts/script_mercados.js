//LISTAR SECTORES
//Funcion listar
function listarSector()
{      /* tbllistado va en la tabla*/
	tabla = $('#tbllistadoSectores').dataTable(
	{
      "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSide": true,//Paginacion y filtrado realizados por el servidor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla 

      buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  // 'csvHtml5',
                  'pdf'
            ],
            "ajax":
                    {

                         url: "../ajax/a_mercado.php?op=listarSectores",
                         type : "get",
                         dataType : "json",
                         error: function(e){
                    	    console.log(e.responseText);
                         } 

                     },
              "bDestroy": true,
              "iDisplayLength": 5,//paginacion 
              "order": [[0, "asc"]],//Ordenar desc=desendente asc=ascendente (columna,orden)  
              "autoWidth": false,
              "responsive": true     


	}).dataTable();
}
// END LISTAR SECTORES
// listarSector();
//FORMULARIO DE SECTORES
$("#sector").on("click", function () {
//Cargamos los items al select de institucion
	 $.post("../ajax/a_mercado.php?op=selectInstituciones", function(r){
	            $("#idinstitucion").html(r);
	            // $("#idinstitucion").selectpicker('refresh');
	 });
  Swal.fire({
              html: '<div class="col-lg-12"><div class="card"><div class="card-header">ingresa los datos para agregar un nuevo sector !</div><div class="card-body"><div class="card-title text-center"><i class="fa fa-sitemap text-warning t-100 bg-dark"></i><br><h3 class="text-center title-2">Agregar Sector</h3></div><hr><form  method="post" id="formSector"><div class="form-group"><label for="cc-payment" class="control-label mb-1">Nombre del Sector</label><input id="nombre_sector" name="nombre_sector" type="text" class="form-control" required></div><div class="form-group has-success"><label for="idinstitucion" >Institucion ala que pertenece</label><select name="idinstitucion" id="idinstitucion"  class="form-control mb-1"  required></select></div><div><button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block save_sector" ><i class="fa fa-save fa-lg"></i>&nbsp;<span id="payment-button-amount">Guardar</span></button></div><div id="rsp_sector"></div></form></div></div></div> ',
              footer: '<i class="fa  fa-spinner text-dark"></i>',
              showConfirmButton: false,
              // timer: 9500,
              // timerProgressBar: true
          });
  // FORMULARIO

  $( "#formSector" ).submit(function( event ) {
    $('.save_sector').attr("disabled", true);
    
   var parametros = $(this).serialize();
  	 $.ajax({
  			type: "POST",
  			url: "../ajax/a_mercado.php?op=guardaryeditarsector",
  			data: parametros,
  			 beforeSend: function(objeto){
  				$("#rsp_sector").html("Mensaje: Cargando...");
  			  },
  			success: function(datos){
  			$('.save_sector').attr("disabled", true);
  			$("#rsp_sector").html(datos);
  			// limpiar();
  			listarPuesto();
  			listarSector();
  			Swal.fire({
  			    icon: "success",
  			    title: datos,
  			    // footer: '<i class="fa  fa-spinner text-dark"></i>',
  			    showConfirmButton: false,
  			    timer: 9500,
  			    timerProgressBar: true
  			});


  		  }
  	});
    event.preventDefault();
  })
  } );
// FIN FORMULARIO DE SECTORES


//FORMULARIO DE PUESTO
$("#puesto").on("click", function () {
//Cargamos los items al select de institucion
	 $.post("../ajax/a_mercado.php?op=selectInstituciones", function(r){
	            $("#idinstitucion_1").html(r);
	            // $("#idinstitucion").selectpicker('refresh');
	 });
	 $.post("../ajax/a_mercado.php?op=selectSector", function(r){
	            $("#idsector").html(r);
	            // $("#idinstitucion").selectpicker('refresh');
	 });
  Swal.fire({
              html: '<div class="col-lg-12"><div class="card"><div class="card-header">ingresa los datos para agregar un nuevo Puesto !</div><div class="card-body"><div class="card-title text-center"><i class="fa fa-puzzle-piece text-warning t-100 bg-dark"></i><br><h3 class="text-center title-2">Agregar Puesto</h3></div><hr><form  method="post" id="formPuesto"><div class="form-group"><label for="cc-payment" class="control-label mb-1">medida_calificacion</label><input id="medida_calificacion" name="medida_calificacion" type="text" class="form-control" required></div><div class="form-group"><label for="cc-payment" class="control-label mb-1">medida_compensa</label><input id="medida_compensa" name="medida_compensa" type="text" class="form-control" required></div><div class="form-group"><label for="cc-payment" class="control-label mb-1">medida_fondo</label><input id="medida_fondo" name="medida_fondo" type="text" class="form-control" required></div><div class="form-group"><label for="cc-payment" class="control-label mb-1">medida_frente</label><input id="medida_frente" name="medida_frente" type="text" class="form-control" required></div><div class="form-group"><label for="cc-payment" class="control-label mb-1">modulo</label><input id="modulo" name="modulo" type="text" class="form-control" required></div><div class="form-group has-success"><label for="idinstitucion_1" >Institucion ala que pertenece</label><select name="idinstitucion_1" id="idinstitucion_1"  class="form-control mb-1"  required></select></div><div class="form-group has-success"><label for="idsector" >sector al que pertenece</label><select name="idsector" id="idsector"  class="form-control mb-1"  required></select></div><div><button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block save_p" ><i class="fa fa-save fa-lg"></i>&nbsp;<span id="payment-button-amount">Guardar</span></button></div><div id="rsp_puesto"></div></form></div></div></div> ',
              footer: '<i class="fa  fa-spinner text-dark"></i>',
              showConfirmButton: false,
              // timer: 9500,
              // timerProgressBar: true
          });
  // FORMULARIO
  
  $( "#formPuesto" ).submit(function( event ) {
    $('.save_p').attr("disabled", true);
    
   var parametros = $(this).serialize();
  	 $.ajax({
  			type: "POST",
  			url: "../ajax/a_mercado.php?op=guardaryeditarpuesto",
  			data: parametros,
  			 beforeSend: function(objeto){
  				$("#rsp_puesto").html("Mensaje: Cargando...");
  			  },
  			success: function(datos){
  			$('.save_p').attr("disabled", true);
  			$("#rsp_puesto").html(datos);
  			// limpiar();
  			listarPuesto();
  			listarSector();
  			Swal.fire({
  			    icon: "success",
  			    title: datos,
  			    // footer: '<i class="fa  fa-spinner text-dark"></i>',
  			    showConfirmButton: false,
  			    timer: 9500,
  			    timerProgressBar: true
  			});


  		  }
  	});
    event.preventDefault();
  })
  } );
// FIN FORMULARIO DE PUESTO
//Funcion listar puesto
function listarPuesto()
{      /* tbllistado va en la tabla*/
	tabla = $('#tbllistadoPuestos').dataTable(
	{
      "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSide": true,//Paginacion y filtrado realizados por el servidor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla 

      buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  // 'csvHtml5',
                  'pdf'
            ],
            "ajax":
                    {

                         url: "../ajax/a_mercado.php?op=listarPuesto",
                         type : "get",
                         dataType : "json",
                         error: function(e){
                    	    console.log(e.responseText);
                         } 

                     },
              "bDestroy": true,
              "iDisplayLength": 5,//paginacion 
              "order": [[0, "asc"]],//Ordenar desc=desendente asc=ascendente (columna,orden)  
              "autoWidth": false,
              "responsive": true     


	}).dataTable();
}
// END LISTAR SECTORES
listarPuesto();



