<?php 
/***********************************
*version: 1                        *
*fecha: 12-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
//incluimos inicialmente la conexion ala base de datos
require '../config/conexion.php';

class Giros
{

// inplementamos nuestro constructor
	public function __construct()
	{
      


	}




 //inplementar un metodo para insertar
  public function insertar($nombre,$idinstitucion)
  {
         $sql = "INSERT INTO giros (nombre,institucion_id_fk)
         VALUES('$nombre','$idinstitucion')";
             return ejecutarConsulta($sql);

  }



   //inplementar un metodo para editar registros
public function editar($idgiros,$nombre,$idinstitucion)
	{
         $sql = "UPDATE giros SET nombre='$nombre', institucion_id_fk='$idinstitucion'
         WHERE id='$idgiros' ";
             return ejecutarConsulta($sql);

	}




//inplementar un metodo para eliminar giros
public function eliminar($idgiros)
{
  $sql = "DELETE FROM giros WHERE id='$idgiros'";
    return ejecutarConsulta($sql);

}




//inplementar un metodo para mostrar  registros a modificar
public function mostrar($idgiros)
{
	$sql= "SELECT * FROM giros WHERE id='$idgiros' ";
	return ejecutarConsultaSimpleFila($sql);
}



   
//inplementar un metodo para listar  registros 
public function listar()
{
	$sql="SELECT g.id as idgiros,g.nombre as nombre_giro,
  i.nombre as name_institucion
  FROM giros g INNER JOIN  instituciones i ON i.id=g.institucion_id_fk";
	return ejecutarConsulta($sql);

}



}





 ?>

