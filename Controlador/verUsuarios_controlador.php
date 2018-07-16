<?php
//Llamada al modelo
require_once("../Modelo/conectar.php");
require_once("../Modelo/usuarios_modelo.php");
$usu=new usuarios_modelo();
$datos=$usu->get_usuarios();
 
//Llamada a la vista
require_once("../Vista/usuarios_vista.php");
?>
