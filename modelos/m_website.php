<?php 
/*Este es el modelo para administrar el website*/
/****************************************************************
Project:  proyecto_mercado                                      *
Version:  1.0                                                   *
Last change:  01/09/2022 La primera version de este proyecto    *
Assigned to:  https://github.com/barry503                       *
Primary use:  Open Source                                       *
****************************************************************/

//incluimos inicialmente la conexion ala base de datos
require '../config/conexion.php';
#clase para los metodos
class pm_admiweb
{

# inplementamos nuestro constructor
	public function __construct(){ /*Ejecutar dentro del constructor escribir aqui*/ }



#Metodo o funcion para insertar registros
  public function pm_insertar($nom_section,$public_data,$des_section)
  { 
    $sql = "INSERT INTO pm_admiweb (nom_section,public_data,des_section)
            VALUES('$nom_section','$public_data','$des_section')";
    return ejecutarConsulta($sql);#retornamos la consulta
  }



#inplementar un metodo para editar registros
public function pm_editar($id,$nom_section,$public_data,$des_section)
	{
         $sql = "UPDATE pm_admiweb SET nom_section='$nom_section',public_data='$public_data',des_section='$des_section' WHERE id='$id' ";
             return ejecutarConsulta($sql);#retornamos la consulta
	}



#inplementar un metodo para eliminar registros
public function pm_eliminar($id)
{
    $sql = "DELETE FROM pm_admiweb WHERE  id='$id'";
    return ejecutarConsulta($sql);#retornamos la consulta
}



#inplementar un metodo para mostrar  registros a modificar
public function pm_mostrar($id)
{
	$sql= "SELECT * FROM pm_admiweb WHERE id='$id'";
	return ejecutarConsultaSimpleFila($sql);#retornamos la consulta simple fila
}



#inplementar un metodo para listar  registros 
public function pm_listar()
{
    $sql="SELECT * FROM pm_admiweb";
	return ejecutarConsulta($sql);
}



#inplementar un metodo para activar secciones
public function pm_activar($id)
{
  $sql = "UPDATE pm_admiweb SET estado='1' WHERE id='$id'";
    return ejecutarConsulta($sql);
}



#inplementar un metodo para desactivar secciones
public function pm_desactivar($id)
{
    $sql = "UPDATE pm_admiweb SET estado='0' WHERE id='$id'";
    return ejecutarConsulta($sql);
}

//inplementar un metodo para mostrar  en js
public function mostrarinfo($nom_section)
{
    $sql= "SELECT * FROM pm_admiweb WHERE nom_section='$nom_section' ";
    return ejecutarConsulta($sql);
}

}
?>