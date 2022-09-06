<?php
/***********************************
*version: 1                        *
*fecha: 05-09-2022                 *
*Dev: https://github.com/barry503  *
**********************************/
#Activamos el almacenamiento en el buffer
ob_start();
session_start();  /*Con php*/

// si existe una varible llamada usuario
if(isset($_SESSION["usuario"])){
	#se redireccionara
	header('Location: vistas/inicio.php');
 }else
{
	#se redireccionara
	header('Location: vistas/login.php');
}

ob_end_flush();
 ?>