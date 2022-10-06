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



switch($_GET["op"]){

// case de switch-------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>
  case 'guardaryeditar':
       if(empty($id)){

          // echo "consultas exitosas";
            $respuesta=$obj_contri->insertar($dui,$nit,$apellidos,$codigo_cta,$direccion,$nombres,$telefono_principal,$telefono_secundario,$institucion_id_fk,$municipio_id_fk);
            echo $respuesta ? "<i class='fas fa  fa-smile-o text-success t-100 '></i><br><h1>Contribuyente registrado</h1>" : "El Contribuyentes no se pudo registrar";      
        
       }else {
               $respuesta=$obj_contri->editar($id,$dui,$nit,$apellidos,$codigo_cta,$direccion,$nombres,$telefono_principal,$telefono_secundario,$institucion_id_fk,$municipio_id_fk);
             echo $respuesta ? "<i class='fas fa  fa-repeat text-success t-100 '></i><br><h1>Contribuyente actualizado</h1>" : "Contribuyente no se pudo actualizar";

         }
  break;


case 'eliminar':
           $respuesta=$obj_contri->eliminar($id);
             echo $respuesta ? "Contribuyente eliminado" : "el Contribuyente no se pudo eliminar";
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
               "0" =>$reg->id,
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
               "11" =>'<button title="Editar el Contribuyente" class="btn btn-sm m-1 btn-warning " onclick="mostrar('.$reg->id.')"><i class="fas fa-pencil-alt"></i></button> <button class="btn btn-sm m-1 btn-danger" title="Eliminar el Contribuyente por completo" onclick="eliminar('.$reg->id.')"><i class="fas fa-trash"></i></button>'
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
            "0" =>$reg->id,
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

// end switch -------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>

}







 ?>