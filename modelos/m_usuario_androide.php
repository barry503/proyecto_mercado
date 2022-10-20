<?php 
/***********************************
*version: develop                  *
*fecha: 12-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
//incluimos inicialmente la conexion ala base de datos
require '../config/conexion.php';

class UserAndroid
{

// inplementamos nuestro constructor
	public function __construct()
	{
      


	}




 //inplementar un metodo para insertar
  public function nuevo($email,$nombre,$password,$idinstitucion,$device_prefix,$alcance)
  {
         $sql = "INSERT INTO usuarios (email,nombre,password,institucion_id_fk,device_prefix,alcance)
         VALUES('$email','$nombre','$password','$idinstitucion','$device_prefix','$alcance')";
             return ejecutarConsulta($sql);

  }



   //inplementar un metodo para editar registros
public function editar($email,$nombre,$password,$idinstitucion,$device_prefix,$alcance)
	{
         $sql = "UPDATE usuarios SET nombre='$nombre',password='$password',institucion_id_fk='$idinstitucion',device_prefix='$device_prefix',alcance='$alcance'
         WHERE email='$email' ";
             return ejecutarConsulta($sql);

	}




//inplementar un metodo para eliminar usuarios
public function eliminar($email)
{
  $sql = "DELETE FROM usuarios WHERE email='$email'";
    return ejecutarConsulta($sql);

}




//inplementar un metodo para mostrar  registros a modificar
public function mostrar($email)
{
	$sql= "SELECT * FROM usuarios WHERE  email='$email' ";
	return ejecutarConsultaSimpleFila($sql);
}



   
//inplementar un metodo para listar  registros 
public function listar()
{
	$sql="SELECT
    usu.email,
    usu.nombre,
    usu.password,
    usu.institucion_id_fk AS idinstitucion,
    usu.device_prefix,
    usu.alcance,
    i.nombre AS name_institucion
FROM
    usuarios usu
INNER JOIN instituciones i ON
    i.id = usu.institucion_id_fk";
	return ejecutarConsulta($sql);

}



}





 ?>

