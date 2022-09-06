/***********************************
*version: 10                       *
*fecha: 26-08-2022                 *
*Dev: https://github.com/barry503  *
*Develop:Raiz Tecnologica          *
*Web:https://raiztecnologica.com   *
**********************************/
$( "#registrarmee" ).submit(function( event ) {
  $('.guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "registrarme/nuevo_usuario.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
			$('.guardar_datos').attr("disabled", false);
			limpiar();


		  }
	});
  event.preventDefault();
})


function limpiar(){
 $("#usuario").val("");
 $("#clave").val("");
 $("#nombre").val("");
 $("#apellido").val("");
 $("#email").val("");
}
