<?php 
/***********************************
*version: 1                        *
*fecha: 06-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
//incluimos inicialmente la conexion ala base de datos
require '../config/conexion.php';

class Mercado
{

// inplementamos nuestro constructor
	public function __construct()
	{
      


	}



public function selectInstituciones(){
  $sql="SELECT * FROM instituciones WHERE estado='1' ";
  return ejecutarConsulta($sql);
}

public function selectSector(){
  $sql="SELECT * FROM sectores ";
  return ejecutarConsulta($sql);
}

 //inplementar un metodo para insertar una materia
  public function insertarSectores($nombre,$idinstitucion)
  {
         $sql = "INSERT INTO sectores (nombre,institucion_id_fk)
         VALUES('$nombre','$idinstitucion')";
             return ejecutarConsulta($sql);

  }

   //inplementar un metodo para editar registros
/*public function editarSectores($id,$nombre,$idinstitucion)
	{
         $sql = "UPDATE sectores SET nombre='$nombre',idinstitucion='$idinstitucion',
         WHERE id='$id' ";
             return ejecutarConsulta($sql);

	}*/


//inplementar un metodo para eliminar permiso
public function eliminarSectores($id)
{
  $sql = "DELETE FROM sectores WHERE id='$id'";
    return ejecutarConsulta($sql);

}

//inplementar un metodo para mostrar  registros a modificar
public function mostrarSectores($id)
{
	$sql= "SELECT * FROM sectores WHERE id='$id' ";
	return ejecutarConsultaSimpleFila($sql);
}

//inplementar un metodo para listar  registros 
public function listarSectores()
{
	$sql="SELECT i.id as idinstitucion, s.id as idsector, i.nombre as name_institucion,s.nombre as name_sector  FROM sectores s INNER JOIN instituciones i  ON s.id=i.id";
	return ejecutarConsulta($sql);

}



/*  ---------------------------------------------------------------------------------------------------------- */

// editarPuesto


 //inplementar un metodo para insertar una materia
  public function insertarPuesto($medida_calificacion,$medida_compensa,$medida_fondo,$medida_frente,$modulo,$idinstitucion,$idsector)
  {
         $sql = "INSERT INTO puestos (medida_calificacion,medida_compensa,medida_fondo,medida_frente,modulo,institucion_id_fk,sector_id_fk)
         VALUES('$medida_calificacion','$medida_compensa','$medida_fondo','$medida_frente','$modulo','$idinstitucion','$idsector')";
             return ejecutarConsulta($sql);
  }  

//inplementar un metodo para editar
  public function editarPuesto($idpuesto,$medida_calificacion,$medida_compensa,$medida_fondo,$medida_frente,$modulo,$idinstitucion,$idsector)
  {
         $sql = "UPDATE puestos SET  medida_calificacion='$medida_calificacion',medida_compensa='$medida_compensa',medida_fondo='$medida_fondo',medida_frente='$medida_frente',modulo='$modulo', institucion_id_fk='$idinstitucion',sector_id_fk='$idsector' WHERE id='$idpuesto'";
             return ejecutarConsulta($sql);
  } 


//inplementar un metodo para listar  registros 
public function listarPuesto()
{
    $sql="SELECT
    p.id as idpuesto,
    p.medida_calificacion,
    p.medida_compensa,
    p.medida_fondo,
    p.medida_frente,
    p.modulo,
    p.estado,
    i.id,
    i.nombre AS name_institucion,
    s.id,
    s.nombre AS name_sector
FROM
    puestos p
INNER JOIN sectores s INNER JOIN instituciones i ON
    i.id = p.institucion_id_fk AND s.id = p.sector_id_fk";
    return ejecutarConsulta($sql);

}






}






 ?>

