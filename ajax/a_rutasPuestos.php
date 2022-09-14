<?php 
/***********************************
*version: 1                        *
*fecha: 13-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
require_once "../modelos/m_rutasPuestos.php";

// se crea la istancia $ruta
$objRutaP=new RutasPuestos();


$id= isset($_POST["id"])? limpiarCadena($_POST["id"]):"";

$ruta_id= isset($_POST["ruta_id"])? limpiarCadena($_POST["ruta_id"]):"";
$puestos_id= isset($_POST["puestos_id"])? limpiarCadena($_POST["puestos_id"]):"";


switch($_GET["op"]){
  case 'guardaryeditar':
       if(empty($id)){
             $respuesta=$objRutaP->insertar($ruta_id,$puestos_id);
             echo $respuesta ? "Se agrego una ruta al puesto" : " no se pudo registrar";
       }
         else {
               $respuesta=$objRutaP->editar($id,$ruta_id,$puestos_id);
             echo $respuesta ? "se modifico la ruta al puesto" : " no se pudo actualizar";

         }
  break;


case 'eliminar':
           $respuesta=$objRutaP->eliminar($id);
             echo $respuesta ? " eliminado" : " no se pudo eliminar";

  break;


    case'mostrar':
              $respuesta=$objRutaP->mostrar($id);
              //codificar el resultado json
             echo json_encode($respuesta); 
    break;




     case'listar':
      $respuesta=$objRutaP->listar();
      // vamos a declarar un array o arreglo
       $data= Array(); 

       while($reg=$respuesta->fetch_object()){
           $data[]=array(
             "0"=>$reg->id,
             "1"=>$reg->nombre_ruta,
             "2"=>$reg->identificador_puesto,
                "3" =>'<button title="Editar" class="btn btn-sm m-1 btn-warning " onclick="mostrar('.$reg->id.')"><i class="fa fa-edit"></i></button>    '.'<button class="btn btn-sm m-1 btn-danger" title="Eliminar por completo" onclick="eliminar('.$reg->id.')"><i class="fas fa-trash"></i></button>'
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
      $respuesta=$objRutaP->listar();
      // vamos a declarar un array o arreglo
       $data= Array(); 

       while($reg=$respuesta->fetch_object()){
           $data[]=array(
            "0"=>$reg->id,
            "1"=>$reg->nombre_ruta,
            "2"=>$reg->identificador_puesto,
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



    case "selectRuta":

      $respuesta = $objRutaP->selectRuta();
     while($reg = $respuesta->fetch_object()){

      echo '<option  value="' . $reg->id .'">'. $reg->nombre.' , '.$reg->descripcion.'</option>';

     }

      break;

      case "selectPuesto":

        $respuesta = $objRutaP->selectPuesto();
       while($reg = $respuesta->fetch_object()){

        echo '<option  value="' . $reg->id .'">'. $reg->id.' , '.$reg->modulo.'</option>';

       }

        break;    



    

}





 ?>
