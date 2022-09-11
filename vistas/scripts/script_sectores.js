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
     $.post("../ajax/a_sectores.php?op=selectInstituciones", function(r){

                $("#idinstitucion").html(r);
                $("#idinstitucion").selectpicker('refresh');
                // r.preventDefault();
            });

 }

//Funcion limpiar
function limpiar()
{
   $("#idsector").val("");
   $("#nombre").val("");
   // $("#idinstitucion").val("");
   // $("#idinstitucion").selectpicker('refresh');
   // $(".cam-po a").attr("href", "#");

   

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
      "aServerSidsectore": true,//Paginacion y filtrado realizados por el servidsectoror
      dom: 'Bfrtip',//Definimos los elementos del control de tabla 

      buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdf'
            ],
            "ajax":
                    {

                         url: "../ajax/a_sectores.php?op="+urlistar,
                         type : "get",
                         dataType : "json",
                         error: function(e){
                          console.log(e.responseText);
                         } 

                     },
              "bDestroy": true,
              "iDisplayLength": 6,//paginacion 
              "order": [[0, "asc"]],//Ordenar desc=desendente asc=ascendente (columna,orden) 
              "autoWidsectorth": false,
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
         url:"../ajax/a_sectores.php?op=guardaryeditar",
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
function mostrar(idsector)
{
   $.post("../ajax/a_sectores.php?op=mostrar",{idsector : idsector}, function(data, status)
    {
       data = JSON.parse(data);
       mostrarform(true);


$("#nombre").val(data.nombre);
$("#idsector").val(data.id);

$("#idinstitucion").val(data.institucion_idsector_fk);
$("#idinstitucion").selectpicker('refresh');

$(".cam-po a").attr("href", "#");


   })
} 




//Funcion para eliminar registros
function eliminar(idsector)
{
   
Swal.fire({
            html: '<h1 class="text-white">Eliminar el sector</h1><p class="text-white">¿Esta segur@ de eliminar el sector ?</p>',
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
                $.post("../ajax/a_sectores.php?op=eliminar", {idsector : idsector}, function(e){
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

/*
//Funcion para activar registros
function activar(idsector){

Swal.fire({
            html: '<h1 class="text-white">activar el sector</h1><p class="text-white">¿Esta segur@ de activar el sector ?</p>',
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
                $.post("../ajax/a_sectores.php?op=activar", {idsector : idsector}, function(e){
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
function desactivar(idsector){
    Swal.fire({
                html: '<h1 class="text-white">desactivar el sector</h1><p class="text-white">¿Esta segur@ de desactivar el sector ?</p>',
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
                    $.post("../ajax/a_sectores.php?op=desactivar", {idsector : idsector}, function(e){
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
}*/






 inicial();