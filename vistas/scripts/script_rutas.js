/****************************************************************
Project:  proyecto_mercado                                      *
Version:  1.0                                                   *
Last change:  13/09/2022                                        *
Assigned to:  https://github.com/barry503                       *
Primary use:  Open Source                                       *
****************************************************************/
// la variable tabla esta declarada en el footer
// var tabla;

//Funcion que se ejecuta al inicio
 function inicial(){
     mostrarform(false);
     listar();

     $("#formulario").on("submit",function(e)
     {
          guardaryeditar(e);
       
     })
     $.post("../ajax/a_sectores.php?op=selectInstituciones", function(r){

                $("#idinstitucion").html(r);
                // $("#idinstitucion").selectpicker('refresh');
                // r.preventDefault();
            });

     $.post("../ajax/a_rutas.php?op=selectAndroid", function(r){

                $("#correo_usuario").html(r);
                // $("#correo_usuario").selectpicker('refresh');
                // r.preventDefault();
            });

     

 }

//Funcion limpiar
function limpiar()
{


   $("#idrutas").val("");
   $("#descripcion").val("");
   $("#nombre").val("");
   $("#idinstitucion").val("");
   // $("#idinstitucion").selectpicker('refresh');
   $("#correo_usuario").val("");
   // $("#correo_usuario").selectpicker('refresh');
   
   $(".cam-po a").attr("href", "#");

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
  }
  else 
  {
     $("#listadoregistros").show();
     $("#formularioregistros").hide();
     $("#btnagregar").show();

  }

}


//Funcion cancelarform
function cancelarform()
{
    limpiar();
    mostrarform(false);
}





//Funcion listar
function listar()
{      /* tbllistado va en la tabla*/
  tabla=$('#tbllistado').dataTable(
  {
      "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSidrutase": true,//Paginacion y filtrado realizados por el servidrutasor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla 

      buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdf'
            ],
            "ajax":
                    {

                         url: "../ajax/a_rutas.php?op="+urlistar,
                         type : "get",
                         dataType : "json",
                         error: function(e){
                          console.log(e.responseText);
                         } 

                     },
              "bDestroy": true,
              "iDisplayLength": 6,//paginacion 
              "order": [[0, "asc"]],//Ordenar desc=desendente asc=ascendente (columna,orden) 
              "autoWidrutasth": false,
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
         url:"../ajax/a_rutas.php?op=guardaryeditar",
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
function mostrar(idrutas)
{
   $.post("../ajax/a_rutas.php?op=mostrar",{idrutas : idrutas}, function(data, status)
    {
       data = JSON.parse(data);
       mostrarform(true);


$("#idrutas").val(data.id);
$("#descripcion").val(data.descripcion);
$("#nombre").val(data.nombre);
$("#idinstitucion").val(data.institucion_id_fk);
// $("#idinstitucion").selectpicker('refresh');
$("#correo_usuario").val(data.usuario_email_fk);
// $("#correo_usuario").selectpicker('refresh');

// $(".cam-po a").attr("href", "#");


   })
} 




//Funcion para eliminar registros
function eliminar(idrutas)
{
   
Swal.fire({
            html: '<h1 class="text-white">Eliminar la ruta</h1><p class="text-white">¿Esta segur@ de eliminar la ruta ?</p>',
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
                $.post("../ajax/a_rutas.php?op=eliminar", {idrutas : idrutas}, function(e){
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

 inicial();