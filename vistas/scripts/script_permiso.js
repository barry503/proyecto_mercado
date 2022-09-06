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
     listar();

     $("#formulario").on("submit",function(e)
     {
          guardaryeditar(e);
       
     })





     

 }

//Funcion limpiar
function limpiar()
{
   $("#idpermiso").val("");
   $("#nombre").val("");

   

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

                         url: "../ajax/a_permiso.php?op=listar",
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
         url:"../ajax/a_permiso.php?op=guardaryeditar",
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
function mostrar(idpermiso)
{
   $.post("../ajax/a_permiso.php?op=mostrar",{idpermiso : idpermiso}, function(data, status)
    {
       data = JSON.parse(data);
       mostrarform(true);


$("#nombre").val(data.nombre);
$("#idpermiso").val(data.idpermiso);



   })
} 




//Funcion para eliminar registros
function eliminar(idpermiso)
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
                $.post("../ajax/a_permiso.php?op=eliminar", {idpermiso : idpermiso}, function(e){
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
function activar(idpermiso){

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
                $.post("../ajax/a_permiso.php?op=activar", {idpermiso : idpermiso}, function(e){
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
function desactivar(idpermiso){
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
                    $.post("../ajax/a_permiso.php?op=desactivar", {idpermiso : idpermiso}, function(e){
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