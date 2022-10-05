<?php 
/***********************************
*version: 1                        *
*fecha: 15-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
require_once "../modelos/m_puesto.php";

// se crea la istancia $puestoS
$puestoS=new Puesto();

// identificador del puesto
$idpuesto=isset($_POST['idpuesto'])? limpiarCadena($_POST['idpuesto']):"";

$idsector=isset($_POST["idsector"])? limpiarCadena($_POST["idsector"]):"";
$idinstitucion=isset($_POST["idinstitucion"])? limpiarCadena($_POST["idinstitucion"]):"";
// variables para puestos
$medida_calificacion=isset($_POST['medida_calificacion'])? limpiarCadena($_POST['medida_calificacion']):"";
$medida_compensa=isset($_POST['medida_compensa'])? limpiarCadena($_POST['medida_compensa']):"";
$medida_fondo=isset($_POST['medida_fondo'])? limpiarCadena($_POST['medida_fondo']):"";
$medida_frente=isset($_POST['medida_frente'])? limpiarCadena($_POST['medida_frente']):"";
$modulo=isset($_POST['modulo'])? limpiarCadena($_POST['modulo']):"";



switch($_GET["op"]){

        case 'guardaryeditar':
          // code...
        

          if(empty($idpuesto)){
                $respuesta=$puestoS->insertar($medida_calificacion,$medida_compensa,$medida_fondo,$medida_frente,$modulo,$idinstitucion,$idsector);
                     echo $respuesta ? "puesto registrado" : "El puesto no se pudo registrar";
            /*echo $idpuesto.' ........ '. $modulo;*/
          }
            else {
              
                  $respuesta=$puestoS->editar($idpuesto,$medida_calificacion,$medida_compensa,$medida_fondo,$medida_frente,$modulo,$idinstitucion,$idsector);
                echo $respuesta ? "puesto actualizado" : "puesto no se pudo actualizar";

            }
          break;


            case 'desactivar':
                     $respuesta=$puestoS->desactivar($idpuesto);
                       echo $respuesta ? "puesto Desactivado" : "puesto no se pudo desactivar";

            break;



            case 'activar':

                 $respuesta=$puestoS->activar($idpuesto);
                       echo $respuesta ? "puesto disponible" : "puesto no se pudo activar";

              break;




          case 'eliminar':
                     $respuesta=$puestoS->eliminar($idpuesto);
                       echo $respuesta ? "puesto eliminado" : "puesto no se pudo eliminar";

            break;




              case'mostrar':
                        $respuesta=$puestoS->mostrar($idpuesto);
                        //codificar el resultado json
                       echo json_encode($respuesta); 
              break;




          case'listar':
                $respuesta=$puestoS->listar();
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
                         "9" =>($reg->estado)?'<button title="Editar el puesto" class="btn btn-sm m-1 btn-warning " onclick="mostrar('.$reg->idpuesto.')"><i class="fas fa-pencil-alt"></i></button>    '.
             '<button title="desactivar el puesto" class="btn btn-sm m-1 btn-danger " onclick="desactivar('.$reg->idpuesto.')"><i class="fas fa-times"></i></button><br>' :'<button title="Editar el puesto inactivo" class="btn btn-sm m-1 btn-warning " onclick="mostrar('.$reg->idpuesto.')"><i class="fa fa-edit"></i></button>    '.
             '<button title="Activar el puesto" class="btn btn-sm m-1  btn-info " onclick="activar('.$reg->idpuesto.')"><i class="fas fa-check"></i></button>'.'    <button class="btn btn-sm m-1 btn-danger" title="Eliminar el puesto por completo" onclick="eliminar('.$reg->idpuesto.')"><i class="fas fa-trash"></i></button>'
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
                $respuesta=$puestoS->listar();
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
                         "9" =>'disabled'
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

                $respuesta = $puestoS->selectInstituciones();
               while($reg = $respuesta->fetch_object()){

                echo '<option value="' . $reg->id .'">'. $reg->nombre.'</option>';

               }

                break;



                case "selectSector":
                $param = $_GET['inst'];

                  $respuesta = $puestoS->selectSector($param);
                 while($reg = $respuesta->fetch_object()){

                  echo '<option value="' . $reg->id .'">'. $reg->nombre.'</option>';

                 }

                  break;

                  case 'guardarVarios':

                  $prefijo_modulo = $_POST['prefijo_modulo'];
                  $rango_inicial = $_POST['rango_inicial'];
                  $rango_final = $_POST['rango_final'];

                  foreach( range($rango_inicial, $rango_final) as $numero ) {
                       // echo "<li>Número: ". $numero ."</li>";

                       $modulo= $prefijo_modulo.$numero;

                    $respuesta=$puestoS->saveVariosP($medida_calificacion,$medida_fondo,$medida_frente,$modulo,$idinstitucion,$idsector);
                  }
                    
            
                  echo $respuesta ? "se registraron los puestos desde:".$rango_inicial." hasta:".$rango_final."<br>" : "No se pueden registrar";
                  break;                  


}





 ?>
