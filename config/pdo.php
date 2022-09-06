<?php 
/***********************************
*version: 1                        *
*fecha: 02-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
#utilizamos require_once para no volver a incluir el archivo
require 'global.php';
$conexionPdo = new PDO("mysql:host=$host; dbname=$name_bd", "$usuario_db", "$contrasena_db");
?>