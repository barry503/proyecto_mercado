/****************************************************************
Project:  proyecto_mercado                                      *
Version:  1.0                                                   *
Last change:  05/10/2022                                        *
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

                $("#institucion_id_fk").html(r);
                // $("#idinstitucion").selectpicker('refresh');
                
            });
     $.post("../ajax/a_contribuyente.php?op=selectMunicipio", function(r){

                $("#municipio_id_fk").html(r);
                // $("#municipio_id_fk").selectpicker('refresh');
                
            });

   //evento click para select de periodo
      $('#institucion_id_fk').on('click', function(e) {
          var inst = $("#institucion_id_fk").val();

          $.post("../ajax/a_puesto.php?op=selectSector&inst="+inst, function(r){
                     $("#idsector").html(r);
                     // $("#idsector2").html(r);
                     // $("#idsector").selectpicker('refresh');
          });
      })


      //evento click para select de periodo
         $('#idsector').on('click', function(e) {
             var sect = $("#idsector").val();
             
             $.post("../ajax/a_contribuyente.php?op=selectPuesto&sect="+sect, function(r){
                        $("#puesto").html(r);
                        // $("#idsector2").html(r);
                        // $("#idsector").selectpicker('refresh');
             });
         })



         //evento click para select de periodo
            $('#puesto').on('click', function(e) {
                var id = $("#puesto").val();
                
                $.post("../ajax/a_contribuyente.php?op=informacion_puesto&id="+id, function(r){
                           $("#informacion_puesto").html(r);
                           // $("#idsector2").html(r);
                           // $("#idsector").selectpicker('refresh');
                });
            })

          


 }

//Funcion limpiar
function limpiar(){

   $("#id").val("");
   $("#dui").val("");
   $("#nit").val("");
   $("#apellidos").val("");
   $("#codigo_cta").val("");
   $("#direccion").val("");
   $("#nombres").val("");
   $("#telefono_principal").val("");
   $("#telefono_secundario").val("");
   $("#institucion_id_fk").val("");
   // $("#idinstitucion").selectpicker('refresh');
   $("#municipio_id_fk").val("");
   // $("#municipio_id_fk").selectpicker('refresh');
   

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

                         url: "../ajax/a_contribuyente.php?op="+urlistar,
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
         url:"../ajax/a_contribuyente.php?op=guardaryeditar",
         type: "POST",
         data: formData,
         contentType: false,
         processData: false,

         success: function(e)
         {
             // alert(datos);
             // bootbox.alert(datos);
             Swal.fire({ html: e });
             // Alerts('guardados',e);
             mostrarform(false);
              // tabla.ajax.reload();
              listar();
             //setTimeout('document.location.reload()'); //para recargar la pajina web (provicional) 
         }         
           
     });
     limpiar();
}



// funcion para mostrar ñlas 
function mostrar(id)
{
   $.post("../ajax/a_contribuyente.php?op=mostrar",{id : id}, function(data, status)
    {
       data = JSON.parse(data);
       mostrarform(true);



$("#id").val(data.id);
$("#dui").val(data.dui);
$("#nit").val(data.nit);
$("#apellidos").val(data.apellidos);
$("#codigo_cta").val(data.codigo_cta);
$("#direccion").val(data.direccion);
$("#nombres").val(data.nombres);
$("#telefono_principal").val(data.telefono_principal);
$("#telefono_secundario").val(data.telefono_secundario);
$("#institucion_id_fk").val(data.institucion_id_fk);
// $("#idinstitucion").selectpicker('refresh');
$("#municipio_id_fk").val(data.municipio_id_fk);
// $("#municipio_id_fk").selectpicker('refresh');
   })
} 




//Funcion para eliminar registros
function eliminar(id)
{
   
Swal.fire({
            html: '<h1 class="text-white">Eliminar el Contribuyente</h1><p class="text-white">¿Esta segur@ de eliminar el Contribuyente ?</p>',
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
                $.post("../ajax/a_contribuyente.php?op=eliminar", {id : id}, function(e){
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