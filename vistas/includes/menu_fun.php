<?php 
#Esta funcion devuelve el nombre del permiso concatenado
function menu_fun($data){
      global $conexionPdo;#acceso a la variable global
      $sql = $conexionPdo->query("SELECT * FROM pm_permiso WHERE idpermiso='$data'")->fetchAll(PDO::  FETCH_OBJ);#consulta Del administrador
      foreach ($sql  as $a): 
      $nombreP_concatenado = strtr ($a->nombre, " ", "_");//remplazamos espacion x gion
      return $nombreP_concatenado;
      endforeach;#ciclo de $sql
}
//Ejemplo menu_fun(1);#retorna el nombre del permiso con guiones
 


#Esta funcion devuelve el nombre del rol
function fun_rol($data){
      global $conexionPdo;#acceso a la variable global
      $sql = $conexionPdo->query("SELECT * FROM pm_roles WHERE idroles='$data'")->fetchAll(PDO::  FETCH_OBJ);#consulta Del administrador
      foreach ($sql  as $a): 
      $nombreP_concatenado = strtr ($a->nombre, " ", "_");//remplazamos espacion x gion
      return $nombreP_concatenado;
      endforeach;#ciclo de $sql
}
?>