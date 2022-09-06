$( "#registrarmee" ).submit(function( event ) {
  $('.guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "../ajax/signin/nuevo_usuario.php",
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
