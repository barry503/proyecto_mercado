<?php 
/***********************************
*version: 1                        *
*fecha: 13-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
require_once "../modelos/m_rutas.php";

// se crea la istancia $ruta
$objRuta=new Rutas();


$idrutas= isset($_POST["idrutas"])? limpiarCadena($_POST["idrutas"]):"";

$descripcion= isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$nombre= isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$idinstitucion= isset($_POST["idinstitucion"])? limpiarCadena($_POST["idinstitucion"]):"";
$correo_usuario= isset($_POST["correo_usuario"])? limpiarCadena($_POST["correo_usuario"]):"";

switch($_GET["op"]){
  case 'guardaryeditar':
       if(empty($idrutas)){
             $respuesta=$objRuta->insertar($descripcion,$nombre,$idinstitucion,$correo_usuario);
             echo $respuesta ? "ruta registrado" : "El ruta no se pudo registrar";
       }
         else {
               $respuesta=$objRuta->editar($idrutas,$descripcion,$nombre,$idinstitucion,$correo_usuario);
             echo $respuesta ? "ruta actualizado" : "ruta no se pudo actualizar";

         }
  break;


case 'eliminar':
           $respuesta=$objRuta->eliminar($idrutas);
             echo $respuesta ? "ruta eliminado" : "ruta no se pudo eliminar";

  break;




    case'mostrar':
              $respuesta=$objRuta->mostrar($idrutas);
              //codificar el resultado json
             echo json_encode($respuesta); 
    break;




     case'listar':
      $respuesta=$objRuta->listar();
      // vamos a declarar un array o arreglo
       $data= Array(); 

       while($reg=$respuesta->fetch_object()){
           $data[]=array(
             "0"=>$reg->idrutas,
             "1"=>$reg->descripcion,
             "2"=>$reg->nombre,
             "3"=>' '.$reg->nombre_usuario.','.$reg->correo_usuario,
             "4"=>$reg->name_institucion,
                "5" =>'<button title="Editar el ruta" class="btn btn-sm m-1 btn-warning " onclick="mostrar('.$reg->idrutas.')"><i class="fa fa-edit"></i></button>    '.'<button class="btn btn-sm m-1 btn-danger" title="Eliminar el ruta por completo" onclick="eliminar('.$reg->idrutas.')"><i class="fas fa-trash"></i></button>'
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
      $respuesta=$objRuta->listar();
      // vamos a declarar un array o arreglo
       $data= Array(); 

       while($reg=$respuesta->fetch_object()){
           $data[]=array(
            "0"=>$reg->idrutas,
            "1"=>$reg->descripcion,
            "2"=>$reg->nombre,
            "3"=>' '.$reg->nombre_usuario.','.$reg->correo_usuario,
            "4"=>$reg->name_institucion,
               "5" =>'disabled'
              );

       }

       $results = array(
         "sEcho" =>1, //informacion para el datatables
          "iTotalRecords" =>count($data), //enviamos el total registros al datatable
           "iTotalDisplayRecords" =>count($data), //enviamos el total registros a           visualizar
           "aaData"=>$data);

       echo json_encode($results);
    break;



    case "selectAndroid":

      $respuesta = $objRuta->selectAndroid();
     while($reg = $respuesta->fetch_object()){

      echo '<option title="' . $reg->email .'" value="' . $reg->email .'">'. $reg->email.' , '.$reg->nombre.'</option>';

     }

      break;    


    

}





 ?>
