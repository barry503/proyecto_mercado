<?php 
/***********************************
*version: 1                        *
*fecha: 05-10-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
require_once "../modelos/m_contribuyente.php";

// se crea la istancia $obj_contri
$obj_contri=new Contribuyente();


// si existe el id
$id =isset($_POST["id"])? limpiarCadena($_POST["id"]):"";
$dui =isset($_POST["dui"])? limpiarCadena($_POST["dui"]):"";
$nit =isset($_POST["nit"])? limpiarCadena($_POST["nit"]):"";
$apellidos =isset($_POST["apellidos"])? limpiarCadena($_POST["apellidos"]):"";
$codigo_cta =isset($_POST["codigo_cta"])? limpiarCadena($_POST["codigo_cta"]):"";

$direccion =isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$nombres =isset($_POST["nombres"])? limpiarCadena($_POST["nombres"]):"";
$telefono_principal =isset($_POST["telefono_principal"])? limpiarCadena($_POST["telefono_principal"]):"";
$telefono_secundario =isset($_POST["telefono_secundario"])? limpiarCadena($_POST["telefono_secundario"]):"";
$institucion_id_fk =isset($_POST["institucion_id_fk"])? limpiarCadena($_POST["institucion_id_fk"]):"";
$municipio_id_fk =isset($_POST["municipio_id_fk"])? limpiarCadena($_POST["municipio_id_fk"]):"";

$idgiros =isset($_POST['idgiros'])? limpiarCadena($_POST['idgiros']):"";
$idtarifa =isset($_POST['idtarifa'])? limpiarCadena($_POST['idtarifa']):"";#contiene el codigo_presup  codigo prsupuestario

$fecha_ingreso =isset($_POST["fecha_ingreso"])? limpiarCadena($_POST["fecha_ingreso"]):"";
$observaciones =isset($_POST["observaciones"])? limpiarCadena($_POST["observaciones"]):"";
 
$puesto =isset($_POST["puesto"])? limpiarCadena($_POST["puesto"]):"";#contiene el idpuesto

switch($_GET["op"]){

// case de switch-------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>
  case 'guardaryeditar':
       if(empty($id)){

          // echo "consultas exitosas";
            $contrib_id_fk=$obj_contri->insertar($dui,$nit,$apellidos,$codigo_cta,$direccion,$nombres,$telefono_principal,$telefono_secundario,$institucion_id_fk,$municipio_id_fk);

            // echo $contrib_id_fk;
            if ($contrib_id_fk) {

              echo $contrib_id_fk ? "<i class='fas fa  fa-smile-o text-success t-100 '></i><br><h1>Se registro el Contribuyente</h1>" : "El Contribuyentes no se pudo registrar";
              $codigo_presup= $idtarifa;
              $fecha_egreso="0000-00-00";
              // $fecha_ingreso="0000-00-00";
              $ultimo_pago="0000-00-00";
              $giro_id_fk= $idgiros;
              $puesto_egreso_fk = $puesto;
              $licencia=0;
              $codigo_licencia=0;
              
              $puesto_id_fk = $puesto;

              $respuesta=$obj_contri->Arrendar($puesto_id_fk);
              echo $respuesta ? "puesto arrendado <br>" : "no"; 

            $respuesta=$obj_contri->insertarAsignacion($codigo_presup,$contrib_id_fk,$fecha_egreso,$fecha_ingreso,$ultimo_pago,$institucion_id_fk,$puesto_id_fk,$observaciones,$giro_id_fk,$puesto_egreso_fk,$licencia,$codigo_licencia);
            echo $respuesta ? "<br><h4>Se relizo una asignacion</h4>" : "no se pudo registrar la asignacion"; 
            }
            

        
       }else {
               $respuesta=$obj_contri->editar($id,$dui,$nit,$apellidos,$codigo_cta,$direccion,$nombres,$telefono_principal,$telefono_secundario,$institucion_id_fk,$municipio_id_fk);
             echo $respuesta ? "<i class='fas fa  fa-repeat text-success t-100 '></i><br><h1>Contribuyente actualizado</h1>" : "Contribuyente no se pudo actualizar";

         }
  break;


case 'eliminar':
           $respuesta=$obj_contri->eliminar($id);
             echo $respuesta ? "Contribuyente eliminado" : "el Contribuyente no se pudo eliminar";
             $respuesta=$obj_contri->Disponible($puesto_id_fk);
             echo $respuesta ? "el puesto volvio a estar Disponible<br>" : "no"; 

  break;




    case'mostrar':
              $respuesta=$obj_contri->mostrar($id);
              //codificar el resultado json
             echo json_encode($respuesta); 
    break;




     case'listar':
      $respuesta=$obj_contri->listar();
      // vamos a declarar un array o arreglo
       $data= Array(); 

       while($reg=$respuesta->fetch_object()){
           $data[]=array(
               "0" =>$reg->idcontribuyente,
               "1" =>$reg->dui,
               "2" =>$reg->nit,
               "3" =>$reg->apellidos,
               "4" =>$reg->nombres,
               "5" =>$reg->codigo_cta,
               "6" =>$reg->direccion,
               "7" =>$reg->telefono_principal,
               "8" =>$reg->telefono_secundario,
               "9" =>$reg->name_institucion,
               "10" =>$reg->name_municipio,
               "11" =>'<button title="Editar el Contribuyente" class="btn btn-sm m-1 btn-warning " onclick="mostrar('.$reg->idcontribuyente.')"><i class="fas fa-pencil-alt"></i></button> <button class="btn btn-sm m-1 btn-danger" title="Eliminar el Contribuyente por completo" onclick="eliminar('.$reg->idcontribuyente.')"><i class="fas fa-trash"></i></button>'
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
      $respuesta=$obj_contri->listar();
      // vamos a declarar un array o arreglo
       $data= Array(); 

       while($reg=$respuesta->fetch_object()){
           $data[]=array(
            "0" =>$reg->idcontribuyente,
            "1" =>$reg->dui,
            "2" =>$reg->nit,
            "3" =>$reg->apellidos,
            "4" =>$reg->codigo_cta,
            "5" =>$reg->direccion,
            "6" =>$reg->nombres,
            "7" =>$reg->telefono_principal,
            "8" =>$reg->telefono_secundario,
            "9" =>$reg->name_institucion,
            "10" =>$reg->name_municipio
              );

       }

       $results = array(
         "sEcho" =>1, //informacion para el datatables
          "iTotalRecords" =>count($data), //enviamos el total registros al datatable
           "iTotalDisplayRecords" =>count($data), //enviamos el total registros a           visualizar
           "aaData"=>$data);

       echo json_encode($results);
    break;
 
    case "selectMunicipio":

      $respuesta = $obj_contri->selectMunicipio();
     while($reg = $respuesta->fetch_object()){

      echo '<option value="' . $reg->id .'">'.$reg->municipio_departamento.'</option>';

     }

      break;    

      case "selectPuesto":
      $sect = $_GET['sect'];
        $respuesta = $obj_contri->selectPuestoXsector($sect);
       while($reg = $respuesta->fetch_object()){

        echo '<option  value="' . $reg->id .'">'.$reg->modulo.'</option>';

       }

        break;

        case "informacion_puesto":
        $resp = $_GET['id'];
          $respuesta = $obj_contri->informacion_puesto($resp);
         while($reg = $respuesta->fetch_object()){
           // echo '<input type"hidden" value="'.$reg->id.'" name="idpuuesto">'; bug asimilado sin inportancia
          echo '<h4><b>ID:</b>'.$reg->id.'</h4> ';
          echo '<h4><b>Modulo:</b>'.$reg->modulo.'</h4> ';
          echo '<h4><b>Medida Frente:</b>'.$reg->medida_frente.'</h4> ';
          echo '<h4><b>Medida Fondo:</b>'.$reg->medida_fondo.'</h4> ';
          echo '<h4><b>Medida Calificacion:</b>'.$reg->medida_calificacion.'</h4>';
         }

          break;


          
          

          case "selectGiros":

            $respuesta = $obj_contri->selectGiros($_GET['inst']);
           while($reg = $respuesta->fetch_object()){

            echo '<option value="' . $reg->id .'">'.$reg->nombre.'</option>';

           }

            break; 

            case "selectTarifa":

              $respuesta = $obj_contri->selectTarifa($_GET['inst']);
             while($reg = $respuesta->fetch_object()){

              echo '<option value="' . $reg->codigo_presup .'">'.$reg->codigo_presup.'-$'.$reg->precio_unitario.'</option>';

             }

              break; 
// end switch -------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>

}







 ?>