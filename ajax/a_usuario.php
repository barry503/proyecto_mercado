<?php
session_start();
/***********************************
*version: 1                        *
*fecha: 06-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
require_once "../modelos/m_usuario.php";
 // se crea la istancia $usuario
 $usuarioPM=new PM_usuario();

#Variables para traer por metodo post
 // si existe el idusuario
 $idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";

 $nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";

 $apellido=isset($_POST["apellido"])? limpiarCadena($_POST["apellido"]):"";

 $imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";

 $usuario=isset($_POST["usuario"])? limpiarCadena($_POST["usuario"]):"";

 $clave=isset($_POST["clave"])? limpiarCadena($_POST["clave"]):"";

 $email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";

 $telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";

 $direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";

 $idinstitucion=isset($_POST["idinstitucion"])? limpiarCadena($_POST["idinstitucion"]):"";

 $idroles=isset($_POST["idroles"])? limpiarCadena($_POST["idroles"]):"";


#inicio sentencia switch en la cual se realizan op eraciones
switch($_GET["op"]){
   case 'guardaryeditar':

       if(!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
       {
            $imagen=$_POST["imagenactual"];

       }
       else {
              $ext = explode(".", $_FILES['imagen']['name']);
              if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png" )
              {
                   $imagen= round(microtime(true)) . '.' . end($ext);
                   move_uploaded_file($_FILES['imagen']['tmp_name'], "../files/usuarios/" . $imagen);
              }
       }
         
         //encripto la contraseña con el  algoritmo que contiene 64 exadecimales llamado -
         //Hash SHA256 
       //en la contraseña 

       $clavehash=hash("SHA256",$clave); 



       if(empty($idusuario)){
        
        #$random_int = random_int(1, 3000); $segundoRun = date('s');/*Un numero aleatorio se suma a un segundo*/
        #$unique_id = $random_int+$segundoRun;
             $respuesta=$usuarioPM->insertar($nombre,$apellido,$imagen,$usuario,$clavehash,$email,$telefono,$direccion,$idroles,$idinstitucion);
             echo $respuesta ? "Usuario registrado" : " No se  registraron todos los datos del usuario";
       }
         else {
               $respuesta=$usuarioPM->editar($idusuario,$nombre,$apellido,$imagen,$usuario,$clavehash,$email,$telefono,$direccion,$idroles,$idinstitucion);
                               
                require ("../config/pdo.php");
         $Consqledit = $conexionPdo->query("SELECT idusuario,imagen,CONCAT(nombre,' , ',apellido) as NombreCopleto
          FROM pm_usuario WHERE   idusuario='$idusuario'")->fetchAll(PDO::  FETCH_OBJ);/*consulta para traer el nombre completo del alumno*/

         foreach ($Consqledit  as $q){$infoA = $q->NombreCopleto; $poto = $q->imagen;  }#ciclo de $Consql
             echo $respuesta ? "<p class='text-center'><i style='font-size: 50px;' class='fa  fa-refresh text-success'></i><br>Usuario actualizado <br><img style='height: 200px;' src='../files/usuarios/".$poto."' ><br>id:".$idusuario."<br>Nombre del usuario/a:<br>".$infoA  : "Usuario no se pudo actualizar";

         }
         
  break;

  case 'desactivar':
           $respuesta=$usuarioPM->desactivar($idusuario);
             echo $respuesta ? "Usuario Desactivado" : "Usuario no se pudo desactivar";

  break;

  case 'activar':

       $respuesta=$usuarioPM->activar($idusuario);
             echo $respuesta ? "Usuario activado" : "Usuario no se pudo activar";

  break;

  case'mostrar':
              $respuesta=$usuarioPM->mostrar($idusuario);
              //codificar el resultado json
             echo json_encode($respuesta); 
  break;





    case "selectRoles":

      $respuesta = $usuarioPM->selectRoles();
     while($reg = $respuesta->fetch_object()){

      echo '<option value="' . $reg->idroles .'">'. $reg->nombre.'</option>';

     }

      break;



  case'listar':
       $respuesta=$usuarioPM->listar();
       // vamos a declarar un array o arreglo
       $data= Array();  

       while($reg=$respuesta->fetch_object()){
           $data[]=array(
               "0" =>$reg->idusuario,
               "1" =>$reg->usuario,
               "2" =>$reg->idroles_name,
               "3" =>$reg->nombre.','.$reg->apellido,
               "4" =>$reg->nombre_institucion,
               "5" =>($reg->status=='Desconectado')?'<span class="badge label badge-danger">Desconectado<span>': '<span class="badge label badge-success">En linea<span>',
               "6" =>$reg->telefono,
               "7" =>$reg->email,
               "8" =>"<img src='../files/usuarios/".$reg->imagen."' height='110px' width='110px'>",
               "9" =>$reg->direccion,
               "10" =>($reg->condicion)?'<span title="si podra logearse al sistema" class="badge label badge-success">Activo<span>': '<span title="No podra logearse al sistema" class="badge label badge-danger">Desabilitado<span>',
               "11" =>($reg->condicion)?'<button class="btn btn-sm m-1 btn-warning " onclick="mostrar('.$reg->idusuario.')"><i class="fas fa-pencil-alt"></i></button>'.'<button class="btn btn-sm m-1 btn-danger " onclick="desactivar('.$reg->idusuario.')"><i class="fas fa-times"></i></button><br>' : '<button class="btn btn-sm m-1 btn-warning " onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-edit"></i></button>'.'<button class="btn btn-sm m-1  btn-success " onclick="activar('.$reg->idusuario.')"><i class="fas fa-check"></i></button><br>'
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
         $respuesta=$usuarioPM->listar();
         // vamos a declarar un array o arreglo
         $data= Array();  

         while($reg=$respuesta->fetch_object()){
             $data[]=array(
                "0" =>$reg->idusuario,
                "1" =>$reg->usuario,
                "2" =>$reg->idroles_name,
                "3" =>$reg->nombre.','.$reg->apellido,
                "4" =>$reg->nombre_institucion,
                "5" =>($reg->status=='Desconectado')?'<span class="badge label badge-danger">Desconectado<span>': '<span class="badge label badge-success">En linea<span>',
                "6" =>$reg->telefono,
                "7" =>$reg->email,
                "8" =>"<img src='../files/usuarios/".$reg->imagen."' height='110px' width='110px'>",
                "9" =>$reg->direccion,
                "10" =>($reg->condicion)?'<span title="si podra logearse al sistema" class="badge label badge-success">Activo<span>': '<span title="No podra logearse al sistema" class="badge label badge-danger">Desabilitado<span>',
                 "11" =>'disabled'
                );

         }

         $results = array(
           "sEcho" =>1, //informacion para el datatables
            "iTotalRecords" =>count($data), //enviamos el total registros al datatable
             "iTotalDisplayRecords" =>count($data), //enviamos el total registros a           visualizar
             "aaData"=>$data);

         echo json_encode($results);
      break;


/*case 'permisos':
 //obtenemos todos los permisos de la tabla permisos
     $respuesta = $usuarioPM->listarpermiso();

     // Obtener los permisos asignados al usuario
     $id=$_GET['id'];

     $marcados = $usuarioPM->listarmarcados($id);
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

  break;*/


case 'verificar':

  $logina=limpiarCadena($_POST['logina']);
  $usuarioI=limpiarCadena($_POST['logina']);
  $clavea=limpiarCadena($_POST['clavea']);
    #metodo para estado del usuario
    $respuesta1=$usuarioPM->Inicio($usuarioI);
    //Hash SHA256 en la contraseña
      $clavehash=hash("SHA256",$clavea);
      #metodo para verificar los datos 
     $respuesta=$usuarioPM->verificar($logina, $clavehash);
     $fetch=$respuesta->fetch_object();
             if(isset($fetch))
             {
               //Declaramos las variables de session
               $_SESSION['idusuario']=$fetch->idusuario;
               $_SESSION['nombre']=$fetch->nombre;
               $_SESSION['apellido']=$fetch->apellido;
               $_SESSION['imagen']=$fetch->imagen;
               $_SESSION['email']=$fetch->email; 
               $_SESSION['telefono']=$fetch->telefono;
                $_SESSION['direccion']=$fetch->direccion;
                $_SESSION['clave']=$fetch->clave;
                $_SESSION['idroles']=$fetch->idroles;#identificador del rol
               $_SESSION['usuario']=$fetch->usuario; //login=usuario

               //ontener todos los permisos del usuario
               $marcadosPermiso = $usuarioPM->listarmarcados($fetch->idroles);
               //Declaramos el array para almacenar todos los permisos marcados
               $valoresP=array();#arreglos para marcadosPermiso
              
               #ciclo para valoresP
               while ($per = $marcadosPermiso->fetch_object())
                { array_push($valoresP, $per->idpermiso); }


               //Determinamos los accesos del usuario
                require ("../config/pdo.php");
                $SQLpermisos = $conexionPdo->query("SELECT idpermiso,nombre FROM pm_permiso")->fetchAll(PDO::  FETCH_OBJ);/*consulta para traer los permisos del usuario*/
                
                $caracter = "_"; //servira para agregar un gion  en lugar de espacion


                foreach ($SQLpermisos  as $p):
                $nombrePermiso = strtr ($p->nombre, " ", $caracter);//$p->nombre le aplicamos la funcion para renplazar los espacios por giones
                in_array($p->idpermiso,$valoresP)?$_SESSION[$nombrePermiso]=1:$_SESSION[$nombrePermiso]=0;
                endforeach;#ciclo de $SQLpermisos
                               


 
  

             }
      
                  //codificar el resultado json
             echo json_encode($fetch);

  break;

case 'salir':

 $Usalir = $_SESSION['idusuario'];
 // usuario0salir
 $respuesta=$usuarioPM->salir($Usalir);
 /*$respuesta=$usuarioPM->salir($Usalir);*/
    //codificar el resultado json
    /*echo json_encode($respuesta);*/ 
  // limpiamos las variables de session
 session_unset();
 // Destruimos la session
 session_destroy();
 //Redireccionamos al login
 // header("Location: ../index.php");
break; 




   

} #final sentencia switch

?>