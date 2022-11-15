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
// $puestos_id= isset($_POST["puestos_id"])? limpiarCadena($_POST["puestos_id"]):"";


switch($_GET["op"]){
  case 'guardaryeditar':
       if(empty($id)){
             $respuesta=$objRutaP->insertar($ruta_id,$_POST['puestos_id']);
             echo $respuesta ? "Se agregaron ".count($_POST['puestos_id'])."  puestos a la ruta" : " no se pudo registrar";
       }
         else {
               $respuesta=$objRutaP->editar($id,$ruta_id,$puestos_id);
             echo $respuesta ? "se modifico la ruta al puesto" : " no se pudo actualizar";

         }
  break;


case 'eliminar':
           $respuesta=$objRutaP->eliminar($id);
             echo $respuesta ? " Se elimino el pueto de la ruta" : " no se pudo eliminar";

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
                "3" =>/*'<button title="Editar" class="btn btn-sm m-1 btn-warning " onclick="mostrar('.$reg->id.')"><i class="fa fa-edit"></i></button>    '.*/'<button class="btn btn-sm m-1 btn-danger" title="Eliminar por completo" onclick="eliminar('.$reg->id.')"><i class="fas fa-trash"> Eliminar</i></button>'
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
    $param = $_GET['inst'];//parametro de la institucion
    // echo '<option  value=""></option>';
      $respuesta = $objRutaP->selectRuta($param);
     while($reg = $respuesta->fetch_object()){

      echo '<option  value="' . $reg->id .'">'. $reg->nombre.' , '.$reg->descripcion.'</option>';

     }

      break;

      case "selectPuesto":
      $param = $_GET['inst'];
      require ("../config/pdo.php");#conexion
      $valorDePuestos=1;//si hay puestos disponibles

        if ($param!="") {
           $respuesta = $objRutaP->selectPuesto($param);
                      echo '<div class="col-md-12"><h3 class="display-5"><b>Selecciona los los puestos</b></h3></div>';

          while($reg = $respuesta->fetch_object()){
           $sql= $conexionPdo->query("SELECT * FROM rutas_puestos WHERE   puestos_id='$reg->id'")->fetchAll(PDO::  FETCH_OBJ);
           
                    foreach ($sql  as $c){$dataPuestos_id = $c->puestos_id;  }#ciclo de $Consql
                    if(isset($dataPuestos_id) == ""){ $dataPuestos_id = "0"; }
                    if ($reg->id == $dataPuestos_id) {
                      // code...
                     // echo 'existen en rutas puestos';
                      $valorDePuestos=0;//todos los puestos estan asignados
                    }else{
                      $valorDePuestos=1;//si hay puestos disponibles
                     // echo '<option  value="' . $reg->id .'">'. $reg->id.' , '.$reg->modulo.'</option>';
                     // $sw= in_array($reg->idpermiso,$valores)?'checked':'';
                           // echo '<li><label> <input type="checkbox" '/*.$sw.*/.' name="puestos_id[]" value="'.$reg->id.'">'.$reg->modulo.'</label></li>';
                           echo '<div class"col-lg-4 p-5 mr-5"><label class="btn btn-outline-dark"> <input type="checkbox" '/*.$sw.*/.' name="puestos_id[]" value="'.$reg->id.'">'.$reg->modulo.'</label></div><p class="text-white">__</p>';

                           // echo '<hr class="bg-dark">'; 
                    }

          }
        }/*else{
          // echo "este el es para verificar que aqui no hay nada XDXD";
        }*/
        if ($valorDePuestos==0): echo '<div class="alert alert-warning col-lg-12"><i class="fa   fa-times text-dark "></i> No Hay Puestos Disponibles</div>'; endif;

        break;    



    

}





 ?>
