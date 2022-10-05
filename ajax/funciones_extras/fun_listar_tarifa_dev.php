<?php 

// esta funcion valida cuando el boton debe aparecer 
function validBtnBorrar($identificador,$codigoPresupuestario,$fechaCreacion,$identificadorInstitucion){
  global $conexionPdo;#acceso a la variable global

  $fecha_hoy = date_default_timezone_set('America/El_Salvador');
  $fecha_hoy = date("Y-m-d");#fecha de creacion de la tarifa
  
  #validacion para dia de hoy 
          $Sql = $conexionPdo->query("SELECT * FROM tarifas WHERE   fecha_creacion= '$fechaCreacion' AND institucion_id_fk='$identificadorInstitucion'")->fetchAll(PDO::  FETCH_OBJ);
          foreach ($Sql  as $t):  $forCreacion = $t->fecha_creacion; endforeach;
          if ($forCreacion == $fecha_hoy) {
            // code...
            // $btn_borrar = "se creo hoy";
            $btn_borrar= '<button class="btn btn-sm m-1 btn-danger" title="Eliminar el tarifa por completo" onclick="eliminar('.$identificador.')"><i class="fas fa-trash">Borrar</i></button>';//.'primer registro'

          }else{
            // $btn_borrar = "otro dia".$forCreacion."_________".$fecha_hoy;
            #$btn_borrar = "";

            #Validacion de dia de creacion
            #consulta para ver si existen asignaciones
            $aSql = $conexionPdo->prepare("SELECT * FROM asignaciones WHERE   codigo_presup= '$codigoPresupuestario' AND institucion_id_fk='$identificadorInstitucion'"); $aSql->execute();#ejecuta la consulta...
            $aResult =  $aSql->fetch();#true o false

            if ($aResult != true) {
              #si es falso
              $Psql = $conexionPdo->query("SELECT COUNT(*) as total FROM tarifas WHERE   codigo_presup= '$codigoPresupuestario' AND institucion_id_fk='$identificadorInstitucion' ")->fetchAll(PDO::  FETCH_OBJ);
              foreach ($Psql  as $p):  $cantidadTarifas = $p->total; endforeach;
              if ($cantidadTarifas == 1) {
                // code...
                #boton para borrar 
                $btn_borrar= '<button class="btn btn-sm m-1 btn-danger" title="Eliminar el tarifa por completo" onclick="eliminar('.$identificador.')"><i class="fas fa-trash">Borrar</i></button>';//.'primer registro'
              }else{
                #el valor es distinto de 1
                $btn_borrar ="";//nada  
              }
            }else{
              #si es verdadero
              // $btn_borrar ="existen asignaciones";
              $btn_borrar ="X";
            }

          }
  #fin validacion para dia de hoy 

  return $btn_borrar;//retorna contenido
}

// esta funcion sirv para 
function ValidEditar($identificador,$codigoPresupuestario,$fechaCreacion,$identificadorInstitucion)
{
    global $conexionPdo;#acceso a la variable global
  // code...

  $fecha_hoy = date_default_timezone_set('America/El_Salvador');
  $fecha_hoy = date("Y-m-d");#fecha de creacion de la tarifa
  
  #validacion para dia de hoy 
          $Sql = $conexionPdo->query("SELECT * FROM tarifas WHERE   fecha_creacion= '$fechaCreacion' AND institucion_id_fk='$identificadorInstitucion'")->fetchAll(PDO::  FETCH_OBJ);
          foreach ($Sql  as $t):  $forCreacion = $t->fecha_creacion; endforeach;
          if ($forCreacion == $fecha_hoy) {
            // code...
            // $btn_borrar = "se creo hoy";
            $btn_borrar= '<button title="Editar el tarifa" class="btn btn-sm m-1 btn-warning " onclick="mostrar('.$identificador.',false)"><i class="fa fa-edit">Editar</i></button>'.'<button class="btn btn-sm m-1 btn-info" title="reformar" onclick="mostrar('.$identificador.',true)"><i class="fas fa-calendar"> Reformar</i></button>';//.'primer registro'

          }else{
            #Validacion de el ultimo registro
            #consulta para consultar el registro mas actualizado de la tarifa
            $arSql = $conexionPdo->query("SELECT MAX(tarifas.id) AS IDTARIFA FROM tarifas WHERE codigo_presup ='$codigoPresupuestario' AND institucion_id_fk='$identificadorInstitucion'")->fetchAll(PDO::  FETCH_OBJ);
            foreach ($arSql  as $a):  $IDTARIFA = $a->IDTARIFA; endforeach;
            if ($identificador == $IDTARIFA) {
              #si es verdadero
              $btn_borrar= '<button title="Editar el tarifa" class="btn btn-sm m-1 btn-warning " onclick="mostrar('.$identificador.',false)"><i class="fa fa-edit">Editar</i></button>'.'<button class="btn btn-sm m-1 btn-info" title="reformar" onclick="mostrar('.$identificador.',true)"><i class="fas fa-calendar"> Reformar</i></button>';

            }else{
              #si es verdadero
              // $btn_borrar ="existen asignaciones";
              $btn_borrar ="X";
            }

          }
  #fin validacion para dia de hoy 

  return $btn_borrar;//retorna contenido

}

 ?>