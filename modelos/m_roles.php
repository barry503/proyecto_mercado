<?php 
/****************************************************************
Project:  proyecto_mercado                                      *
Version:  1.0 develop                                           *
Last change:  18/09/2022                                        *
Assigned to:  https://github.com/barry503                       *
Primary use:  Open Source                                       *
****************************************************************/
//incluimos inicialmente la conexion ala base de datos
require '../config/conexion.php';

class Roles
{

// inplementamos nuestro constructor
	public function __construct()
	{
      


	}




 //inplementar un metodo para insertar una materia
  public function insertar($nombre,$permisos)
  {
         $sql = "INSERT INTO pm_roles (nombre)
         VALUES('$nombre')";
             // return ejecutarConsulta($sql);
             #return ejecutarConsulta($sql);
              $idrolnew=ejecutarConsulta_retornarID($sql);

              $num_elementos=0;
              $sw=true;

              while ($num_elementos < count($permisos))
              {
                  $sql_detalle = "INSERT INTO pm_roles_permiso(idroles,idpermiso) VALUES('$idrolnew', '$permisos[$num_elementos]')";
                  ejecutarConsulta($sql_detalle) or $sw=false;

                  $num_elementos=$num_elementos + 1;
              }
              return $sw;

  }



   //inplementar un metodo para editar registros
public function editar($idroles,$nombre,$permisos)
	{
         $sql = "UPDATE pm_roles SET nombre='$nombre'
         WHERE idroles='$idroles' ";
             // return ejecutarConsulta($sql);
         $idrolnew=ejecutarConsulta_retornarID($sql);

         $num_elementos=0;
         $sw=true;

         while ($num_elementos < count($permisos))
         {
             $sql_detalle = "INSERT INTO pm_roles_permiso(idroles,idpermiso) VALUES('$idrolnew', '$permisos[$num_elementos]')";
             ejecutarConsulta($sql_detalle) or $sw=false;

             $num_elementos=$num_elementos + 1;
         }
         return $sw;

	}








 //inplementar un metodo para desactivar grado
public function desactivar($idroles)
{
  $sql = "UPDATE pm_roles SET condicion='0' WHERE idroles='$idroles'";
    return ejecutarConsulta($sql);

}


//inplementar un metodo para activar grado
public function activar($idroles)
{
  $sql = "UPDATE pm_roles SET condicion='1' WHERE idroles='$idroles'";
    return ejecutarConsulta($sql);

}




//inplementar un metodo para eliminar permiso
public function eliminar($idroles)
{
  $sql = "DELETE FROM pm_roles WHERE idroles='$idroles'";
    return ejecutarConsulta($sql);

}




//inplementar un metodo para mostrar  registros a modificar
public function mostrar($idroles)
{
	$sql= "SELECT * FROM pm_roles WHERE idroles='$idroles'";
	return ejecutarConsultaSimpleFila($sql);
}




#inplementar un metodo  para listar  los permisos marcados
public function listarmarcados($idroles){
  $sql="SELECT * FROM pm_roles_permiso WHERE idroles='$idroles'";
  return ejecutarConsulta($sql);
}


#inplementar un metodo para listar  registros 
public function listarpermiso(){
  $sql="SELECT * FROM pm_permiso";
  return ejecutarConsulta($sql);
}




   
//inplementar un metodo para listar  registros 
public function listar()
{
	$sql="SELECT * FROM pm_roles";
	return ejecutarConsulta($sql);

}



}






 ?>

