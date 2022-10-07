<?php 
/***********************************
*version: 1                        *
*fecha: 10-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
//incluimos inicialmente la conexion ala base de datos
require '../config/conexion.php';

class Puesto
{

// inplementamos nuestro constructor
	public function __construct()
	{
      


	}



public function selectInstituciones(){
  $sql="SELECT * FROM instituciones WHERE estado='1' ";
  return ejecutarConsulta($sql);
}

public function selectSector($idinstitucion){
  $sql="SELECT * FROM sectores WHERE institucion_id_fk='$idinstitucion'";
  return ejecutarConsulta($sql);
}

public function selectSectorAll(){
  $sql="SELECT * FROM sectores";
  return ejecutarConsulta($sql);
}




/*  ---------------------------------------------------------------------------------------------------------- */

// editarPuesto


 //inplementar un metodo para insertar una materia
  public function insertar($medida_calificacion,$medida_compensa,$medida_fondo,$medida_frente,$modulo,$idinstitucion,$idsector)
  {
         $sql = "INSERT INTO puestos (medida_calificacion,medida_compensa,medida_fondo,medida_frente,modulo,institucion_id_fk,sector_id_fk)
         VALUES('$medida_calificacion','$medida_compensa','$medida_fondo','$medida_frente','$modulo','$idinstitucion','$idsector')";
             return ejecutarConsulta($sql);
  }  



  public function saveVariosP($medida_calificacion,$medida_fondo,$medida_frente,$modulo,$idinstitucion,$idsector)
  {
    $medida_compensa = '0';
         $sql = "INSERT INTO puestos (medida_calificacion,medida_compensa,medida_fondo,medida_frente,modulo,institucion_id_fk,sector_id_fk)
         VALUES('$medida_calificacion','$medida_compensa','$medida_fondo','$medida_frente','$modulo','$idinstitucion','$idsector')";
             return ejecutarConsulta($sql);
  }  



//inplementar un metodo para editar
  public function editar($idpuesto,$medida_calificacion,$medida_compensa,$medida_fondo,$medida_frente,$modulo,$idinstitucion,$idsector)
  {
         $sql = "UPDATE puestos SET  medida_calificacion='$medida_calificacion',medida_compensa='$medida_compensa',medida_fondo='$medida_fondo',medida_frente='$medida_frente',modulo='$modulo', institucion_id_fk='$idinstitucion',sector_id_fk='$idsector' WHERE id='$idpuesto'";
             return ejecutarConsulta($sql);
  } 


//inplementar un metodo para listar  registros 
public function listar()
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






 //inplementar un metodo para desactivar grado
public function desactivar($idpuesto)
{
  $sql = "UPDATE puestos SET estado='DISPONIBLE' WHERE id='$idpuesto'";
    return ejecutarConsulta($sql);

}


//inplementar un metodo para activar grado
public function activar($idpuesto)
{
  $sql = "UPDATE puestos SET estado='OCUPADO' WHERE id='$idpuesto'";
    return ejecutarConsulta($sql);

}




//inplementar un metodo para eliminar permiso
public function eliminar($idpuesto)
{
  $sql = "DELETE FROM puestos WHERE id='$idpuesto'";
    return ejecutarConsulta($sql);

}




//inplementar un metodo para mostrar  registros a modificar
public function mostrar($idpuesto)
{
    $sql= "SELECT * FROM puestos WHERE id='$idpuesto'";
    return ejecutarConsultaSimpleFila($sql);
}



}






 ?>

