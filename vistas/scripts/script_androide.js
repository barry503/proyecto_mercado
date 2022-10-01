/***********************************
*version: develop                  *
*fecha: 12-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
// la variable tabla esta declarada en el footer
// var tabla;

//Funcion que se ejecuta al inicio
 function inicial(){
     mostrarform(false);
     mostrarformNew(false);
     listar();
     $(".cam-po a").attr("href", "#");

     $("#formulario").on("submit",function(e)
     {
          guardaryeditar(e);
       
     })

     $("#formulario2").on("submit",function(e)
     {
          nuevo(e);
       
     })
     $.post("../ajax/a_sectores.php?op=selectInstituciones", function(r){

                $("#idinstitucion").html(r);
                // $("#idinstitucion").selectpicker('refresh');
                // r.preventDefault();
            });
     $.post("../ajax/a_sectores.php?op=selectInstituciones", function(r){

                $("#idinstitucion1").html(r);
                // $("#idinstitucion1").selectpicker('refresh');
                // r.preventDefault();
            });

 }

//Funcion limpiar
function limpiar()
{
   $("#email").val("");
   $("#nombre").val("");
   $("#password").val("");
   // $("#idinstitucion").val("");
   $("#device_prefix").val("");
   $("#alcance").val("");
   $("#idinstitucion").val("");
   $("#idinstitucion1").val("");
   // $("#idinstitucion").selectpicker('refresh');
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
     $("#formularioregistrosNew").hide();
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

function mostrarformNew(condi)
{
  limpiar();
  if (condi)
  {
     $("#listadoregistros").hide();
     $("#formularioregistrosNew").show();
     $("#btnGuardarN").prop("disabled",false);
     $("#btnagregar").hide();

  }
  else 
  {
     $("#listadoregistros").show();
     $("#formularioregistrosNew").hide();
     $("#btnagregar").show();

  }

}

//Funcion cancelarform
function cancelarform()
{
    limpiar();
    mostrarform(false);
    mostrarformNew(false);
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
      "aServerSemaile": true,//Paginacion y filtrado realizados por el servemailor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla 

      buttons: [
                  'copyHtml5',
'excelHtml5',
'pdf',
'print'
            ],
            "ajax":
                    {

                         url: "../ajax/a_usuario_androide.php?op="+urlistar,
                         type : "get",
                         dataType : "json",
                         error: function(e){
                          console.log(e.responseText);
                         } 

                     },
              "bDestroy": true,
              "iDisplayLength": 6,//paginacion 
              "order": [[0, "asc"]],//Ordenar desc=desendente asc=ascendente (columna,orden) 
              "autoWemailth": false,
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
         url:"../ajax/a_usuario_androide.php?op=guardaryeditar",
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

function nuevo(e)
{
     e.preventDefault();//No se activara la accion predeterminada del evento
     $("#btnGuardarN").prop("disabled",true);
     var formData = new FormData($("#formulario2")[0]);

     $.ajax({
         url:"../ajax/a_usuario_androide.php?op=nuevo",
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
             mostrarformNew(false);
              // tabla.ajax.reload();
              listar();
             //setTimeout('document.location.reload()'); //para recargar la pajina web (provicional) 
         }         
           
     });
     limpiar();
}


// funcion para mostrar ñlas materias
function mostrar(email)
{
   $.post("../ajax/a_usuario_androide.php?op=mostrar",{email : email}, function(data, status)
    {
       data = JSON.parse(data);
       mostrarform(true);


$("#email").val(data.email);
$("#nombre").val(data.nombre);

$("#password").val(data.password);
$("#device_prefix").val(data.device_prefix);
$("#alcance").val(data.alcance);

$("#idinstitucion").val(data.institucion_id_fk);
// $("#idinstitucion").selectpicker('refresh');

// $(".cam-po a").attr("href", "#");


   })
} 




//Funcion para eliminar registros
function eliminar(email)
{
   
Swal.fire({
            html: '<h1 class="text-white">Eliminar el giro</h1><p class="text-white">¿Esta segur@ de eliminar el giro ?</p>',
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
                $.post("../ajax/a_usuario_androide.php?op=eliminar", {email : email}, function(e){
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
