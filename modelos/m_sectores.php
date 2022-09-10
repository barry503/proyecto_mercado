<?php 
/***********************************
*version: 1                        *
*fecha: 06-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
//incluimos inicialmente la conexion ala base de datos
require '../config/conexion.php';

class Sector
{

// inplementamos nuestro constructor
	public function __construct()
	{
      


	}


// Metdodopara insertar
  public function insertar($nombre,$idinstitucion)
  {
         $sql = "INSERT INTO sectores (nombre,institucion_id_fk)
         VALUES('$nombre','$idinstitucion')";
             return ejecutarConsulta($sql);

  }




   //inplementar un metodo para editar registros
public function editar($id,$nombre,$idinstitucion)
	{
         $sql = "UPDATE sectores SET nombre='$nombre', institucion_id_fk='$idinstitucion'
         WHERE id='$id' ";
             return ejecutarConsulta($sql);

	}







/*
 //inplementar un metodo para desactivar grado
public function desactivar($id)
{
  $sql = "UPDATE sectores SET condicion='0' WHERE id='$id'";
    return ejecutarConsulta($sql);

}


//inplementar un metodo para activar grado
public function activar($id)
{
  $sql = "UPDATE sectores SET condicion='1' WHERE id='$id'";
    return ejecutarConsulta($sql);

}*/




//inplementar un metodo para eliminar permiso
public function eliminar($id)
{
  $sql = "DELETE FROM sectores WHERE id='$id'";
    return ejecutarConsulta($sql);

}




//inplementar un metodo para mostrar  registros a modificar
public function mostrar($id)
{
	$sql= "SELECT * FROM sectores WHERE id='$id'";
	return ejecutarConsultaSimpleFila($sql);
}








   
//inplementar un metodo para listar  registros 
public function listar()
{
	$sql="SELECT s.id, s.nombre, i.nombre as name_institucion
  FROM sectores s INNER JOIN instituciones i ON i.id=s.institucion_id_fk ";
	return ejecutarConsulta($sql);

}



public function selectInstituciones(){
  $sql="SELECT * FROM instituciones WHERE estado='1' ";
  return ejecutarConsulta($sql);
}


}






 ?>

