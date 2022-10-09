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




 //inplementar un metodo para insertar
  public function insertar($dui,$nit,$apellidos,$codigo_cta,$direccion,$nombres,$telefono_principal,$telefono_secundario,$institucion_id_fk,$municipio_id_fk)
  {
         $sql = "INSERT INTO contribuyentes (dui,nit,apellidos,codigo_cta,direccion,nombres,telefono_principal,telefono_secundario,institucion_id_fk,municipio_id_fk)
         VALUES('$dui','$nit','$apellidos','$codigo_cta','$direccion','$nombres','$telefono_principal','$telefono_secundario','$institucion_id_fk','$municipio_id_fk')";
             return ejecutarConsulta_retornarID($sql);

  }

  //inplementar un metodo para insertar
   public function insertarAsignacion($codigo_presup,$contrib_id_fk,$fecha_egreso,$fecha_ingreso,$ultimo_pago,$institucion_id_fk,$puesto_id_fk,$observaciones,$giro_id_fk,$puesto_egreso_fk,$licencia,$codigo_licencia)
   {
          $sql = "INSERT INTO asignaciones (codigo_presup,contrib_id_fk,fecha_egreso,fecha_ingreso,ultimo_pago,institucion_id_fk,puesto_id_fk,observaciones,giro_id_fk,puesto_egreso_fk,licencia,codigo_licencia)
          VALUES('$codigo_presup','$contrib_id_fk','$fecha_egreso','$fecha_ingreso','$ultimo_pago','$institucion_id_fk','$puesto_id_fk','$observaciones','$giro_id_fk','$puesto_egreso_fk','$licencia','$codigo_licencia')";

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

//select municipios
public function selectMunicipio(){
  $sql="SELECT * FROM municipios ";
  return ejecutarConsulta($sql);
}

   
//inplementar un metodo para listar  registros 
public function listar()
{
	$sql="SELECT
    c.*,
    c.id as idcontribuyente,
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



public function selectGiros($id)
{
    $sql= "SELECT * FROM giros WHERE  institucion_id_fk='$id'";
    return ejecutarConsulta($sql);
}


public function selectTarifa($id)
{
    $sql= "SELECT DISTINCT  codigo_presup, precio_unitario FROM tarifas WHERE  institucion_id_fk='$id'";
    return ejecutarConsulta($sql);
}




}






 ?>

