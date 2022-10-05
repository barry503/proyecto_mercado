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
     $(".cam-po a").attr("href", "#");

     $("#formulario").on("submit",function(e)
     {
          guardaryeditar(e);
       
     })

     // opcionPuesto();

     $.post("../ajax/a_sectores.php?op=selectInstituciones", function(r){

                $("#idinstitucion").html(r);
                // $("#idinstitucion").selectpicker('refresh');
                // r.preventDefault();
            });
     
     //evento click para select de periodo
      $('#idinstitucion').on('click', function(e) {
          var inst = $("#idinstitucion").val();
          
          $.post("../ajax/a_rutasPuestos.php?op=selectRuta&inst="+inst, function(r){

                     $("#ruta_id").html(r);
                     // $("#ruta_id").selectpicker('refresh');
                     // r.preventDefault();
                 });


          //post para los puestos
          $.post("../ajax/a_rutasPuestos.php?op=selectPuesto&inst="+inst,function(r){
                   $("#puestos_id").html(r);
          });
          
      });



 }



//Funcion limpiar
function limpiar()
{


   $("#id").val("");
   $("#ruta_id").val("");
   // $("#ruta_id").selectpicker('refresh');
   $("#puestos_id").val("");
   $("#idinstitucion").val("");
   // $("#puestos_id").selectpicker('refresh');
   
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
     // opcionPuesto();
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
    language: {
                lengthMenu: 'Mostrar _MENU_ registros por página',
                zeroRecords: 'No se encontró nada, lo siento',
                info: 'Mostrando página _PAGE_ de _PAGES_ ',
                infoEmpty: 'No hay registros disponibles',
                infoFiltered: '(filtrado de _MAX_ registros totales)',
            },
      "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSide": true,//Paginacion y filtrado realizados por el servidor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla 

      buttons: [
                  'copyHtml5',
'excelHtml5',
'pdf',
'print'
            ],
            "ajax":
                    {

                         url: "../ajax/a_rutasPuestos.php?op="+urlistar,
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
         url:"../ajax/a_rutasPuestos.php?op=guardaryeditar",
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
             opcionPuesto();
              // tabla.ajax.reload();
              listar();
             //setTimeout('document.location.reload()'); //para recargar la pajina web (provicional) 
         }         
           
     });
     limpiar();
}



// funcion para mostrar ñlas materias
function mostrar(id)
{
   $.post("../ajax/a_rutasPuestos.php?op=mostrar",{id : id}, function(data, status)
    {
       data = JSON.parse(data);
       mostrarform(true);


$("#id").val(data.id);
$("#ruta_id").val(data.ruta_id);
// $("#ruta_id").selectpicker('refresh');
$("#puestos_id").val(data.puestos_id);
// $("#puestos_id").selectpicker('refresh');

// $(".cam-po a").attr("href", "#");


   })
} 




//Funcion para eliminar registros
function eliminar(id)
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
                $.post("../ajax/a_rutasPuestos.php?op=eliminar", {id : id}, function(e){
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