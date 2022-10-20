<?php 
/***********************************
*version: 1                        *
*fecha: 20-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
//incluimos inicialmente la conexion ala base de datos
require '../config/conexion.php';

class TarifaDev
{

// inplementamos nuestro constructor
	public function __construct()
	{
      


	}




 //inplementar un metodo para insertar
  public function insertar($codigo_presup,$descripcion,$precio_unitario,$aplicafiestas,$aplicamulta,$aplicaintereses,$referencia,$vigencia,$idinstitucion)
  {
    #aplicamos formato de 2 decimales para el precio
    $precio_unitario = number_format($precio_unitario,2);
    
    $fecha_creacion = date_default_timezone_set('America/El_Salvador');
    $fecha_creacion = date("y-m-d");#fecha de creacion de la tarifa

         $sql = "INSERT INTO tarifas(
    codigo_presup,
    descripcion,
    precio_unitario,
    aplicafiestas,
    aplicamulta,
    aplicaintereses,
    referencia,
    vigencia,
    institucion_id_fk,
    fecha_creacion
)
VALUES(
    '$codigo_presup',
    '$descripcion',
    '$precio_unitario',
    '$aplicafiestas',
    '$aplicamulta',
    '$aplicaintereses',
    '$referencia',
    '$vigencia',
    '$idinstitucion',
    '$fecha_creacion')";
             return ejecutarConsulta($sql);

  }



   //inplementar un metodo para editar registros
public function editar($id,$codigo_presup,$descripcion,$precio_unitario,$aplicafiestas,$aplicamulta,$aplicaintereses,$referencia,$vigencia,$idinstitucion)
	{
        #aplicamos formato de 2 decimales para el precio
        $precio_unitario = number_format($precio_unitario,2);

         $sql = "UPDATE
    tarifas
SET
    codigo_presup = '$codigo_presup',
    descripcion = '$descripcion',
    precio_unitario = '$precio_unitario',
    aplicafiestas = '$aplicafiestas',
    aplicamulta = '$aplicamulta',
    aplicaintereses = '$aplicaintereses',
    referencia = '$referencia',
    vigencia = '$vigencia',
    institucion_id_fk = '$idinstitucion'
WHERE
    id = '$id'";
             return ejecutarConsulta($sql);

	}




//inplementar un metodo para eliminar tarifas
public function eliminar($id)
{
  $sql = "DELETE FROM tarifas WHERE id='$id'";
    return ejecutarConsulta($sql);

}




//inplementar un metodo para mostrar  registros a modificar
public function mostrar($id)
{
	$sql= "SELECT * FROM tarifas WHERE id='$id' ";
	return ejecutarConsultaSimpleFila($sql);
}



   
//inplementar un metodo para listar  registros 
public function listar()
{
	$sql="SELECT
    t.id,
    t.codigo_presup,
    t.descripcion,
    t.precio_unitario,
    t.aplicafiestas,
    t.aplicamulta,
    t.aplicaintereses,
    t.referencia,
    t.vigencia,
    t.institucion_id_fk,
    i.nombre AS name_institucion,

    t.fecha_creacion/*campo para fun validCreate()*/
FROM
    tarifas t
INNER JOIN instituciones i ON
    i.id = t.institucion_id_fk";
	return ejecutarConsulta($sql);

}



}





 ?>

