<?php 
function nom_section($nombre_section){
      return $nombre_section;#retorno
}


#Este metodo toma el identificador del permiso y retorna el nombre del permiso con guiones
function retornarNamePermiso($idpermiso){
      $sql = $base->query("SELECT * FROM pm_permiso WHERE idpermiso='$idpermiso'")->fetchAll(PDO::  FETCH_OBJ);#consulta Del administrador
      foreach ($sql  as $a): 
      $nombreP_concatenado = strtr ($a->nombre, " ", "_");//remplazamos espacion x gion
      return $nombreP_concatenado;
      endforeach;#ciclo de $sql
}
//Ejemplo retornarNamePermiso(1);#retorna el nombre del permiso con guiones
?>