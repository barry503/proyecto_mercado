<?php  /* Connexion a la base de datos y las varibles del nombre de la institucion y etc...*/ 
include '../../config/conexion.php';
include '../../config/pdo.php';
include '../../config/fun_info.php';#info de la empresa
$name_web = dataEmpresa("nombre");
$correo_admin = dataEmpresa("correo");
$corresponsall = dataEmpresa("correo");
$AInstitucion = dataEmpresa("abreviatura");
	if (empty($_POST['usuario'])) {
           $errors[] = "Sin el usuario no podremos crear el perfil...";
        }
       
  else if (empty($_POST['clave'])) {
           $errors[] = "Sin la contraseña no podremos crear el usuario...";}
        
/*
        else if (empty($_POST['nombre'])) {
           $errors[] = "nombre esta vacío";}

           else if (empty($_POST['apellido'])) {
           $errors[] = "apellido esta vacío";}*/

      

         else if (empty($_POST['email'])) {
           $errors[] = "Por favor introduce un correo...";}

           else if (
			
			!empty($_POST['usuario']) &&
			!empty($_POST['clave']) &&
			// !empty($_POST['nombre']) &&
			// !empty($_POST['apellido']) &&
			!empty($_POST['email'])
			
		){

        $usuario =$_POST["usuario"];
	    $preparando = $conexionPdo->prepare("SELECT  usuario FROM pm_usuario WHERE   usuario='$usuario'");
		#ejecuta la consulta...
		$preparando->execute();/*array(':usuario' => $usuario)*/
		$resultado =  $preparando->fetch();#la consulta $preparando devuelve true o false
		$Veriemail =$_POST["email"];
	    $resultadoMAIL = $conexionPdo->prepare("SELECT  email FROM pm_usuario WHERE   email='$Veriemail'");
		#ejecuta la consulta...
		$resultadoMAIL->execute();/*array(':email' => $email)*/
		$resultadoMAIL = $resultadoMAIL->fetch();
		

if ($resultado == true) {
	$errors []= "Error El usuario ya existe.";
}else if ($resultadoMAIL == true) {
	$errors []= "Error El Correo ya fue registrado con un usuario.";
}else{

		
		// escaping, additionally removing everything that could be (html/javascript-) code
		$usuario=limpiarCadena($_POST["usuario"]);
        $clave=limpiarCadena($_POST["clave"]);
		// $nombre=limpiarCadena($_POST["nombre"],ENT_QUOTES)));
		// $apellido=limpiarCadena($_POST["apellido"],ENT_QUOTES)));
        $email=limpiarCadena($_POST["email"]);

        
	


$imagen="defecto.png";
        #encriptar la contraseña 
$clavehash=hash("SHA256",$clave); 
$random_int = random_int(1, 3000); $segundoRun = date('s');/*Un numero aleatorio se suma a un segundo*/
$unique_id = $random_int+$segundoRun;
$status ='Desconectado';
		
		$sql= $conexionPdo->prepare("INSERT INTO pm_usuario 
			(usuario,clave,nombre,apellido,email,imagen,condicion,status,unique_id)
			VALUES ('$usuario','$clavehash','nombre','apellido','$email','$imagen','1','$status','$unique_id')");


		$query_SaveUsuario = $sql->execute(); /*mysqli_query($con,$sql);*/
			if ($query_SaveUsuario){
				$messages[] = "Usuario Registrado.";
	if ($query_SaveUsuario) {
	# Datos para el correo

$year = date('Y');
$year_one = date('Y');
 $mailDestinatario = $email; /*correo al que se enviara el mensaje*/
$DE = $corresponsall;

$asunto = "Nuevo Usuario Registrado $year   |    $name_web ";/*ENCABEZADO*/


$Mensaje = "

<!DOCTYPE html>
<html lang='es'>
<head>
  <meta charset='utf-8'>
  <title>Usuario Registrado $year  | $name_web </title>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <meta name='viewport' content='width=device-width, user-scalable=no,
   initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
<style type='text/css'>

*{
  font-family: sans-serif;
}
.jumbotron {
  padding-top: 30px;
  padding-bottom: 30px;
  margin-bottom: 30px;
  color: inherit;
  background-color: #eee;
}
.text-center {
  text-align: center;
}

.pt-1 {
  padding-top: 0.25rem !important;
}
.container,
.container-fluid,
.container-xxl,
.container-xl,
.container-lg,
.container-md,
.container-sm {
  width: 100%;
  padding-right: 1.5rem, 0.75rem;
  padding-left: 1.5rem, 0.75rem;
  margin-right: auto;
  margin-left: auto;
}

.row {
  
  display: flex;
  flex-wrap: wrap;
  margin-top: calc(-1 * 0);
  margin-right: calc(-0.5 * 1.5rem);
  margin-left: calc(-0.5 * 1.5rem);
}
.row > * {
  flex-shrink: 0;
  width: 100%;
  max-width: 100%;
  padding-right: calc(1.5rem * 0.5);
  padding-left: calc(1.5rem * 0.5);
  margin-top: 0;
}

.col {
  flex: 1 0 0%;
}

.row-cols-auto > * {
  flex: 0 0 auto;
  width: auto;
}

.row-cols-1 > * {
  flex: 0 0 auto;
  width: 100%;
}

.row-cols-2 > * {
  flex: 0 0 auto;
  width: 50%;
}

.row-cols-3 > * {
  flex: 0 0 auto;
  width: 33.3333333333%;
}

.row-cols-4 > * {
  flex: 0 0 auto;
  width: 25%;
}

.col-auto {
  flex: 0 0 auto;
  width: auto;
}
  .col-md-12 {
    flex: 0 0 auto;
    width: 100%;
  }
.bg-dark {
  
  background-color: rgba(33, 37, 41, 1) !important;
}

h1, .h1 {
  font-size: calc(1.375rem + 1.5vw);
}
h6, .h6, h5, .h5, h3, .h3, h3, .h3, h2, .h2, h1, .h1 {
  margin-top: 0;
  margin-bottom: 0.5rem;
  font-weight: 600;
  line-height: 1.2;
}
.mb-2 {
  margin-bottom: 0.5rem !important;
}

.py-4 {
  padding-top: 1.5rem !important;
  padding-bottom: 1.5rem !important;
}

.py-5 {
  padding-top: 3rem !important;
  padding-bottom: 3rem !important;
}
.text-muted {
  opacity: 1;
  color: #6c757d !important;
}
.text-success {
  opacity: 1;
  color: rgba(25, 135, 84, 1) !important;
}
.my-2 {
  margin-top: 0.5rem !important;
  margin-bottom: 0.5rem !important;
}

.btn {
  display: inline-block;
  font-weight: 400;
  line-height: 1.5;
  color: #212529;
  text-align: center;
  text-decoration: none;
  vertical-align: middle;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
  background-color: transparent;
  border: 1px solid transparent;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  border-radius: 0.25rem;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.btn-lg {
  padding-right: 0.85rem;
  padding-left: 0.85rem;
}

.btn-success {
  color: #fff;
  background-color: #198754;
  border-color: #198754;
}
.btn-success:hover {
  color: #fff;
  background-color: #157347;
  border-color: #146c43;
}
.btn-check:focus + .btn-success, .btn-success:focus {
  color: #fff;
  background-color: #157347;
  border-color: #146c43;
  box-shadow: 0 0 0 0.25rem rgba(60, 153, 110, 0.5);
}
.text-secondary {
  opacity: 1;
  color: rgba(108, 117, 125, 1) !important;
}

.text-dark {
  opacity: 1;
  color: rgba(33, 37, 41, 1) !important;
}
.text-info {
  
  color: #ffc107 !important;
}
.bg-info{
background-color: #ffc107 !important;
}
h1 {
  color: white;
}

.btn-info {
  color: #000;
  background-color: #ffc107;
  border-color: #ffc107;
}
.btn-info:hover {
  color: #000;
  background-color: #eed70cf8;
  border-color: #eed70cf8;
}
.btn-check:focus + .btn-info, .btn-info:focus {
  color: #000;
  background-color: #31d2f2;
  border-color: #25cff2;
  box-shadow: 0 0 0 0.25rem rgba(11, 172, 204, 0.5);
}
.btn-dark {
  color: #fff;
  background-color: #212529;
  border-color: #212529;
}
.btn-dark:hover {
  color: #fff;
  background-color: #1c1f23;
  border-color: #1a1e21;
}
.btn-check:focus + .btn-dark, .btn-dark:focus {
  color: #fff;
  background-color: #1c1f23;
  border-color: #1a1e21;
  box-shadow: 0 0 0 0.25rem rgba(66, 70, 73, 0.5);
}
</style>

  
</head>
<body class='pt-1'>


<main role='main '>
  <section class='jumbotron text-center'>
    <div class='container'>
      <div class='row'>
        <div class='col-md-12 bg-info mb-2 py-4'>
              <?xml version='1.0' encoding='windows-1252'?>
        <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
        <svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Layer_1' x='0px' y='0px' viewBox='0 0 512 512' style='enable-background:new 0 0 512 512;' xml:space='preserve' width='212px' height='212px'>
        <g><path d='M256 440c136.957 0 248 -111.083 248 -248c0 -136.997 -111.043 -248 -248 -248s-248 111.003 -248 248c0 136.917 111.043 248 248 248zM256 330c-23.1963 0 -42 -18.8037 -42 -42s18.8037 -42 42 -42s42 18.8037 42 42s-18.8037 42 -42 42zM312 76v24
        c0 6.62695 -5.37305 12 -12 12h-12v100c0 6.62695 -5.37305 12 -12 12h-64c-6.62695 0 -12 -5.37305 -12 -12v-24c0 -6.62695 5.37305 -12 12 -12h12v-64h-12c-6.62695 0 -12 -5.37305 -12 -12v-24c0 -6.62695 5.37305 -12 12 -12h88c6.62695 0 12 5.37305 12 12z'  fill='#000'/>

        </g></svg>
      <h1 class='text-dark'>  $AInstitucion </h1>
      <h1 class='text-dark'>  $name_web </h1>
      <h1 class='text-dark'>Tu usuario se registro satisfactoriamente </h1>
      <h3 class=' text-muted'>$year.</h3>

      </div>
      </div>

        <div class='row'>
          <div class='col-md-12 py-5'>
         <h3 class='text-secondary'>'Ya puedes ingresar al sistema y realizar diversas consultas'</h3>

         <h2>DATOS PARA ACCEDER A TU CUENTA :</h2>
         <h2 class='text-dark'>TU USUARIO: $usuario </h2>
         <h2 class='text-dark'>TU CLAVE DE ACCESO: $clave </h2>
         <h2>ENLACE PARA ACCEDER A LA ADMINISTRACION:</h2>
         <a  href='/index.php' class=' my-2 btn btn-lg btn-info'>ir al Login</a>


        <h2>Si no recuerdas tu clave de acceso puedes restaurarla  en la seccion del login  Olvide mi contraseña ? </h2>
        
    </div>
        </div>

        <h2 class='py-5'>ATENCION: Todos los datos aportados y declarados en el sistema deben ser veraces de lo contrario el proceso de activacion podria verse afectado o cancelado...</h2>
        <h2 class='py-5'>puedes realizar cualquier consulta al siguiente correo:</h2>
                <h2>CONTACTO: $correo_admin </h2>
       
    </div>
  </section>
</main>

<footer class='text-muted bg-dark py-4 text-center'>
  
  <div class='container'>
    <p class=''>
     <a href='https://#' class='btn btn-info'>Visitar citio web </a>
    </p>
    <p class='text-white'>sistema | Centro America.</p>
    <p class='text-white'><a href='#' class='text-info'>Terminos  y condiciones</a> | <a href='#'class='text-info'>Todos los derechos reservados</a> &copy;.</p>
  </div>
  
</footer>

</body>
</html>

";

// echo $carta;
// Enviando Mensaje
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .="Content-type:text/html;charset-UTF-8" . "\r\n";
#mas informacion
$headers .= "From: <$DE>" . "\r\n";

$headers .= "Cc: $mailDestinatario " . "\r\n";

 #UTILIZANDO LA FUNCION MAIL PARA ENVIAR EL CORREO
   mail($mailDestinatario,$asunto,$Mensaje,$headers);
/*echo $Mensaje;*/

}				
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}


}


		} else {
			$errors []= "Error desconocido.";
		}













		
		
			
// echo $correo;
			?>


<?php if (isset($errors)){

 ?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Error!</strong>
				<?php
			 foreach ($errors as $error)
			 {
			 	echo $error;

			  ?>

			</div> 

<script >
	                    /* Alerta para envio error*/
Swal.fire({
                       icon:'error',
                       title:'Error al registrar el usuario...',
                         html: '<h4><?php echo $error; ?></h4>',
                          grow: 'fullscreen',
                       footer: 'Todos los  campos son requeridos. '
                   });

</script>


<?php } } ?>



<?php
			
			if (isset($messages)){

				?>


				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						
						<?php
							foreach ($messages as $message) 
							{
									echo $message;
								
							
							?>
				</div>



	<script >
	                    /* Alerta para envio exitoso*/
Swal.fire({
                       icon:'success',
                       title:'Usuario Registrado Exitosamente...',
                       html: '<h4><?php echo $message; ?></h4><br>recuerda tu usuario y tu contraseña ',
                       grow: 'fullscreen',
                       footer: 'Te hemos enviado un correo para confirmar que tu usuario fue creado.'
                   });


</script>




				<?php
				 }
		        	} 

				?>

