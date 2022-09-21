<?php 
/***********************************
*version: 1                        *
*fecha: 20-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
require_once "../modelos/m_tarifa.php";

// se crea la istancia $tarifa
$objTari=new Tarifa();


// si existe el id
$id=isset($_POST['id'])? limpiarCadena($_POST['id']):"";
$codigo_presup=isset($_POST['codigo_presup'])? limpiarCadena($_POST['codigo_presup']):"";
$descripcion=isset($_POST['descripcion'])? limpiarCadena($_POST['descripcion']):"";
$precio_unitario=isset($_POST['precio_unitario'])? limpiarCadena($_POST['precio_unitario']):"";
$aplicafiestas=isset($_POST['aplicafiestas'])? limpiarCadena($_POST['aplicafiestas']):"";
$aplicamulta=isset($_POST['aplicamulta'])? limpiarCadena($_POST['aplicamulta']):"";
$aplicaintereses=isset($_POST['aplicaintereses'])? limpiarCadena($_POST['aplicaintereses']):"";
$referencia=isset($_POST['referencia'])? limpiarCadena($_POST['referencia']):"";
$vigencia=isset($_POST['vigencia'])? limpiarCadena($_POST['vigencia']):"";
$idinstitucion=isset($_POST['idinstitucion'])? limpiarCadena($_POST['idinstitucion']):"";

switch($_GET["op"]){
  case 'guardaryeditar':
       if(empty($id)){
             $respuesta=$objTari->insertar($codigo_presup,$descripcion,$precio_unitario,$aplicafiestas,$aplicamulta,$aplicaintereses,$referencia,$vigencia,$idinstitucion);
             echo $respuesta ? "tarifa registrada" : "la tarifa no se pudo registrar";
       }
         else {
               $respuesta=$objTari->editar($id,$codigo_presup,$descripcion,$precio_unitario,$aplicafiestas,$aplicamulta,$aplicaintereses,$referencia,$vigencia,$idinstitucion);
             echo $respuesta ? "tarifa actualizada" : "tarifa no se pudo actualizar";

         }
  break;


case 'eliminar':
           $respuesta=$objTari->eliminar($id);
             echo $respuesta ? "tarifa eliminada" : "tarifa no se pudo eliminar";

  break;




    case'mostrar':
              $respuesta=$objTari->mostrar($id);
              //codificar el resultado json
             echo json_encode($respuesta); 
    break;




     case'listar':
      $respuesta=$objTari->listar();
      // vamos a declarar un array o arreglo
       $data= Array(); 

       while($reg=$respuesta->fetch_object()){
           $data[]=array(
               "0" =>$reg->id,
               "1"=>$reg->codigo_presup,
               "2"=>$reg->descripcion,
               "3"=>$reg->precio_unitario,
               "4"=>$reg->aplicafiestas,
               "5"=>$reg->aplicamulta,
               "6"=>$reg->aplicaintereses,
               "7"=>$reg->referencia,
               "8"=>$reg->vigencia,
               "9"=>$reg->name_institucion,
                "10" =>'<button title="Editar el tarifa" class="btn btn-sm m-1 btn-warning " onclick="mostrar('.$reg->id.')"><i class="fa fa-edit"></i></button>    '.'<button class="btn btn-sm m-1 btn-danger" title="Eliminar el tarifa por completo" onclick="eliminar('.$reg->id.')"><i class="fas fa-trash"></i></button>'
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
      $respuesta=$objTari->listar();
      // vamos a declarar un array o arreglo
       $data= Array(); 

       while($reg=$respuesta->fetch_object()){
           $data[]=array(
            "0" =>$reg->id,
            "1"=>$reg->codigo_presup,
            "2"=>$reg->descripcion,
            "3"=>$reg->precio_unitario,
            "4"=>$reg->aplicafiestas,
            "5"=>$reg->aplicamulta,
            "6"=>$reg->aplicaintereses,
            "7"=>$reg->referencia,
            "8"=>$reg->vigencia,
            "9"=>$reg->name_institucion,
               "10" =>'disabled'
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
