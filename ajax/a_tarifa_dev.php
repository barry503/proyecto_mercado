<?php 
/***********************************
*version: 1                        *
*fecha: 20-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
require_once "../modelos/m_tarifa_dev.php";

// se crea la istancia $tarifa
$objTari=new TarifaDev();


// si existe el id
$id=isset($_POST['id'])? limpiarCadena($_POST['id']):"";
$codigo_presup=isset($_POST['codigo_presup'])? limpiarCadena($_POST['codigo_presup']):"";#varible para editar
$descripcion=isset($_POST['descripcion'])? limpiarCadena($_POST['descripcion']):"";
$precio_unitario=isset($_POST['precio_unitario'])? limpiarCadena($_POST['precio_unitario']):"";
$aplicafiestas=isset($_POST['aplicafiestas'])? limpiarCadena($_POST['aplicafiestas']):"";
$aplicamulta=isset($_POST['aplicamulta'])? limpiarCadena($_POST['aplicamulta']):"";
$aplicaintereses=isset($_POST['aplicaintereses'])? limpiarCadena($_POST['aplicaintereses']):"";
$referencia=isset($_POST['referencia'])? limpiarCadena($_POST['referencia']):"";
$vigencia=isset($_POST['vigencia'])? limpiarCadena($_POST['vigencia']):"";
$idinstitucion=isset($_POST['idinstitucion'])? limpiarCadena($_POST['idinstitucion']):"";

switch($_GET["op"]){
  case 'guardaryeditar':
        require ("../config/pdo.php");#conexion

  #validacion para idinstitucion
  if (!empty($_POST['suplenteIdinstitucion'])) {
    $idinstitucion = isset($_POST['suplenteIdinstitucion'])? limpiarCadena($_POST['suplenteIdinstitucion']):"";
  }
  #validacion para las tarifas
  if (empty($aplicafiestas) ) { $aplicafiestas="0"; }
 if(empty($aplicamulta)){   $aplicamulta="0"; }
 if(empty($aplicaintereses)){  $aplicaintereses="0"; }

       if(empty($id)){
        // si existe un suplente que le asigne un valor a la variable
         // validacion para codigo_presup
        

        // consulta para adjudicar valor

        $sqlCuentaT = $conexionPdo->query("SELECT COUNT(*) AS cuenta FROM tarifas WHERE   left(codigo_presup, 8)= '$codigo_presup'")->fetchAll(PDO::  FETCH_OBJ);
        foreach ($sqlCuentaT  as $t):  $cuentT = $t->cuenta; endforeach;
        if ($cuentT <= 9){
          $cuentT= $cuentT+1;
          $codigo_presup = $codigo_presup."0".$cuentT;
        }else{
          $cuentT= $cuentT+1;
          $codigo_presup = $codigo_presup.$cuentT;
        }
        /*echo $codigo_presup;#para pruebas */
        
             $respuesta=$objTari->insertar($codigo_presup,$descripcion,$precio_unitario,$aplicafiestas,$aplicamulta,$aplicaintereses,$referencia,$vigencia,$idinstitucion);
             echo $respuesta ? "tarifa registrada" : "la tarifa no se pudo registrar";
       }
         else {

          if (!empty($_POST['reforma']) == "SI") {#si existe una reforma

                      $sqlDate = $conexionPdo->query("SELECT vigencia FROM tarifas WHERE   id= '$id' ")->fetchAll(PDO::  FETCH_OBJ);

                      foreach ($sqlDate  as $t):  $ultimaF = $t->vigencia; endforeach;

                      if($vigencia <= $ultimaF){
                        echo "<i class='fa fa- fa-warning text-dark t-100 bg-warning'></i><br><h1>La vigencia es la misma o menor a la vigencia actual <br> por favor ingresa una fecha posterior</h1>";
                        // echo $_POST['reforma'];
                      }else {
                        $respuesta=$objTari->insertar($codigo_presup,$descripcion,$precio_unitario,$aplicafiestas,$aplicamulta,$aplicaintereses,$referencia,$vigencia,$idinstitucion);
                        echo $respuesta ? "<i class='fa fa  fa-calendar text-success t-100 bg-dark'></i><br><h1>tarifa reformada</h1>" : "la tarifa no se pudo reformar";
                      }


                    } else if (empty($_POST['reforma'])) {#sino existe una reforma
                      // code...
                        $respuesta=$objTari->editar($id,$codigo_presup,$descripcion,$precio_unitario,$aplicafiestas,$aplicamulta,$aplicaintereses,$referencia,$vigencia,$idinstitucion);
                      echo $respuesta ? "<i class='fa fa  fa-check-square text-success t-100 bg-dark'></i><br><h1>tarifa actualizada</h1>" : "tarifa no se pudo actualizar";



                    } 

          
               

         }


  break;


case 'eliminar':
           $respuesta=$objTari->eliminar($id);
             echo $respuesta ? "tarifa eliminada" : "tarifa no se pudo eliminar";

  break;




    case'mostrar':
              $respuesta=$objTari->mostrar($id);
              //codificar el resultado json
             echo json_encode($respuesta); 
    break;




     case'listar':
      $respuesta=$objTari->listar();
      // vamos a declarar un array o arreglo
       $data= Array(); 

       while($reg=$respuesta->fetch_object()){
           $data[]=array(
               "0" =>$reg->id,
               "1"=>$reg->codigo_presup,
               "2"=>$reg->descripcion,
               "3"=>$reg->precio_unitario,
               "4"=>($reg->aplicafiestas) ? '<p class="badge badge-info">SI</p>':'<p class="badge badge-danger">NO</p>',
               "5"=>($reg->aplicamulta) ? '<p class="badge badge-info">SI</p>':'<p class="badge badge-danger">NO</p>',
               "6"=>($reg->aplicaintereses) ? '<p class="badge badge-info">SI</p>':'<p class="badge badge-danger">NO</p>',
               "7"=>$reg->referencia,
               "8"=>$reg->vigencia,
               "9"=>$reg->name_institucion,
                "10" =>'<button title="Editar el tarifa" class="btn btn-sm m-1 btn-warning " onclick="mostrar('.$reg->id.',false)"><i class="fa fa-edit">Editar</i></button>    '.'<button class="btn btn-sm m-1 btn-danger" title="Eliminar el tarifa por completo" onclick="eliminar('.$reg->id.')"><i class="fas fa-trash">Borrar</i></button>'.'<button class="btn btn-sm m-1 btn-info" title="reformar" onclick="mostrar('.$reg->id.',true)"><i class="fas fa-calendar"> Reformar</i></button>'
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
      $respuesta=$objTari->listar();
      // vamos a declarar un array o arreglo
       $data= Array(); 

       while($reg=$respuesta->fetch_object()){
           $data[]=array(
            "0" =>$reg->id,
            "1"=>$reg->codigo_presup,
            "2"=>$reg->descripcion,
            "3"=>$reg->precio_unitario,
            "4"=>$reg->aplicafiestas,
            "5"=>$reg->aplicamulta,
            "6"=>$reg->aplicaintereses,
            "7"=>$reg->referencia,
            "8"=>$reg->vigencia,
            "9"=>$reg->name_institucion,
               "10" =>'disabled'
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
