<?php 
/***********************************
*version: develop                  *
*fecha: 12-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
require_once "../modelos/m_usuario_androide.php";

// se crea la istancia $Usuarios A
$objUserAndroid= new UserAndroid();


// si existe el email
$email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$password=isset($_POST["password"])? limpiarCadena($_POST["password"]):"";
$idinstitucion=isset($_POST["idinstitucion"])? limpiarCadena($_POST["idinstitucion"]):"";
$device_prefix=isset($_POST["device_prefix"])? limpiarCadena($_POST["device_prefix"]):"";
$alcance=isset($_POST["alcance"])? limpiarCadena($_POST["alcance"]):""; 

switch($_GET["op"]){

  case 'guardaryeditar':
  if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    #true
    $cuenta_password = strlen($password);
    if ($cuenta_password >= 6) {
      #true
       if(empty($email)){

             $respuesta=$objUserAndroid->nuevo($email,$nombre,$password,$idinstitucion,$device_prefix,$alcance);
             echo $respuesta ? "Usuarios A registrado" : "El Usuarios A no se pudo registrar";
       }
         else {
               
               $respuesta=$objUserAndroid->editar($email,$nombre,$password,$idinstitucion,$device_prefix,$alcance);
             echo $respuesta ? "Usuarios A actualizado" : "Usuarios A no se pudo actualizar";

         }
           }else{
             echo "La contraseña debe tener como minimo 6 caracteres";
           }

         }else{
           echo "El correo No es valido";
         }
  break;


  case 'nuevo':
  if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    #true
    $cuenta_password = strlen($password);
    if ($cuenta_password >= 6) {
      #true
               $respuesta=$objUserAndroid->nuevo($email,$nombre,$password,$idinstitucion,$device_prefix,$alcance);
             echo $respuesta ? "Usuarios new registrado" : "El Usuarios A no se pudo registrar";
               }else{
                 echo "La contraseña debe tener como minimo 6 caracteres";
               }

             }else{
               echo "El correo no es valido";
             }
      
  break;

  
 

case 'eliminar':
           $respuesta=$objUserAndroid->eliminar($email);
             echo $respuesta ? "Usuarios A eliminado" : "Usuarios A no se pudo eliminar";

  break;




    case'mostrar':
              $respuesta=$objUserAndroid->mostrar($email);
              //codificar el resultado json
             echo json_encode($respuesta); 
    break;




     case'listar':
      $respuesta=$objUserAndroid->listar();
      // vamos a declarar un array o arreglo
       $data= Array(); 

       while($reg=$respuesta->fetch_object()){
           $data[]=array(
               "0" =>$reg->email,
               "1" =>$reg->nombre,
               "2" =>$reg->password,
               "3" =>$reg->name_institucion,
               "4" =>$reg->device_prefix,
               "5" =>$reg->alcance,
               "6" =>'<button title="Editar el Usuarios A" class="btn btn-sm m-1 btn-warning " onclick="mostrar('."'".$reg->email."'".')"><i class="fa fa-edit"></i></button>    '.'<button class="btn btn-sm m-1 btn-danger" title="Eliminar el Usuarios A por completo" onclick="eliminar('."'".$reg->email."'".')"> <i class="fas fa-trash"></i></button>'
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
      $respuesta=$objUserAndroid->listar();
      // vamos a declarar un array o arreglo
       $data= Array(); 

       while($reg=$respuesta->fetch_object()){
           $data[]=array(
            "0" =>$reg->email,
            "1" =>$reg->nombre,
            "2" =>$reg->password,
            "3" =>$reg->name_institucion,
            "4" =>$reg->device_prefix,
            "5" =>$reg->alcance,
            "6" =>'disabled'
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
