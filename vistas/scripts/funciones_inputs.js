
  //cuando escribe en este campo
    $("#prefijo_modulo").keyup(function () {
        var value = $(this).val();
        var rango_inicial = $('#rango_inicial').val();
        if (rango_inicial==false) { rango_inicial="_"; }
        $("#vista_previa").val(value+rango_inicial);
      }).keyup();
  
  //cuando escribe en este campo
$("#rango_inicial").keyup(function () {

        var rango_inicial = $(this).val();
        var prefijo_modulo = $('#prefijo_modulo').val();
        $("#vista_previa").val(prefijo_modulo+rango_inicial);
      }).keyup();


// funcion para calcular area calificacion

  //cuando escribe en este campo
$("#medida_frente").keyup(function () {

        var medida_frente = $(this).val();//medida_frente
        var medida_fondo = $('#medida_fondo').val();
        if (medida_fondo==false) { medida_fondo=0; }
        var resultado = Number(medida_fondo)*Number(medida_frente);
        $("#medida_calificacion").val(resultado);
      }).keyup();



  //cuando escribe en este campo
$("#medida_fondo").keyup(function () {

        var medida_fondo = $(this).val();//medida_fondo
        var medida_frente = $('#medida_frente').val();
        var resultado = Number(medida_frente)*Number(medida_fondo);
        $("#medida_calificacion").val(resultado);
      }).keyup();


// funcion para guardar varios puestos



// estos son para agregar varios

  //cuando escribe en este campo
$("#medida_frenteM").keyup(function () {

        var medida_frenteM = $(this).val();//medida_frenteM
        var medida_fondoM = $('#medida_fondoM').val();
        if (medida_fondoM==false) { medida_fondoM=0; }
        var resultado = Number(medida_fondoM)*Number(medida_frenteM);
        $("#medida_calificacionM").val(resultado);
      }).keyup();



  //cuando escribe en este campo
$("#medida_fondoM").keyup(function () {

        var medida_fondoM = $(this).val();//medida_fondoM
        var medida_frenteM = $('#medida_frenteM').val();
        var resultado = Number(medida_frenteM)*Number(medida_fondoM);
        $("#medida_calificacionM").val(resultado);
      }).keyup();


function guardarVarios(e)
{
     e.preventDefault();//No se activara la accion predeterminada del evento
     $("#btnGuardarM").prop("disabled",true);
     var formData = new FormData($("#formularioMas")[0]);

     $.ajax({
         url:"../ajax/a_puesto.php?op=guardarVarios",
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
             mostrarformMas(false);
              // tabla.ajax.reload();
              listar();
             //setTimeout('document.location.reload()'); //para recargar la pajina web (provicional) 
         }         
           
     });
     limpiar();
}



function inicialN(){

        $("#formularioMas").on("submit",function(e)
        {

             guardarVarios(e);/*llamada*/
          
        })
}
inicialN();