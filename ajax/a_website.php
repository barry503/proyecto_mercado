<?php
/****************************************************************
Project:  proyecto_mercado                                      *
Version:  1.0                                                   *
Last change:  01/09/2022 La primera version de este proyecto    *
Assigned to:  https://github.com/barry503                       *
Primary use:  Open Source                                       *
****************************************************************/
require_once "../modelos/m_website.php";


#se crea la istancia $Objeto de la clase pm_admiweb
 $Objeto=new pm_admiweb();
 #

#variables traidas de js
 $id=isset($_POST["id"])? limpiarCadena($_POST["id"]):"";
 $nom_section=isset($_POST["nom_section"])? limpiarCadena($_POST["nom_section"]):"";
 $public_data=isset($_POST["public_data"])? limpiarCadena($_POST["public_data"]):"";
 $des_section=isset($_POST["des_section"])? limpiarCadena($_POST["des_section"]):"";

#Estructura para realizar operaciones
switch($_GET["op"]){
  case 'guardaryeditar':
    if(empty($id)){
      $respuesta=$Objeto->pm_insertar($nom_section,$public_data,$des_section);
      echo $respuesta ? "Seccion de la Empresa registrado" : "El Seccion de la Empresa  no se pudo registrar";
    }else{
      $respuesta=$Objeto->pm_editar($id,$nom_section,$public_data,$des_section);
      echo $respuesta ? "Seccion de la Empresa actualizado" : "Seccion de la Empresa no se pudo actualizar";
    }
  break;
  case 'activar':
    $respuesta=$Objeto->pm_activar($id);
    echo $respuesta ? "Seccion activada" : "Seccion no se pudo activar";
  break;  
  case 'desactivar':
    $respuesta=$Objeto->pm_desactivar($id);
    echo $respuesta ? "Seccion  Desactivada" : "Seccion  no se pudo desactivar";
  break;
  case 'eliminar':
    $respuesta=$Objeto->pm_eliminar($id);
    echo $respuesta ? "Seccion de la Empresa eliminado" : "El Seccion de la Empresa no se pudo eliminar";
  break;
  case'mostrar':
    $respuesta=$Objeto->pm_mostrar($id);
    echo json_encode($respuesta);#codificar el resultado json
  break;
  case'listar':
    $respuesta=$Objeto->pm_listar();
    // vamos a declarar un array o arreglo
    $data= Array();
    while($reg=$respuesta->fetch_object()){
      $data[]=array(
        "0" =>($reg->estado)?'<button title="Editar" class="btn btn-sm m-1 btn-warning" onclick="mostrar('.$reg->id.')"><i class="fas fa-pencil-alt"></i> Editar</button>    '.
             '<button title="Desactivar la seccion" class="btn btn-sm m-1 btn-danger " onclick="desactivar('.$reg->id.')"><i class="fas fa-times"></i> Desactivar</button><br>'.$reg->id :'<button title="Editar seccion inactivo" class="btn btn-sm m-1 btn-warning " onclick="mostrar('.$reg->id.')"><i class="fa fa-edit"></i> Editar</button>    '.
             '<button title="Activar la seccion" class="btn btn-sm m-1  btn-success " onclick="activar('.$reg->id.')"><i class="fas fa-check"></i> Activar</button>'.'    <button class="btn btn-sm m-1 btn-danger" title="eliminar al seccion por completo" onclick="eliminar('.$reg->id.')"><i class="fas fa-trash"></i> Eliminar</button><br>'.$reg->id,
               "1" =>$reg->nom_section,
               "2" =>$reg->public_data,
               "3" =>$reg->des_section,
               "4" =>($reg->estado)?'<span class="label bg-green">activa<span>': '<span class="label bg-red">Desactivada<span>',
               "5" =>$reg->date_create
      );
    }
       $results = array(
         "sEcho" =>1, //informacion para el datatables
          "iTotalRecords" =>count($data), //enviamos el total registros al datatable
           "iTotalDisplayRecords" =>count($data), //enviamos el total registros a           visualizar
           "aaData"=>$data);

       echo json_encode($results);
  break;

    case'rtData':
    $nom_section = $_GET['nom'];
              $respuesta=$Objeto->mostrarinfo($nom_section);
              while($r = $respuesta->fetch_object()){
                // echo '<span>'.$r->nombre.'</span>';
                echo $r->public_data;

              }
    break;

}


?>