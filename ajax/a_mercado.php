<?php 
/***********************************
*version: 1                        *
*fecha: 07-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
require_once "../modelos/m_mercado.php";

// se crea la istancia $mercado
$mercado=new Mercado();


// si existe el idsector
$idsector=isset($_POST["idsector"])? limpiarCadena($_POST["idsector"]):"";

$nombre_sector=isset($_POST["nombre_sector"])? limpiarCadena($_POST["nombre_sector"]):"";

$idinstitucion=isset($_POST["idinstitucion"])? limpiarCadena($_POST["idinstitucion"]):"";

$idinstitucionP=isset($_POST["idinstitucion_1"])? limpiarCadena($_POST["idinstitucion_1"]):"";

// variables para puestos
$idpuesto=isset($_POST['idpuesto'])? limpiarCadena($_POST['idpuesto']):"";
$medida_calificacion=isset($_POST['medida_calificacion'])? limpiarCadena($_POST['medida_calificacion']):"";
$medida_compensa=isset($_POST['medida_compensa'])? limpiarCadena($_POST['medida_compensa']):"";
$medida_fondo=isset($_POST['medida_fondo'])? limpiarCadena($_POST['medida_fondo']):"";
$medida_frente=isset($_POST['medida_frente'])? limpiarCadena($_POST['medida_frente']):"";
$modulo=isset($_POST['modulo'])? limpiarCadena($_POST['modulo']):"";



switch($_GET["op"]){

// case de sectores-------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>
  case 'guardaryeditarsector':
       if(empty($idsector)){
             $respuesta=$mercado->insertarSectores($nombre_sector,$idinstitucion);
             echo $respuesta ? "Sector registrado" : "El Sector no se pudo registrar";
       }
         else {
               $respuesta=$mercado->editarSectores($idsector,$nombre_sector,$idinstitucion);
             echo $respuesta ? "Sector actualizado" : "Sector no se pudo actualizar";

         }
  break;


case 'eliminarSectores':
           $respuesta=$mercado->eliminarSectores($idsector);
             echo $respuesta ? "Sector eliminado" : "el Sector no se pudo eliminar";
  break;




    case'mostrarSectores':
              $respuesta=$mercado->mostrarSectores($idsector);
              //codificar el resultado json
             echo json_encode($respuesta); 
    break;




     case'listarSectores':
      $respuesta=$mercado->listarSectores();
      // vamos a declarar un array o arreglo
       $data= Array(); 

       while($reg=$respuesta->fetch_object()){
           $data[]=array(
               "0" =>'<button class="btn btn-sm m-1 btn-danger" title="Eliminar el sector por completo" onclick="eliminar('.$reg->idsector.')"><i class="fas fa-trash"></i></button>'.$reg->idsector,
               "1"=>$reg->name_sector,
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

    $respuesta = $mercado->selectInstituciones();
   while($reg = $respuesta->fetch_object()){

    echo '<option value=' . $reg->id .'>'. $reg->nombre.'</option>';

   }

    break;



    case "selectSector":

      $respuesta = $mercado->selectSector();
     while($reg = $respuesta->fetch_object()){

      echo '<option value=' . $reg->id .'>'. $reg->nombre.'</option>';

     }

      break;    

// end case de sectores-------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>

        case 'guardaryeditarpuesto':
          // code...
        

          if(empty($idpuesto)){
                $respuesta=$mercado->insertarPuesto($medida_calificacion,$medida_compensa,$medida_fondo,$medida_frente,$modulo,$idinstitucionP,$idsector);
                     echo $respuesta ? "puesto registrado" : "El puesto no se pudo registrar";
          }
            else {
              
                  $respuesta=$mercado->editarPuesto($idpuesto,$medida_calificacion,$medida_compensa,$medida_fondo,$medida_frente,$modulo,$idinstitucionP,$idsector);
                echo $respuesta ? "puesto actualizado" : "puesto no se pudo actualizar";

            }
          break;
    

          case'listarPuesto':
                $respuesta=$mercado->listarPuesto();
                // vamos a declarar un array o arreglo
                 $data= Array(); 

                 while($reg=$respuesta->fetch_object()){
                     $data[]=array(
                         "0" =>$reg->idpuesto,
                         "1" =>$reg->modulo,
                         "2" =>$reg->medida_frente,
                         "3" =>$reg->medida_fondo,
                         "4" =>$reg->medida_calificacion,
                         "5" =>($reg->estado)?'<span class="label badge badge-success">disponible<span>': '<span class="label badge badge-danger">inactivo<span>',
                         "6" =>$reg->medida_compensa,
                         "7" =>$reg->name_institucion,
                         "8" =>$reg->name_sector,
                         "9" =>($reg->estado)?'<button title="desactivar el puesto" class="btn btn-sm m-1 btn-danger " onclick="desactivar('.$reg->idpuesto.')"><i class="fas fa-times"></i></button><br>' : '<button title="Activar el puesto" class="btn btn-sm m-1  btn-info " onclick="activar('.$reg->idpuesto.')"><i class="fas fa-check"></i></button>'.'    <button class="btn btn-sm m-1 btn-danger" title="Eliminar el puesto por completo" onclick="eliminar('.$reg->idpuesto.')"><i class="fas fa-trash"></i></button>'
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
