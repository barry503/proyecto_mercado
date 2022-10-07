<?php 
/***********************************
*version: 1                        *
*fecha: 04-10-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
//incluimos inicialmente la conexion ala base de datos
require '../config/conexion.php';

class Contribuyente
{

// inplementamos nuestro constructor
	public function __construct()
	{
      


	}




 //inplementar un metodo para insertar una materia
  public function insertar($dui,$nit,$apellidos,$codigo_cta,$direccion,$nombres,$telefono_principal,$telefono_secundario,$institucion_id_fk,$municipio_id_fk)
  {
         $sql = "INSERT INTO contribuyentes (dui,nit,apellidos,codigo_cta,direccion,nombres,telefono_principal,telefono_secundario,institucion_id_fk,municipio_id_fk)
         VALUES('$dui','$nit','$apellidos','$codigo_cta','$direccion','$nombres','$telefono_principal','$telefono_secundario','$institucion_id_fk','$municipio_id_fk')";
             return ejecutarConsulta($sql);

  }



   //inplementar un metodo para editar registros
public function editar($id,$dui,$nit,$apellidos,$codigo_cta,$direccion,$nombres,$telefono_principal,$telefono_secundario,$institucion_id_fk,$municipio_id_fk)
	{
         $sql = "UPDATE contribuyentes SET dui='$dui',nit='$nit',apellidos='$apellidos',codigo_cta='$codigo_cta',direccion='$direccion',nombres='$nombres',telefono_principal='$telefono_principal',telefono_secundario='$telefono_secundario',institucion_id_fk='$institucion_id_fk',municipio_id_fk='$municipio_id_fk' WHERE id='$id' ";
             return ejecutarConsulta($sql);

	}




//inplementar un metodo para eliminar Contribuyente
public function eliminar($id)
{
  $sql = "DELETE FROM contribuyentes WHERE id='$id'";
    return ejecutarConsulta($sql);

}




//inplementar un metodo para mostrar  registros a modificar
public function mostrar($id)
{
	$sql= "SELECT * FROM contribuyentes WHERE id='$id'";
	return ejecutarConsultaSimpleFila($sql);
}


public function selectMunicipio(){
  $sql="SELECT * FROM municipios ";
  return ejecutarConsulta($sql);
}

   
//inplementar un metodo para listar  registros 
public function listar()
{
	$sql="SELECT
    c.*,
    m.municipio_departamento AS name_municipio,
    m.id,
    i.id,
    i.nombre AS name_institucion
FROM
    contribuyentes c
INNER JOIN municipios m INNER JOIN instituciones i ON
    c.institucion_id_fk = i.id AND c.municipio_id_fk = m.id";
	return ejecutarConsulta($sql);

}



public function selectPuestoXsector($idsector)
{
    $sql= "SELECT * FROM puestos WHERE sector_id_fk='$idsector' AND estado='DISPONIBLE'";
    return ejecutarConsulta($sql);
}




public function informacion_puesto($id)
{
    $sql= "SELECT * FROM puestos WHERE  id='$id'";
    return ejecutarConsulta($sql);
}



}






 ?>

