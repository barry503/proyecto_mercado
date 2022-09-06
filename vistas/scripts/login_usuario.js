/***********************************
*version: 1                        *
*fecha: 02-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
$("#frmAcceso").on('submit', function(e)
{
 
   //No se activara la accion predeterminada del evento
   e.preventDefault();
  logina=$("#logina").val();
  clavea=$("#clavea").val();


$.post("../ajax/a_usuario.php?op=verificar",
	{"logina":logina,"clavea":clavea},
	function(data)
	{
			if(data!="null")
		{
			 
			 
			    $(location).attr("href","inicio.php?l=s");

		}else {
			
			
		// bootbox.alert("Usuario y/0 Password incorrectos");
		Swal.fire({
                       icon:'error',
                       title:'Usuario y/o Contraseña incorrectos',
                       grow: 'fullscreen',
                       footer: 'Si no tienes una cuenta crea una <p style="color:#fff;">_</p><a href="signin.php" > Registrarme Ahora </a> ',
                       html: '<br> revisa los datos y vuelve a intentar.',
                   });
			 	// Swal.fire({ title: "Usuario y/0 Password incorrectos" });
			
		}
       
	});

})