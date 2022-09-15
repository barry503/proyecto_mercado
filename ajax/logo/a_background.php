<?php
//incluimos inicialmente la conexion ala base de datos
require '../../config/pdo.php';

#verificamos que exista el archivo imagefilea
if (isset($_FILES["imagefilea"])):
#la variable $cargo_urlD carga la url donde se guardara la imagen
$cargo_urlD="../../files/logo/";
# la variable $nombre_image  contiene la funcion time(); o  marca de tiempo y la funcion basename y agrego el nombre del archivo
$nombre_image = time()."_".basename($_FILES["imagefilea"]["name"]);
# la variable $cargo_file contiene la ruta y el nombre de la img
$cargo_file = $cargo_urlD . $nombre_image;
#la variable $tipoDImagen carga el tipo de extencion para validar en un condional
$tipoDImagen = pathinfo($cargo_file,PATHINFO_EXTENSION);
#la variable $tamañoImagen tendra la propiedad del archivo o imagen de su tamaño 
$tamañoImagen=$_FILES["imagefilea"]["size"];
/* Inicio Validacion*/
 // Verifico el formato que asepto para el archhivo que quiero subir
if(($tipoDImagen != "jpg" && $tipoDImagen != "png" && $tipoDImagen != "jpeg" && $tipoDImagen != "gif" ) and $tamañoImagen>0) {
				$errors[]= "<p>Lo sentimos, sólo se permiten archivos JPG , JPEG, PNG y GIF.</p>";
}else if ($tamañoImagen > 10048576) {#1048576 byte=1MB Valido el tamaño de la imagen
	$errors[]= "<p>Lo sentimos, pero el archivo es demasiado grande. Selecciona logo de menos de 8MB</p>";
}  else{
	/* Fin Validacion*/
	// si el tamaño es mayor a 0
	if ($tamañoImagen>0){
	#Muevo el archivo imagefilea a la url $cargo_file
		move_uploaded_file($_FILES["imagefilea"]["tmp_name"], $cargo_file);
		#la variable $img_Aactualizar contendra el lugar donde se guardara el registro = y el nombre del archivo
		$img_Aactualizar="url_img='$nombre_image' ";
}else{
#Si el tamaño es < a 0 la variable $img_Aactualizar Estara vacia
	$img_Aactualizar="";
}
#Consulta sql para guardar el nombre de la img
$sqlimg = $conexionPdo->prepare("UPDATE pm_imgweb SET $img_Aactualizar WHERE nombre_campo='background'");
#Query para insertar los valores llamo la conexion y luego la consulta sql
$queryExecute = $sqlimg->execute();/*mysqli_query($con,$sql);*/
}
endif;	
?>
<?php #query ejecutada ?>
<?php if ($queryExecute): ?>
	<img class="imgILogo" style="border-radius: 100px; width: 200px;" src="../files/logo/<?php echo $nombre_image;?>" alt="notFound">
	<br><span class="btn badge-dark ">"La imagen se actualizo exitosamente"...</span>
<?php endif; ?>
<?php #query no ejecutada ?>
<?php if (isset($errors)): ?>
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Error! </strong>
	<?php foreach ($errors as $e): ?>
		<?php echo $e; ?>
	<?php endforeach ?>
</div>
<?php endif; ?>
