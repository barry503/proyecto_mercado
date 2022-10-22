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

     //evento click para select de periodo
    
        $('#btnGuardar').on('click', function(e) {
            $("#institucion_id_fk1").attr("disabled","true");

            var IDcontry = $("#id").val();
            if (IDcontry >= 1) {
                 // alert("el id es = "+IDcontry)
                 guardaryeditar(e); 

             }else{
            // alert("no hay id")
              var respuesta = validacionFormulario();
              if (respuesta==true) {
                // $("#formulario").on("submit",function(e){   
                guardaryeditar(e);
                // })
              }
             }
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
                     // $("#idsector").selectpicker('refresh');
          });


          $.post("../ajax/a_contribuyente.php?op=selectGiros&inst="+inst, function(r){
                     $("#idgiros").html(r);
                     // $("#idgiros").selectpicker('refresh');
          });


          $.post("../ajax/a_contribuyente.php?op=selectTarifa&inst="+inst, function(r){
                     $("#idtarifa").html(r);
                     // $("#idtarifa").selectpicker('refresh');
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
   $("#idgiros").val("");
   $("#idtarifa").val("");
   $("#idsector").val("");
   $("#puesto").val("");
   $("#observaciones").val("");
   $("#fecha_ingreso").val("");

   $("#institucion_id_fk1").removeAttr("disabled",false);

   $("#institucion_id_fk1").val("");

   

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
     $(".hover_edit").show();

     $("#institucion_id_fk1").val("");
     $("#institucion_id_fk").removeAttr("disabled",false);

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

       $(".hover_edit").hide();//para esconder las dos secciones

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

$("#institucion_id_fk").attr("disabled","true");
$("#institucion_id_fk1").val(data.institucion_id_fk);
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





function validacionFormulario() {
 



//datos generales
     if ($("#institucion_id_fk").val() =="") { alertaErr("porfavor ingresa la institucion"); dSection(1); }
else if ($("#codigo_cta").val() =="") { alertaErr("porfavor ingresa el codigo de cuenta"); dSection(1); }
//datos personales
else if ($("#nombres").val() =="") { alertaErr("porfavor ingresa el nombres"); dSection(1); }
else if ($("#apellidos").val() =="") { alertaErr("porfavor ingresa el apellidos"); dSection(1); }
else if ($("#dui").val() =="") { alertaErr("porfavor ingresa el dui"); dSection(1); }
else if ($("#nit").val() =="") { alertaErr("porfavor ingresa el nit"); dSection(1); }
else if ($("#telefono_principal").val() =="") { alertaErr("porfavor ingresa el telefono_principal"); dSection(1); }
else if ($("#telefono_secundario").val() =="") { alertaErr("porfavor ingresa el telefono_secundario"); dSection(1); }
else if ($("#direccion").val() =="") { alertaErr("porfavor ingresa el direccion"); dSection(1); }
else if ($("#municipio_id_fk").val() =="") { alertaErr("porfavor ingresa el municipio_id_fk"); dSection(1); }

// datos puestos
else if ($("#idsector").val() =="") { alertaErr("porfavor ingresa el idsector"); dSection(2); }
else if ($("#puesto").val() =="") { alertaErr("porfavor ingresa el puesto"); dSection(2); }

// datos giro y tarifa
else if ($("#idgiros").val() =="") { alertaErr("porfavor ingresa el idgiros"); dSection(3); }
else if ($("#idtarifa").val() =="") { alertaErr("porfavor ingresa el idtarifa"); dSection(3); }
else if ($("#fecha_ingreso").val() =="") { alertaErr("porfavor ingresa el fecha_ingreso"); dSection(3); }
else if ($("#observaciones").val() =="") { alertaErr("porfavor ingresa el observaciones"); dSection(3); }else{

          return true; 
          // alert("ejecutando funcion");
}

}


function alertaErr(text) {
    // body...
    Swal.fire({html: "<i class='fa fa- fa-warning text-dark  bg-warning'></i><br><h3>"+text+"</h3>",
        position: "top-end",
        toast: true,
        showConfirmButton: false,
        timer: 8500,
        width:600,
        background: '#ffc107' });
}

 

function dSection(numeroSeccion) {
    // body...
    if (numeroSeccion == 1) {
        removeClases();//borro las clases
        $("#generales").addClass("active");//agrego clase a data
        $("#generales").addClass("show");//agrego clase a data

        $("#generales-tab").addClass("active");//agrego clase a tab
        $("#generales-tab").addClass("show");//agrego clase a tab
    }else if(numeroSeccion == 2){
        removeClases();//borro las clases
        $("#puestos").addClass("active");//agrego clase a data
        $("#puestos").addClass("show");//agrego clase a data

        $("#puestos-tab").addClass("active");//agrego clase a tab
        $("#puestos-tab").addClass("show");//agrego clase a tab


    }else if(numeroSeccion == 3){
        removeClases();//borro las clases
        $("#giros").addClass("active");//agrego clase a data
        $("#giros").addClass("show");//agrego clase a data

        $("#giros-tab").addClass("active");//agrego clase a tab
        $("#giros-tab").addClass("show");//agrego clase a tab
    }
}

function removeClases() {
    // remuevo las clases active de todas las secciones
    $("#generales").removeClass("active");
    $("#puestos").removeClass("active");
    $("#giros").removeClass("active");

    $("#generales-tab").removeClass("active");
    $("#puestos-tab").removeClass("active");
    $("#giros-tab").removeClass("active");

    // remuevo las clases show de todas las secciones
    $("#generales").removeClass("show");
    $("#puestos").removeClass("show");
    $("#giros").removeClass("show");

    $("#generales-tab").removeClass("show");
    $("#puestos-tab").removeClass("show");
    $("#giros-tab").removeClass("show");
}


      
        
/*

#generales-tab 1
#puestos-tab   2
#giros-tab     3


#generales 1
#puestos   2
#giros     3

clases para el contenido
active show


*/

 inicial();