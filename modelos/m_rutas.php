<?php 
/***********************************
*version: 1                        *
*fecha: 13-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
//incluimos inicialmente la conexion ala base de datos
require '../config/conexion.php';

class Rutas
{

// inplementamos nuestro constructor
	public function __construct()
	{
      


	}




 //inplementar un metodo para insertar una materia
  public function insertar($descripcion,$nombre,$idinstitucion,$correo_usuario)
  {
         $sql = "INSERT INTO rutas (descripcion,nombre,institucion_id_fk,usuario_email_fk )
         VALUES('$descripcion','$nombre' ,'$idinstitucion','$correo_usuario')";
             return ejecutarConsulta($sql);

  }



   //inplementar un metodo para editar registros
public function editar($idrutas,$descripcion,$nombre,$idinstitucion,$correo_usuario)
	{
         $sql = "UPDATE rutas SET descripcion='$descripcion',nombre='$nombre',institucion_id_fk='$idinstitucion',usuario_email_fk='$correo_usuario'
         WHERE id='$idrutas' ";
             return ejecutarConsulta($sql);

	}




//inplementar un metodo para eliminar rutas
public function eliminar($idrutas)
{
  $sql = "DELETE FROM rutas WHERE id='$idrutas'";
    return ejecutarConsulta($sql);

}




//inplementar un metodo para eliminar rutas
public function DesasignarUsuario($idrutas)
{
  $sql = "UPDATE rutas SET usuario_email_fk= NULL  WHERE id='$idrutas'";
    return ejecutarConsulta($sql);

}


//inplementar un metodo para mostrar  registros a modificar
public function mostrar($idrutas)
{
	$sql= "SELECT * FROM rutas WHERE id='$idrutas' ";
	return ejecutarConsultaSimpleFila($sql);
}





   
//inplementar un metodo para listar  registros 
public function listar()
{
	$sql="SELECT
    r.id AS idrutas,
    r.descripcion,
    r.nombre,
    r.institucion_id_fk,
    r.usuario_email_fk,
    u.nombre AS nombre_usuario,
    u.email AS correo_usuario/*,
    i.nombre AS name_institucion*/
FROM
    /*instituciones i
    INNER JOIN*/ usuarios u RIGHT JOIN rutas r  ON
    /*i.id = r.institucion_id_fk AND*/ u.email = r.usuario_email_fk";
	return ejecutarConsulta($sql);

}

public function selectAndroid($idinstitucion)
{
    $sql= "SELECT * FROM usuarios WHERE institucion_id_fk='$idinstitucion'";
    return ejecutarConsulta($sql);
}


}





 ?>

