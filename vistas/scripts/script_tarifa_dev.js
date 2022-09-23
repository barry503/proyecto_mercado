/****************************************************************
Project:  proyecto_mercado                                      *
Version:  1.0                                                   *
Last change:  20/09/2022                                        *
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
     $.post("../ajax/a_sectores.php?op=selectInstituciones", function(r){

                $("#idinstitucion").html(r);
                // $("#idinstitucion").selectpicker('refresh');
                // r.preventDefault();
            });

 }

//Funcion limpiar
function limpiar()
{
   $("#id").val("");
   $("#codigo_presup").val("");
   $("#descripcion").val("");
   $("#precio_unitario").val("");
   $("#aplicafiestas").val("");
   $("#aplicamulta").val("");
   $("#aplicaintereses").val("");
   $("#referencia").val("");
   $("#vigencia").val("");
   $("#idinstitucion").val("");

      $("#periodo").val("0");
      $("#periodoTexto").text("");

      var dStatic = $("#fechaStatica").val();//fecha estatica
      $("#vigencia").attr("min", dStatic);


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
     $(".codigo_presupp").text("");//quito el texto de presu


  }
  else 
  {
     $("#listadoregistros").show();
     $("#formularioregistros").hide();
     $("#btnagregar").show();
     removerDisabled();//habilitamos los campos

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

                         url: "../ajax/a_tarifa_dev.php?op="+urlistar,
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
         url:"../ajax/a_tarifa_dev.php?op=guardaryeditar",
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
function mostrar(id,reformar)
{
   $.post("../ajax/a_tarifa_dev.php?op=mostrar",{id : id}, function(data, status)
    {
       data = JSON.parse(data);
       mostrarform(true);

       $("#reforma").val(reformar);//campo para aplicar reforma

       $("#id").val(data.id);
       $("#codigo_presup").val(data.codigo_presup);

       $(".codigo_presupp").text(data.codigo_presup);

       

       $("#descripcion").val(data.descripcion);
       $("#precio_unitario").val(data.precio_unitario);
       $("#aplicafiestas").val(data.aplicafiestas);
       $("#aplicamulta").val(data.aplicamulta);
       $("#aplicaintereses").val(data.aplicaintereses);
       $("#referencia").val(data.referencia);
       $("#vigencia").val(data.vigencia);

       //modificamos el atributo de fecha
       $("#vigencia").attr("min", data.vigencia);

       $("#idinstitucion").val(data.institucion_id_fk);
       $("#suplenteIdinstitucion").val(data.institucion_id_fk);

       $("#idinstitucion").attr("disabled", "true");
       $("#idinstitucion").attr("title", "el campo esta desabilitado");

        $("#periodo").attr("disabled", "true");
        $("#periodo").attr("title", "el campo esta desabilitado");


        var cuenta_cop= data.codigo_presup;//var para colocar texto
         if (cuenta_cop.substr(0,8) == 12115999) {//Cambulantes 
        $("#periodoTexto").text("COBROS VENDEDORES AMBULANTES");
         } if (cuenta_cop.substr(0,8) == 12115002) {//Cdiario 
        $("#periodoTexto").text("COBRO DIARIO");
         } if (cuenta_cop.substr(0,8) == 12115001) {//Cmensual 
        $("#periodoTexto").text("COBRO MENSUAL");
         } if (cuenta_cop.substr(0,8) == 12115003) {//Cmensual_diario 
        $("#periodoTexto").text("COBRO MENSUAL/CALCULO DIARIO");
         }



       if (data.aplicafiestas == 1) {
        $("#aplicafiestas").removeAttr("disabled",false);
       }else if(data.aplicaintereses == 1){
        $("#aplicamulta").removeAttr("disabled",false);
       }else if(data.aplicamulta == 1){
        $("#aplicaintereses").removeAttr("disabled",false);
       }else{
        $("#aplicafiestas").attr("disabled",true);
        $("#aplicamulta").attr("disabled",true);
        $("#aplicaintereses").attr("disabled",true);

       }
   })

} 




//Funcion para eliminar registros
function eliminar(id)
{
   
Swal.fire({
            html: '<h1 class="text-white">Eliminar la tarifa</h1><p class="text-white">¿Esta segur@ de eliminar la tarifa ?</p>',
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
                $.post("../ajax/a_tarifa_dev.php?op=eliminar", {id : id}, function(e){
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


//evento click para select de periodo
 $('#periodo').on('click', function(e) {
     var periodo = $("#periodo").val();
     // alert(periodo);
     // para los dos primeros se bloquean las aplicaciones
     if (periodo=="Cambulantes") {
         console.log(periodo);
         aplicarDisabled();/*esta funcion desabilita campos*/
         //agrego el codigo de Cambulantes
         $("#codigo_presup").val("12115999");
     }else if (periodo =="Cdiario"){
         console.log(periodo);
        aplicarDisabled();/*esta funcion desabilita campos*/
        //agrego el codigo de Cdiario
        $("#codigo_presup").val("12115002");
     }else if (periodo =="Cmensual"){
         console.log(periodo);
         removerDisabled();/*con esta funcion habilito los campos*/
         //agrego el codigo de Cmensual
         $("#codigo_presup").val("12115001");
     }else if (periodo =="Cmensual_diario"){
     console.log(periodo);
     removerDisabled();/*con esta funcion habilito los campos*/
     //agrego el codigo de Cmensual_diario
        $("#codigo_presup").val("12115003");                
     }else{
         // defecto
         removerDisabled();/*con esta funcion habilito los campos*/                
     }

         

 })

function removerDisabled() {
    // removemos los campos desabilitads
    $("#precio_unitario").removeAttr("disabled",false);
    $("#id").removeAttr("disabled",false);
    $("#codigo_presup").removeAttr("disabled",false);
    $("#descripcion").removeAttr("disabled",false);
    $("#precio_unitario").removeAttr("disabled",false);
    $("#aplicafiestas").removeAttr("disabled",false);
    $("#aplicamulta").removeAttr("disabled",false);
    $("#aplicaintereses").removeAttr("disabled",false);
    $("#referencia").removeAttr("disabled",false);
    $("#vigencia").removeAttr("disabled",false);
    $("#idinstitucion").removeAttr("disabled",false);
    $("#periodo").removeAttr("disabled",false);
}

function aplicarDisabled(e) {
    // se desabilita las aplicaciones
    $("#aplicafiestas").attr("disabled",true);
    $("#aplicafiestas").attr("title", "el campo esta desabilitado");
    
    $("#aplicamulta").attr("disabled",true);
    $("#aplicamulta").attr("title", "el campo esta desabilitado");

    $("#aplicaintereses").attr("disabled",true);
    $("#aplicaintereses").attr("title", "el campo esta desabilitado");

    $("#periodo").attr("disabled",true);
    $("#periodo").attr("title", "el campo esta desabilitado");

    
    
}



    /*$("#idetificador").keyup(function () {
        alert("funcion para escuchar todos los caracteres escritos en un input"); 
      }).keyup();*/
