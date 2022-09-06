/****************************************************************
Project:  proyecto_mercado                                      *
Version:  1.0                                                   *
Last change:  01/09/2022 La primera version de este proyecto    *
Assigned to:  https://github.com/barry503                       *
Primary use:  Open Source                                       *
****************************************************************/
// la variable tabla esta declarada en el footer
//Funcion que se ejecuta al inicio
 function inicial(){
     mostrarform(false);
     listar();//funcion para listar
     //evento para guardar
     $("#formulario").on("submit",function(e){
          guardaryeditar(e);//funcion para guardaryeditar
     })
 }

//Funcion para limpiar inputs
function limpiar(){
    /*Ejecutando... */
   $("#id").val("");
   $("#nom_section").val("");
   $("#public_data").val("");
   $("#des_section").val("");
   $("#estado").val("");
}

//Funciones para animaciones de tabla y formularios

//Funcion mostrar formulario condi=condicion del formulario
function mostrarform(condi){
     limpiar();//ejecutando metodo
     if (condi){
         $("#listadoregistros").hide();
         $("#formularioregistros").show();
         $("#btnGuardar").prop("disabled",false);
         $("#btnagregar").hide();
     }else{
         $("#listadoregistros").show();
         $("#formularioregistros").hide();
         $("#btnagregar").show();
     }
}
//Funcion cancelarform
function cancelarform()
{
    limpiar();//ejecutando metodo
    mostrarform(false);//ejecutando metodo
}

//Funciones para animaciones de tabla y formularios

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

                         url: "../ajax/a_website.php?op=listar",
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


//Funcion para guardar o editar

function guardaryeditar(e)
{
     e.preventDefault();//No se activara la accion predeterminada del evento
     $("#btnGuardar").prop("disabled",true);
     var formData = new FormData($("#formulario")[0]);

     $.ajax({
         url:"../ajax/a_website.php?op=guardaryeditar",
         type: "POST",
         data: formData,
         contentType: false,
         processData: false,

         success: function(e)
         {
             
             Alerts('guardados',e);

             // Swal.fire({ icon:'success', title: datos });
             mostrarform(false);
              // tabla.ajax.reload();
              listar();
             //setTimeout('document.location.reload()'); //para recargar la pajina web (provicional) 
         }         
           
     });
     limpiar();
}

function mostrar(id)
{
   $.post("../ajax/a_website.php?op=mostrar",{id : id}, function(data, status)
    {
       data = JSON.parse(data);
       mostrarform(true);//mostramos el formulario

       $("#id").val(data.id);
       $("#nom_section").val(data.nom_section);
       $("#public_data").val(data.public_data);
       $("#des_section").val(data.des_section);
       $("#estado").val(data.estado);


   })
} 


//Funcion para eliminar registros
function eliminar(id)
{
   
Swal.fire({
            html: '<h1 class="text-white">Eliminar los datos</h1><p class="text-white">¿Esta segur@ de eliminar los datos ?</p>',
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
                $.post("../ajax/a_website.php?op=eliminar", {id : id}, function(e){
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
function activar(id){

Swal.fire({
            html: '<h1 class="text-white">activar la seccion</h1><p class="text-white">¿Esta segur@ de activar la seccion ?</p>',
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
                $.post("../ajax/a_website.php?op=activar", {id : id}, function(e){
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
function desactivar(id){
    Swal.fire({
                html: '<h1 class="text-white">desactivar la seccion</h1><p class="text-white">¿Esta segur@ de desactivar la seccion ?</p>',
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
                    $.post("../ajax/a_website.php?op=desactivar", {id : id}, function(e){
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

inicial();//Ejecutando el metodo principal
