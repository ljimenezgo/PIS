<?php

if(isset($_POST['submit'])) 
{ 
require_once("../Modelo/conectar.php");
require_once("../Modelo/usuarios_modelo.php");
$usu=new usuarios_modelo();
$datos=$usu->registrar($username,$password);
 


}
 ?>