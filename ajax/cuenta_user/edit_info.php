<?php  /* Connexion a la base de datos y las varibles del nombre de la institucion y etc...*/ 
include '../../config/conexion.php';
include '../../config/pdo.php'; ?>
<?php 
	if (empty($_POST['idusuario'])) {
           $errors[] = "idusuario esta vacío";
        }
        else if (empty($_POST['nombre'])) {
           $errors[] = "nombre esta vacío";}

        else if (empty($_POST['apellido'])) {
           $errors[] = "apellido esta vacío";}

        // else if (empty($_POST["imagen"])) {
        //    $errors[] = "introduce una imagen ";}

        else if (empty($_POST['usuario'])) {
           $errors[] = "usuario esta vacío";}

        else if (empty($_POST['clave'])) {
           $errors[] = "clave esta vacío";}

         else if (empty($_POST['email'])) {
           $errors[] = "email esta vacío";}

           else if (empty($_POST['telefono'])) {
           $errors[] = "telefono esta vacío";}

           else if (empty($_POST['direccion'])) {
           $errors[] = "direccion esta vacío";}

           else if (
			!empty($_POST['idusuario']) &&
			!empty($_POST['nombre']) &&
			!empty($_POST['apellido']) &&
			// !empty($_POST['imagen']) &&
			!empty($_POST['usuario']) &&
			!empty($_POST['clave']) &&
			!empty($_POST['email']) &&
			!empty($_POST['telefono']) &&
			!empty($_POST['direccion'])
			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$idusuario=limpiarCadena($_POST["idusuario"]);
		$nombre=limpiarCadena($_POST["nombre"]);
		$apellido=limpiarCadena($_POST["apellido"]);
		 // $imagen=limpiarCadena($_POST["imagen"]);
		$usuario=limpiarCadena($_POST["usuario"]);
        $clave=limpiarCadena($_POST["clave"]);
		$email=limpiarCadena($_POST["email"]);
		$telefono=limpiarCadena($_POST["telefono"]);
		$direccion=limpiarCadena($_POST["direccion"]);
        








        #encriptar la contraseña 
$clavehash=hash("SHA256",$clave); 

// imagen='$imagen',
		
		$sql= $conexionPdo->prepare("UPDATE pm_usuario SET nombre='$nombre', apellido='$apellido', usuario='$usuario', clave='$clavehash', email='$email', telefono='$telefono', direccion='$direccion' 
         WHERE idusuario='$idusuario' ");



		$query_update = $sql->execute();/*mysqli_query($con,$sql);*/
			if ($query_update){
				$messages[] = " Tus Datos personales  han sido actualizados satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.";
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>




			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?><br>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Genial...!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php $_SESSION['nombre']=$nombre; ?>
				<?php $_SESSION['apellido']=$apellido; ?>
				<?php $_SESSION['usuario']=$usuario; ?>
				<?php $_SESSION['email']=$email; ?>
				

<script >
	     
	     $('.NOMBRE_USUARIO').html('<?php echo $nombre; ?>');
	     $('.APELLIDO_USUARIO').html('<?php echo $apellido; ?>');
	     $('.USUARIO_USUARIO').html('<?php echo $usuario; ?>');
	     $('.CORREO_USUARIO').html('<?php echo $email; ?>');	     
	     
	     // $('.IMAGEN_ACTUALIZADA').addClass('cualquier-clase-de-bosstap');
	                    /* Alerta para envio error*/
Swal.fire({
                       icon:'success',
                       title:'INFORMACION ACTUALIZADA',
                         // html: '<h4>FOTO ACTUALIZADA</h4>',
                          // grow: 'fullscreen',
                       footer: 'Cambios Exitosos por favor cierra la Session para visualizar los cambios cuando vuelvas a ingresar.'
                   });

</script>

				<?php
			                     }    ?>

