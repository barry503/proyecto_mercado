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

#convertir todo los string a mayusculas
 function yus($string){ $cadenamodificada = strtoupper($string); return $cadenamodificada; }
#funcion para cambiar la ñ minuscula a mayuscula Ñ 
 function uletra($string){ $trasformada =str_replace("ñ","Ñ",$string); return $trasformada; }

switch($_GET["op"]){

// case de sectores-------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>
  case 'guardaryeditar':
  require ("../config/pdo.php");#conexion

       if(empty($idsector)){
        // validacion de sectors
        $sqlone = $conexionPdo->query("SELECT institucion_id_fk,UPPER(nombre) AS name FROM sectores WHERE institucion_id_fk='$idinstitucion'")->fetchAll(PDO::  FETCH_OBJ);


        $comparar_nombre = yus(uletra($nombre_sector));
        $comparar_nombre = strtr ($comparar_nombre, " ", "_");

        foreach ($sqlone  as $sapo):
          $nombre_base = strtr ($sapo->name, " ", "_");
        if ($nombre_base==$comparar_nombre) {
            // code...
            echo $sms = "<i class='fas fa  fa-meh-o  text-danger t-100 '></i><br><h1>el sector ya existe</h1>"; 

        }
        endforeach;
        if (isset($sms)) {
            // code...
          // echo "no registrado porque existen registros";
        }else{
          // echo "consultas exitosas";
            $respuesta=$obj_secto->insertar($nombre_sector,$idinstitucion);
            echo $respuesta ? "<i class='fas fa  fa-smile-o text-success t-100 '></i><br><h1>sector registrado</h1>" : "El sectors no se pudo registrar";
             /*$respuesta=$obj_secto->insertar($nombre_sector,$idinstitucion);
             echo $respuesta ? "Sector registrado" : "El Sector no se pudo registrar";*/
          
        }
        
       }
         else {
               $respuesta=$obj_secto->editar($idsector,$nombre_sector,$idinstitucion);
             echo $respuesta ? "<i class='fas fa  fa-repeat text-success t-100 '></i><br><h1>Sector actualizado</h1>" : "Sector no se pudo actualizar";

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
      echo '<option value=""></option>';
     while($reg = $respuesta->fetch_object()){

      echo '<option value="' . $reg->id .'">'. $reg->nombre.'</option>';

     }

      break;



    case "selectSector":

      $respuesta = $obj_secto->selectSector();
      echo '<option value=""></option>';
     while($reg = $respuesta->fetch_object()){

      echo '<option value="' . $reg->id .'">'.$reg->nombre.'</option>';

     }

      break;    

// end case de sectores-------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>

}







 ?>