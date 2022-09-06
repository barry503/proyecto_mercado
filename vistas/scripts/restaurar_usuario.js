
$( "#RestaurarClave" ).submit(function( event ) {
  $('.guardar_dates').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "../ajax/signin/RestaurarClave.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_Res").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_Res").html(datos);
			$('.guardar_dates').attr("disabled", false);
			limpiar();


		  }
	});
  event.preventDefault();
})


