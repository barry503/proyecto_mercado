<?php 
/***********************************
*version: 1                        *
*fecha: 06-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
//incluimos inicialmente la conexion ala base de datos
require '../config/conexion.php';

class Permiso
{

// inplementamos nuestro constructor
	public function __construct()
	{
      


	}




 //inplementar un metodo para insertar una materia
  public function insertar($nombre)
  {
         $sql = "INSERT INTO pm_permiso (nombre)
         VALUES('$nombre')";
             return ejecutarConsulta($sql);

  }



   //inplementar un metodo para editar registros
public function editar($idpermiso,$nombre)
	{
         $sql = "UPDATE pm_permiso SET nombre='$nombre'
         WHERE idpermiso='$idpermiso' ";
             return ejecutarConsulta($sql);

	}








 //inplementar un metodo para desactivar grado
public function desactivar($idpermiso)
{
  $sql = "UPDATE pm_permiso SET condicion='0' WHERE idpermiso='$idpermiso'";
    return ejecutarConsulta($sql);

}


//inplementar un metodo para activar grado
public function activar($idpermiso)
{
  $sql = "UPDATE pm_permiso SET condicion='1' WHERE idpermiso='$idpermiso'";
    return ejecutarConsulta($sql);

}




//inplementar un metodo para eliminar permiso
public function eliminar($idpermiso)
{
  $sql = "DELETE FROM pm_permiso WHERE idpermiso='$idpermiso'";
    return ejecutarConsulta($sql);

}




//inplementar un metodo para mostrar  registros a modificar
public function mostrar($idpermiso)
{
	$sql= "SELECT * FROM pm_permiso WHERE idpermiso='$idpermiso'";
	return ejecutarConsultaSimpleFila($sql);
}








   
//inplementar un metodo para listar  registros 
public function listar()
{
	$sql="SELECT * FROM pm_permiso";
	return ejecutarConsulta($sql);

}



}






 ?>

