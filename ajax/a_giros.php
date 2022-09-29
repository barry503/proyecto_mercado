<?php 
/***********************************
*version: 1                        *
*fecha: 12-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
require_once "../modelos/m_giros.php";

// se crea la istancia $giros
$objGiros=new Giros();


// si existe el idgiros
$idgiros=isset($_POST["idgiros"])? limpiarCadena($_POST["idgiros"]):"";

$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";

$idinstitucion=isset($_POST["idinstitucion"])? limpiarCadena($_POST["idinstitucion"]):"";


#convertir todo los string a mayusculas
 function yus($string){ $cadenamodificada = strtoupper($string); return $cadenamodificada; }
#funcion para cambiar la ñ minuscula a mayuscula Ñ 
 function uletra($string){ $trasformada =str_replace("ñ","Ñ",$string); return $trasformada; }

switch($_GET["op"]){
  case 'guardaryeditar':
  require ("../config/pdo.php");#conexion


  if(empty($idgiros)){
    // validacion de giros
    $sqlone = $conexionPdo->query("SELECT institucion_id_fk,UPPER(nombre) AS name FROM giros WHERE institucion_id_fk='$idinstitucion'")->fetchAll(PDO::  FETCH_OBJ);


    $comparar_nombre = yus(uletra($nombre));
    $comparar_nombre = strtr ($comparar_nombre, " ", "_");

    foreach ($sqlone  as $sapo):
      $nombre_base = strtr ($sapo->name, " ", "_");
    if ($nombre_base==$comparar_nombre) {
        // code...
        echo $sms = "<i class='fas fa  fa-meh-o  text-danger t-100 '></i><br><h1>el giro ya existe</h1>"; 

    }
    endforeach;
    if (isset($sms)) {
        // code...
      // echo "no registrado porque existen registros";
    }else{
      // echo "consultas exitosas";
        $respuesta=$objGiros->insertar($nombre,$idinstitucion);
        echo $respuesta ? "<i class='fas fa  fa-smile-o text-success t-100 '></i><br><h1>giro registrado</h1>" : "El giros no se pudo registrar";
      
    }
  }
    else {
          $respuesta=$objGiros->editar($idgiros,$nombre,$idinstitucion);
        echo $respuesta ? "<i class='fas fa  fa-repeat text-success t-100 '></i><br><h1>giro actualizado</h1>" : "giros no se pudo actualizar";

    }
  break;


case 'eliminar':
           $respuesta=$objGiros->eliminar($idgiros);
             echo $respuesta ? "giros eliminado" : "giros no se pudo eliminar";

  break;




    case'mostrar':
              $respuesta=$objGiros->mostrar($idgiros);
              //codificar el resultado json
             echo json_encode($respuesta); 
    break;




     case'listar':
      $respuesta=$objGiros->listar();
      // vamos a declarar un array o arreglo
       $data= Array(); 

       while($reg=$respuesta->fetch_object()){
           $data[]=array(
               "0" =>$reg->idgiros,
               "1"=>$reg->nombre_giro,
               "2" =>$reg->name_institucion,
                "3" =>'<button title="Editar el giros" class="btn btn-sm m-1 btn-warning " onclick="mostrar('.$reg->idgiros.')"><i class="fa fa-edit"></i></button>    '.'<button class="btn btn-sm m-1 btn-danger" title="Eliminar el giros por completo" onclick="eliminar('.$reg->idgiros.')"><i class="fas fa-trash"></i></button>'
              );

       }

       $results = array(
         "sEcho" =>1, //informacion para el datatables
          "iTotalRecords" =>count($data), //enviamos el total registros al datatable
           "iTotalDisplayRecords" =>count($data), //enviamos el total registros a           visualizar
           "aaData"=>$data);

       echo json_encode($results);
    break;


     case'listarVista':
      $respuesta=$objGiros->listar();
      // vamos a declarar un array o arreglo
       $data= Array(); 

       while($reg=$respuesta->fetch_object()){
           $data[]=array(
               "0" =>$reg->idgiros,
               "1"=>$reg->nombre_giro,
               "2" =>$reg->name_institucion,
               "3" =>'disabled'
              );

       }

       $results = array(
         "sEcho" =>1, //informacion para el datatables
          "iTotalRecords" =>count($data), //enviamos el total registros al datatable
           "iTotalDisplayRecords" =>count($data), //enviamos el total registros a           visualizar
           "aaData"=>$data);

       echo json_encode($results);
    break;





    

}





 ?>
