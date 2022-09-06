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
 function init(){
     mostrarform(false);
     listar();

     $("#formulario").on("submit",function(e)
     {
          guardaryeditar(e);
         
       
     })


    $("#imagenmuestra").hide();   

//mostramos los permisos
$.post("../ajax/a_usuario.php?op=permisos&id=",function(r){
         $("#permisos").html(r);
});  


 }

//Funcion limpiar
function limpiar()
{  
	    

   $("#nombre").val("");
   $("#apellido").val("");
   
   $("#usuario").val("");
   $("#clave").val("");

   $("#email").val("");
   $("#telefono").val("");
    $("#direccion").val("");

   
   // limpiando la imagen
   $("#imagenmuestra").attr("src","");
   // vaciando imagen
   $("#imagenactual").val("");
   $("#idusuario").val(""); 



}

//Funcion mostrar formulario
function mostrarform(flag)
{
  limpiar();
  if (flag)
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
	tabla = $('#tbllistado').dataTable(
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

                         url: "../ajax/a_usuario.php?op=listar",
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
         url:"../ajax/a_usuario.php?op=guardaryeditar",
         type: "POST",
         data: formData,
         contentType: false,
         processData: false,

         success: function(datos)
         {
             // alert(datos); // Swal.fire({ icon:'success', title: datos });
             bootbox.alert(datos);
             mostrarform(false);
             // tabla.ajax.reload();
              listar(); 
            //setTimeout('document.location.reload()'); //para recargar la pajina web (provicional) 
         }         
           
     });
     limpiar();
}

function mostrar(idusuario)
{
   $.post("../ajax/a_usuario.php?op=mostrar",{idusuario : idusuario}, function(data, status)
    {
       data = JSON.parse(data);
       mostrarform(true);
            
           
            $("#nombre").val(data.nombre);
            $("#apellido").val(data.apellido);

            $("#usuario").val(data.usuario);
            $("#clave").val(data.clave);

            $("#email").val(data.email);
            $("#telefono").val(data.telefono);
            $("#direccion").val(data.direccion);
            

            $("#imagenmuestra").show();
             $("#imagenmuestra").attr("src","../files/usuarios/"+data.imagen);
             $("#imagenactual").val(data.imagen);
            $("#idusuario").val(data.idusuario);
           

   });
   $.post("../ajax/a_usuario.php?op=permisos&id="+idusuario,function(r){
         $("#permisos").html(r);
}); 

} 


//Funcion para activar registros
function activar(idusuario){

Swal.fire({
            html: '<h1 class="text-white">activar el usuario</h1><p class="text-white">¿Esta segur@ de activar el usuario ?</p>',
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
                $.post("../ajax/a_usuario.php?op=activar", {idusuario : idusuario}, function(e){
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
function desactivar(idusuario){
    Swal.fire({
                html: '<h1 class="text-white">desactivar el usuario</h1><p class="text-white">¿Esta segur@ de desactivar el usuario ?</p>',
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
                    $.post("../ajax/a_usuario.php?op=desactivar", {idusuario : idusuario}, function(e){
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




 init();