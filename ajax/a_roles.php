<?php 
/****************************************************************
Project:  proyecto_mercado                                      *
Version:  1.0 develop                                           *
Last change:  18/09/2022                                        *
Assigned to:  https://github.com/barry503                       *
Primary use:  Open Source                                       *
****************************************************************/
require_once "../modelos/m_roles.php";

// se crea la istancia $roles
$roles=new Roles();


// si existe el idroles
$idroles=isset($_POST["idroles"])? limpiarCadena($_POST["idroles"]):"";

$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";



switch($_GET["op"]){
  case 'guardaryeditar':
       if(empty($idroles)){
             $respuesta=$roles->insertar($nombre,$_POST['permiso']);
             echo $respuesta ? "rol registrado" : "El rol no se pudo registrar";
       }
         else {
               $respuesta=$roles->editar($idroles,$nombre,$_POST['permiso']);
             echo $respuesta ? "rol actualizado" : "rol no se pudo actualizar";

         }
  break;

  case 'desactivar':
           $respuesta=$roles->desactivar($idroles);
             echo $respuesta ? "rol Desactivado" : "rol no se pudo desactivar";

  break;



  case 'activar':

       $respuesta=$roles->activar($idroles);
             echo $respuesta ? "rol disponible" : "rol no se pudo activar";

    break;




case 'eliminar':
           $respuesta=$roles->eliminar($idroles);
             echo $respuesta ? "rol eliminado" : "rol no se pudo eliminar";

  break;




    case'mostrar':
              $respuesta=$roles->mostrar($idroles);
              //codificar el resultado json
             echo json_encode($respuesta); 
    break;




     case'listar':
      $respuesta=$roles->listar();
      // vamos a declarar un array o arreglo
       $data= Array(); 

       while($reg=$respuesta->fetch_object()){
           $data[]=array(
               "0" =>($reg->condicion)?'<button title="Editar el roles" class="btn btn-sm m-1 btn-warning " onclick="mostrar('.$reg->idroles.')"><i class="fas fa-pencil-alt"></i></button>    '.
             '<button title="desactivar el roles" class="btn btn-sm m-1 btn-danger " onclick="desactivar('.$reg->idroles.')"><i class="fas fa-times"></i></button><br>' :'<button title="Editar el roles inactivo" class="btn btn-sm m-1 btn-warning " onclick="mostrar('.$reg->idroles.')"><i class="fa fa-edit"></i></button>    '.
             '<button title="Activar el roles" class="btn btn-sm m-1  btn-info " onclick="activar('.$reg->idroles.')"><i class="fas fa-check"></i></button>'.'    <button class="btn btn-sm m-1 btn-danger" title="Eliminar el roles por completo" onclick="eliminar('.$reg->idroles.')"><i class="fas fa-trash"></i></button>',
               "1"=>$reg->idroles,
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
      $respuesta=$roles->listar();
      // vamos a declarar un array o arreglo
       $data= Array(); 

       while($reg=$respuesta->fetch_object()){
           $data[]=array(
               "0" =>$reg->idroles,
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



case 'permisos':
 //obtenemos todos los permisos de la tabla permisos
     $respuesta = $roles->listarpermiso();

     // Obtener los permisos asignados al usuario
     $id=$_GET['id'];

     $marcados = $roles->listarmarcados($id);
     //Declaro un array para almacenar todos los permisos marcados
     $valores=Array();

     //Almacenar los permisos asignados al usuario en el array
     while ($per = $marcados->fetch_object())
     {
        array_push($valores, $per->idpermiso);
     }
 //Mostramos la lista de permisos en la vista y si estan o no marcados
     while($reg = $respuesta->fetch_object())
     {
        $sw= in_array($reg->idpermiso,$valores)?'checked':'';

              echo '<li><label> <input type="checkbox" '.$sw.' name="permiso[]" value="'.$reg->idpermiso.'">'.$reg->nombre.'</label></li>';
              echo '<hr class="bg-dark">';
     }

  break;


    

}





 ?>
