<?php 
/***********************************
*version: 1                        *
*fecha: 02-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/

#metodo para imprimir datos en todas las vistas 
function dataEmpresa($parametro){
  global $conexionPdo;#acceso a la variable global
  $sql = $conexionPdo->query("SELECT public_data as valor FROM pm_admiweb WHERE nom_section='$parametro'")->fetchAll(PDO::  FETCH_OBJ);
  foreach ($sql  as $data): #ciclo 
      return $data->valor;#retorno los valores contados
  endforeach;
}
function dataImgUrl($data){
  global $conexionPdo;#acceso a la variable global
  $sql = $conexionPdo->query("SELECT url_img as valor FROM pm_imgweb WHERE nombre_campo='$data'")->fetchAll(PDO::  FETCH_OBJ);
  foreach ($sql  as $data): #ciclo 
      return $data->valor;#retorno los valores contados
  endforeach;
}


 ?>