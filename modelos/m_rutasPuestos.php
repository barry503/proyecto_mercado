<?php 
/***********************************
*version: 1                        *
*fecha: 13-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
//incluimos inicialmente la conexion ala base de datos
require '../config/conexion.php';

class RutasPuestos
{

// inplementamos nuestro constructor
	public function __construct()
	{
      


	}




 //inplementar un metodo para insertar una materia
  public function insertar($ruta_id,$puestos_id){
    foreach ($puestos_id as $key) {
        // code...
    $sql = "INSERT INTO rutas_puestos (ruta_id,puestos_id) VALUES('$ruta_id','$key')";
    $execute= ejecutarConsulta($sql);
    }
    return $execute;

  }



   //inplementar un metodo para editar registros
public function editar($id,$ruta_id,$puestos_id)
	{
         $sql = "UPDATE rutas_puestos SET ruta_id='$ruta_id',puestos_id='$puestos_id'
         WHERE id='$id' ";
             return ejecutarConsulta($sql);

	}




//inplementar un metodo para eliminar rutas
public function eliminar($id)
{
  $sql = "DELETE FROM rutas_puestos WHERE id='$id'";
    return ejecutarConsulta($sql);

}




//inplementar un metodo para mostrar  registros a modificar
public function mostrar($id)
{
	$sql= "SELECT * FROM rutas_puestos WHERE id='$id' ";
	return ejecutarConsultaSimpleFila($sql);
}



   
//inplementar un metodo para listar  registros 
public function listar()
{
	$sql="SELECT
    rp.id,
    rp.puestos_id,
    rp.ruta_id,
    CONCAT(r.nombre,',',r.descripcion) AS nombre_ruta,
    CONCAT(p.id,',',p.modulo) AS identificador_puesto

FROM
   rutas_puestos rp INNER JOIN rutas r INNER JOIN puestos p ON
    r.id = rp.ruta_id AND p.id = rp.puestos_id";
	return ejecutarConsulta($sql);

}

public function selectRuta($idinstitucion)
{
    $sql= "SELECT * FROM rutas WHERE institucion_id_fk='$idinstitucion'";
    return ejecutarConsulta($sql);
}

public function selectPuesto($idinstitucion)
{
    $sql= "SELECT * FROM puestos WHERE institucion_id_fk='$idinstitucion'";
    return ejecutarConsulta($sql);
}




// para el check de los puestos

#inplementar un metodo  para listar  los permisos marcados
/*public function listarPuestosMarcados($id){
  $sql="SELECT * FROM pm_roles_permiso WHERE id='$id'";
  return ejecutarConsulta($sql);
}
*/



}





 ?>

