<?php
session_start();
/***********************************
*version: 1                        *
*fecha: 02-09-2022                 *
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
        
        $random_int = random_int(1, 3000); $segundoRun = date('s');/*Un numero aleatorio se suma a un segundo*/
        $unique_id = $random_int+$segundoRun;
             $rspta=$usuarioPM->insertar($nombre,$apellido,$imagen,$usuario,$clavehash,$email,$telefono,$direccion,$unique_id,$_POST['permiso']);
             echo $rspta ? "Usuario registrado" : " No se  registraron todos los datos del usuario";
       }
         else {
               $rspta=$usuarioPM->editar($idusuario,$nombre,$apellido,$imagen,$usuario,$clavehash,$email,$telefono,$direccion,$_POST["permiso"]);
                $rspta=$usuarioPM->agregarPgrado($idusuario,$_POST["permisogrado"]);
                $rspta=$usuarioPM->agregarPmateria($idusuario,$_POST["permisomateria"]);               
                require ("../config/pdo.php");
         $Consqledit = $base->query("SELECT idusuario,imagen,CONCAT(nombre,' , ',apellido) as NombreCopleto
          FROM usuario WHERE   idusuario='$idusuario'")->fetchAll(PDO::  FETCH_OBJ);/*consulta para traer el nombre completo del alumno*/

         foreach ($Consqledit  as $q){$infoA = $q->NombreCopleto; $poto = $q->imagen;  }#ciclo de $Consql
             echo $rspta ? "<p class='text-center'><i style='font-size: 100px;' class='fa  fa-refresh text-success'></i><br>Usuario actualizado <br><img  src='../files/usuarios/".$poto."' height='150px'><br>id:".$idusuario."<br>Nombre del usuario/a:<br>".$infoA  : "Usuario no se pudo actualizar";

         }
  break;

  case 'desactivar':
           $rspta=$usuarioPM->desactivar($idusuario);
             echo $rspta ? "Usuario Desactivado" : "Usuario no se pudo desactivar";

  break;

  case 'activar':

       $rspta=$usuarioPM->activar($idusuario);
             echo $rspta ? "Usuario activado" : "Usuario no se pudo activar";

  break;

  case'mostrar':
              $rspta=$usuarioPM->mostrar($idusuario);
              //codificar el resultado json
             echo json_encode($rspta); 
  break;

  case'listar':
       $rspta=$usuarioPM->listar();
       // vamos a declarar un array o arreglo
       $data= Array();  

       while($reg=$rspta->fetch_object()){
           $data[]=array(
               "0" =>($reg->condicion)?'<button class="bnt btn-warning " onclick="mostrar('.$reg->idusuario.')"><i class="fas fa-pencil-alt"></i></button>    '.
             '<button class="bnt btn-danger " onclick="desactivar('.$reg->idusuario.')"><i class="fas fa-times"></i></button><br>'.$reg->idusuario :'<button class="bnt btn-warning " onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-edit"></i></button>    '.
             '<button class="bnt  btn-info " onclick="activar('.$reg->idusuario.')"><i class="fas fa-check"></i></button><br>'.$reg->idusuario,
               "1" =>$reg->usuario,
               "2" =>$reg->nombre,
               "3" =>$reg->apellido,
               "4" =>($reg->status=='Desconectado')?'<span class="badge label bg-red">Desconectado<span>': '<span class="badge label bg-green">En linea<span>',
               "5" =>$reg->telefono,
               "6" =>$reg->email,
               "7" =>"<img src='../files/usuarios/".$reg->imagen."' height='110px' width='110px'>",
               "8" =>$reg->direccion,
               "9" =>($reg->condicion)?'<span title="si podra logearse al sistema" class="badge label bg-green">Activo<span>': '<span title="No podra logearse al sistema" class="badge label bg-red">Desabilitado<span>'
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
     $rspta = $usuarioPM->listarpermiso();

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
     while($reg = $rspta->fetch_object())
     {
        $sw= in_array($reg->idpermiso,$valores)?'checked':'';

              echo '<li><label> <input type="checkbox" '.$sw.' name="permiso[]" value="'.$reg->idpermiso.'">'.$reg->nombre.'</label></li>';
              echo '<hr class="bg-success">';
     }

  break;


case 'verificar':

  $logina=limpiarCadena($_POST['logina']);
  $usuarioI=limpiarCadena($_POST['logina']);
  $clavea=limpiarCadena($_POST['clavea']);
    #metodo para estado del usuario
    $rspta1=$usuarioPM->Inicio($usuarioI);
    //Hash SHA256 en la contraseña
      $clavehash=hash("SHA256",$clavea);
      #metodo para verificar los datos 
     $rspta=$usuarioPM->verificar($logina, $clavehash);
     $fetch=$rspta->fetch_object();
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
                $_SESSION['unique_id']=$fetch->unique_id;
               $_SESSION['usuario']=$fetch->usuario; //login=usuario

               //ontener todos los permisos del usuario
               $marcadosPermiso = $usuarioPM->listarmarcados($fetch->idusuario);
               //Declaramos el array para almacenar todos los permisos marcados
               $valoresP=array();#arreglos para marcadosPermiso
              
               #ciclo para valoresP
               while ($per = $marcadosPermiso->fetch_object())
                { array_push($valoresP, $per->idpermiso); }


               //Determinamos los accesos del usuario
                require ("../config/pdo.php");
                $SQLpermisos = $base->query("SELECT idpermiso,nombre FROM pm_permiso")->fetchAll(PDO::  FETCH_OBJ);/*consulta para traer los permisos del usuario*/
                
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
 $rspta=$usuarioPM->salir($Usalir);
 /*$rspta=$usuarioPM->salir($Usalir);*/
    //codificar el resultado json
    /*echo json_encode($rspta);*/ 
  // limpiamos las variables de session
 session_unset();
 // Destruimos la session
 session_destroy();
 //Redireccionamos al login
 // header("Location: ../index.php");
break; 


} #final sentencia switch

?>