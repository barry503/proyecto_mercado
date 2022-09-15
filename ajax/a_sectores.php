<?php 
/***********************************
*version: 1                        *
*fecha: 07-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
require_once "../modelos/m_sectores.php";

// se crea la istancia $obj_secto
$obj_secto=new Sector();


// si existe el idsector
$idsector=isset($_POST["idsector"])? limpiarCadena($_POST["idsector"]):"";

$nombre_sector=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";

$idinstitucion=isset($_POST["idinstitucion"])? limpiarCadena($_POST["idinstitucion"]):"";


switch($_GET["op"]){

// case de sectores-------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>
  case 'guardaryeditar':
       if(empty($idsector)){
             $respuesta=$obj_secto->insertar($nombre_sector,$idinstitucion);
             echo $respuesta ? "Sector registrado" : "El Sector no se pudo registrar";
       }
         else {
               $respuesta=$obj_secto->editar($idsector,$nombre_sector,$idinstitucion);
             echo $respuesta ? "Sector actualizado" : "Sector no se pudo actualizar";

         }
  break;


case 'eliminar':
           $respuesta=$obj_secto->eliminar($idsector);
             echo $respuesta ? "Sector eliminado" : "el Sector no se pudo eliminar";
  break;




    case'mostrar':
              $respuesta=$obj_secto->mostrar($idsector);
              //codificar el resultado json
             echo json_encode($respuesta); 
    break;




     case'listar':
      $respuesta=$obj_secto->listar();
      // vamos a declarar un array o arreglo
       $data= Array(); 

       while($reg=$respuesta->fetch_object()){
           $data[]=array(
               "0" =>$reg->id,
               "1"=>$reg->nombre,
               "2" =>$reg->name_institucion,
               "3" =>'<button title="Editar el sector" class="btn btn-sm m-1 btn-warning " onclick="mostrar('.$reg->id.')"><i class="fas fa-pencil-alt"></i></button> <button class="btn btn-sm m-1 btn-danger" title="Eliminar el sector por completo" onclick="eliminar('.$reg->id.')"><i class="fas fa-trash"></i></button>'
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
      $respuesta=$obj_secto->listar();
      // vamos a declarar un array o arreglo
       $data= Array(); 

       while($reg=$respuesta->fetch_object()){
           $data[]=array(
               "0" =>$reg->id,
               "1"=>$reg->nombre,
               "2" =>$reg->name_institucion
              );

       }

       $results = array(
         "sEcho" =>1, //informacion para el datatables
          "iTotalRecords" =>count($data), //enviamos el total registros al datatable
           "iTotalDisplayRecords" =>count($data), //enviamos el total registros a           visualizar
           "aaData"=>$data);

       echo json_encode($results);
    break;

    case "selectInstituciones":

      $respuesta = $obj_secto->selectInstituciones();
     while($reg = $respuesta->fetch_object()){

      echo '<option value="' . $reg->id .'">'. $reg->nombre.'</option>';

     }

      break;



    case "selectSector":

      $respuesta = $obj_secto->selectSector();
     while($reg = $respuesta->fetch_object()){

      echo '<option value="' . $reg->id .'">'.$reg->nombre.'</option>';

     }

      break;    

// end case de sectores-------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>

}







 ?>