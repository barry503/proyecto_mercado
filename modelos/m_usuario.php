<?php 
/***********************************
*version: 1                        *
*fecha: 02-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
#incluimos inicialmente la conexion ala base de datos
require '../config/conexion.php';
#inicion de la clase 
class PM_usuario
{

# inplementamos nuestro constructor
public function __construct(){
      

}

#inplementar un metodo para insertar registros
public function insertar($nombre,$apellido,$imagen,$usuario,$clave,$email,$telefono,$direccion,$unique_id,$permisos){

    $status = 'Desconectado';
         $sql = "INSERT INTO pm_usuario (nombre,apellido,imagen,usuario,clave,email,telefono,direccion,unique_id,status)
         VALUES('$nombre','$apellido','$imagen','$usuario','$clave','$email','$telefono','$direccion','$unique_id','$status')";
             #return ejecutarConsulta($sql);
              $idusuarionew=ejecutarConsulta_retornarID($sql);



              $num_elementos=0;
              $sw=true;

              while ($num_elementos < count($permisos))
              {
                  $sql_detalle = "INSERT INTO pm_usuario_permiso(idusuario,idpermiso) VALUES('$idusuarionew', '$permisos[$num_elementos]')";
                  ejecutarConsulta($sql_detalle) or $sw=false;

              	  $num_elementos=$num_elementos + 1;
              }
              return $sw;
}


#inplementar un metodo para editar registros
public function editar($idusuario,$nombre,$apellido,$imagen,$usuario,$clave,$email,$telefono,$direccion,$permisos)
	{
         $sql = "UPDATE pm_usuario SET nombre='$nombre', apellido='$apellido', imagen='$imagen', usuario='$usuario', clave='$clave', email='$email', telefono='$telefono', direccion='$direccion' 
         WHERE idusuario='$idusuario' ";
              ejecutarConsulta($sql);

              # Eliminamos todos los permisos asignados para volverlos a registrar
              $sqldelete="DELETE FROM pm_usuario_permiso WHERE idusuario=$idusuario";
              ejecutarConsulta($sqldelete);
              $num_elementos=0;#variable para contal los elementos
              $sw=true;#valor a retornar

             #ciclo si los num_elementos es menor a la cuenta de permisos
             while ($num_elementos < count($permisos)){
              $sql_savePermisos = "INSERT INTO pm_usuario_permiso(idusuario,idpermiso)
              /*-----------------*/VALUES('$idusuario', '$permisos[$num_elementos]')";
              #ejecutamos la consulta o devolvemos falso
              ejecutarConsulta($sql_savePermisos) or $sw=false;
                  $num_elementos=$num_elementos + 1;
              }              
    
              return $sw;
}

#inplementar un metodo para desactivar usuarios
public function desactivar($idusuario){
  $sql = "UPDATE pm_usuario SET condicion='0' WHERE idusuario='$idusuario'";
    return ejecutarConsulta($sql);
}

#inplementar un metodo para activar usuarios
public function activar($idusuario){
  $sql = "UPDATE pm_usuario SET condicion='1' WHERE idusuario='$idusuario'";
    return ejecutarConsulta($sql);
}

#inplementar un metodo para mostrar  registros a modificar
public function mostrar($idusuario){
	$sql= "SELECT * FROM pm_usuario WHERE idusuario='$idusuario'";
	return ejecutarConsultaSimpleFila($sql);
}

#inplementar un metodo para listar  registros 
public function listar(){
	$sql="SELECT * FROM pm_usuario";
	return ejecutarConsulta($sql);
}

#inplementar un metodo  para listar  los permisos marcados
public function listarmarcados($idusuario){
  $sql="SELECT * FROM pm_usuario_permiso WHERE idusuario='$idusuario'";
  return ejecutarConsulta($sql);
}

#Funcion para verificar el acceso al sistema
public function verificar($usuario,$clave){
  # login = usuario
  $sql="SELECT * FROM pm_usuario WHERE usuario='$usuario' AND clave='$clave' AND condicion='1'";
  return ejecutarConsulta($sql);
}

#Funcion para Entrar al  acceso al sistema
public function Inicio($usuarioI){
  # login = usuario
  $status = "En linea";
  $sql="UPDATE pm_usuario SET status = '$status' WHERE usuario='$usuarioI'";
  return ejecutarConsulta($sql);
}

#Funcion para salir del  acceso al sistema
public function salir($Usalir){
 $status = "Desconectado";
  $sql="UPDATE pm_usuario SET status = '$status' WHERE idusuario='$Usalir'";
  return ejecutarConsulta($sql);               
}

#inplementar un metodo para listar  registros 
public function listarpermiso(){
  $sql="SELECT * FROM pm_permiso";
  return ejecutarConsulta($sql);
}

}#final de la clase






 ?>