<?php
session_start();
//Llamada al modelo
if(isset($_POST['submit'])) 
{ 
require_once("Modelo/usuarios_modelo.php");
$usu=new usuarios_modelo();
$datos=$usu->validar($username,$password);
 


}
 ?>