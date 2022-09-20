/****************************************************************
Project:  proyecto_mercado                                      *
Version:  1.0                                                   *
Last change:  01/09/2022 La primera version de este proyecto    *
Assigned to:  https://github.com/barry503                       *
Primary use:  Open Source                                       *
****************************************************************/
// la variable tabla esta declarada en el footer
// var tabla;

//Funcion que se ejecuta al inicio
 function inicial(){
     mostrarform(false);
     mostrarformMas(false);
     listar();
     //Cargamos los items al select de institucion
         $.post("../ajax/a_puesto.php?op=selectInstituciones", function(r){
                    $("#idinstitucion").html(r);
                    $("#idinstitucion2").html(r);
                    // $("#idinstitucion").selectpicker('refresh');
         });
         $.post("../ajax/a_puesto.php?op=selectSector", function(r){
                    $("#idsector").html(r);
                    $("#idsector2").html(r);
                    // $("#idsector").selectpicker('refresh');
         });

     $("#formulario").on("submit",function(e)
     {
          guardaryeditar(e);
       
     })



 }

//Funcion limpiar
function limpiar()
{

   $("#idpuesto").val("");
   $("#medida_calificacion").val("");
   $("#medida_compensa").val("");
   $("#medida_fondo").val("");
   $("#medida_frente").val("");
   $("#modulo").val("");

   $("#idinstitucion").val("");
   $("#idsector").val("");




   $("#prefijo_modulo").val("");
   $("#rango_inicial").val("");
   $("#rango_final").val("");
   $("#vista_previa").val("");
   $("#medida_frenteM").val("");
   $("#medida_fondoM").val("");
   $("#medida_calificacionM").val("");
   

}

//Funcion mostrar formulario condi=condicion del formulario
function mostrarform(condi)
{
  limpiar();
  if (condi)
  {
     $("#listadoregistros").hide();
     $("#formularioregistros").show();
     $("#btnGuardar").prop("disabled",false);
     $("#btnagregar").hide();
     $(".cam-po a").attr("href", "#");
  }
  else 
  {
     $("#listadoregistros").show();
     $("#formularioregistros").hide();
     $("#btnagregar").show();
     $(".cam-po a").attr("href", "#");

  }

}

function mostrarformMas(flag)
{
  limpiar();
  if (flag)
  {

    $("#listadoregistros").hide();//esconder lista
     $("#btnagregar_muchos").hide();//esconder boton
     $("#formulariomuchos").show();//mostar form
     $("#btnGuardarM").prop("disabled",false);
     }
  else 
  {
    $("#listadoregistros").show(); //mostar lista
     $("#formulariomuchos").hide(); //esconder form
     $("#btnagregar_muchos").show(); //mostrar boton
  }

}

//Funcion cancelarform
function cancelarform()
{
    limpiar();
    mostrarform(false);
    mostrarformMas(false);
}





//Funcion listar
function listar()
{      /* tbllistado va en la tabla*/
  tabla=$('#tbllistado').dataTable(
  {
      "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSide": true,//Paginacion y filtrado realizados por el servidor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla 

      buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdf'
            ],
            "ajax":
                    {

                         url: "../ajax/a_puesto.php?op="+urlistar,
                         type : "get",
                         dataType : "json",
                         error: function(e){
                          console.log(e.responseText);
                         } 

                     },
              "bDestroy": true,
              "iDisplayLength": 6,//paginacion 
              "order": [[0, "asc"]],//Ordenar desc=desendente asc=ascendente (columna,orden) 
              "autoWidth": false,
              "responsive": true      


  }).dataTable();
}



//Funcion para guardar o editar

function guardaryeditar(e)
{
     e.preventDefault();//No se activara la accion predeterminada del evento
     $("#btnGuardar").prop("disabled",true);
     var formData = new FormData($("#formulario")[0]);

     $.ajax({
         url:"../ajax/a_puesto.php?op=guardaryeditar",
         type: "POST",
         data: formData,
         contentType: false,
         processData: false,

         success: function(e)
         {
             // alert(datos);
             // bootbox.alert(datos);
             // Swal.fire({ icon:'success', title: datos });
             Alerts('guardados',e);
             mostrarform(false);
              // tabla.ajax.reload();
              listar();
             //setTimeout('document.location.reload()'); //para recargar la pajina web (provicional) 
         }         
           
     });
     limpiar();
}



// funcion para mostrar ñlas materias
function mostrar(idpuesto)
{
   $.post("../ajax/a_puesto.php?op=mostrar",{idpuesto : idpuesto}, function(data, status)
    {
       data = JSON.parse(data);
       mostrarform(true);


$("#idpuesto").val(data.id);
$("#nombre").val(data.nombre);

$("#medida_calificacion").val(data.medida_calificacion);
$("#medida_compensa").val(data.medida_compensa);
$("#medida_fondo").val(data.medida_fondo);
$("#medida_frente").val(data.medida_frente);
$("#modulo").val(data.modulo);

$("#idinstitucion").val(data.institucion_id_fk);
$("#idsector").val(data.sector_id_fk);



   })
} 




//Funcion para eliminar registros
function eliminar(idpuesto)
{
   
Swal.fire({
            html: '<h1 class="text-white">Eliminar el permiso</h1><p class="text-white">¿Esta segur@ de eliminar el permiso ?</p>',
            icon: 'error',
            background: '#dc3545d6',
            showCancelButton: true,
            confirmButtonText: "Eliminar",
            cancelButtonText: "Cancelar",
        })
        .then(resultado => {
            if (resultado.value) {
                // Hicieron click en "Sí"
                console.log("Confirmacion verdadera");
                $.post("../ajax/a_puesto.php?op=eliminar", {idpuesto : idpuesto}, function(e){
                         Alerts('datosEliminados',e);
                         listar();
                       });
            } else {
                // Dijeron que no
                console.log("Confirmacion falsa");
                //alerta eliminacion cancelada
                Alerts('datosAsalvo');
            }
        });

}


//Funcion para activar registros
function activar(idpuesto){

Swal.fire({
            html: '<h1 class="text-white">activar el permiso</h1><p class="text-white">¿Esta segur@ de activar el permiso ?</p>',
            icon: 'warning',
            background: '#28a745c7',
            showCancelButton: true,
            confirmButtonText: "Activar",
            cancelButtonText: "Cancelar",
        })
        .then(resultado => {
            if (resultado.value) {
                // Hicieron click en "Sí"
                console.log("Confirmacion verdadera");
                $.post("../ajax/a_puesto.php?op=activar", {idpuesto : idpuesto}, function(e){
                         Alerts('activados',e);
                         listar();
                       });
            } else {
                // Dijeron que no
                console.log("Confirmacion falsa");
                //alerta eliminacion cancelada
                Alerts('sinCambios');
            }
        });
}


//Funcion para desactivar registros
function desactivar(idpuesto){
    Swal.fire({
                html: '<h1 class="text-white">desactivar el permiso</h1><p class="text-white">¿Esta segur@ de desactivar el permiso ?</p>',
                icon: 'warning',
                background: '#343a40d6',
                showCancelButton: true,
                confirmButtonText: "desactivar",
                cancelButtonText: "Cancelar",
            })
            .then(resultado => {
                if (resultado.value) {
                    // Hicieron click en "Sí"
                    console.log("Confirmacion verdadera");
                    $.post("../ajax/a_puesto.php?op=desactivar", {idpuesto : idpuesto}, function(e){
                             Alerts('desactivados',e);
                             listar();
                           });
                } else {
                    // Dijeron que no
                    console.log("Confirmacion falsa");
                    //alerta eliminacion cancelada
                    Alerts('sinCambios');
                }
            });
}






 inicial();