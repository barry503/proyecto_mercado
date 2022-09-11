<?php 
/***********************************
*version: 1                        *
*fecha: 06-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
require_once "../modelos/m_permiso.php";

// se crea la istancia $permiso
$permiso=new Permiso();


// si existe el idpermiso
$idpermiso=isset($_POST["idpermiso"])? limpiarCadena($_POST["idpermiso"]):"";

$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";



switch($_GET["op"]){
  case 'guardaryeditar':
       if(empty($idpermiso)){
             $respuesta=$permiso->insertar($nombre);
             echo $respuesta ? "Permiso registrado" : "El permiso no se pudo registrar";
       }
         else {
               $respuesta=$permiso->editar($idpermiso,$nombre);
             echo $respuesta ? "Permiso actualizado" : "Permiso no se pudo actualizar";

         }
  break;

  case 'desactivar':
           $respuesta=$permiso->desactivar($idpermiso);
             echo $respuesta ? "Permiso Desactivado" : "Permiso no se pudo desactivar";

  break;



  case 'activar':

       $respuesta=$permiso->activar($idpermiso);
             echo $respuesta ? "Permiso disponible" : "Permiso no se pudo activar";

    break;




case 'eliminar':
           $respuesta=$permiso->eliminar($idpermiso);
             echo $respuesta ? "Permiso eliminado" : "Permiso no se pudo eliminar";

  break;




    case'mostrar':
              $respuesta=$permiso->mostrar($idpermiso);
              //codificar el resultado json
             echo json_encode($respuesta); 
    break;




     case'listar':
      $respuesta=$permiso->listar();
      // vamos a declarar un array o arreglo
       $data= Array(); 

       while($reg=$respuesta->fetch_object()){
           $data[]=array(
               "0" =>($reg->condicion)?'<button title="Editar el permiso" class="btn btn-sm m-1 btn-warning " onclick="mostrar('.$reg->idpermiso.')"><i class="fas fa-pencil-alt"></i></button>    '.
             '<button title="desactivar el permiso" class="btn btn-sm m-1 btn-danger " onclick="desactivar('.$reg->idpermiso.')"><i class="fas fa-times"></i></button><br>' :'<button title="Editar el permiso inactivo" class="btn btn-sm m-1 btn-warning " onclick="mostrar('.$reg->idpermiso.')"><i class="fa fa-edit"></i></button>    '.
             '<button title="Activar el permiso" class="btn btn-sm m-1  btn-info " onclick="activar('.$reg->idpermiso.')"><i class="fas fa-check"></i></button>'.'    <button class="btn btn-sm m-1 btn-danger" title="Eliminar el permiso por completo" onclick="eliminar('.$reg->idpermiso.')"><i class="fas fa-trash"></i></button>',
               "1"=>$reg->idpermiso,
               "2" =>$reg->nombre,
                "3" =>($reg->condicion)?'<span class="label bg-green">disponible<span>': '<span class="label bg-red">inactivo<span>'
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
      $respuesta=$permiso->listar();
      // vamos a declarar un array o arreglo
       $data= Array(); 

       while($reg=$respuesta->fetch_object()){
           $data[]=array(
               "0" =>$reg->idpermiso,
               "1"=>$reg->nombre,
               "2" =>($reg->condicion)?'<span class="badge badge-success">disponible<span>': '<span class="badge badge-danger">inactivo<span>'
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
