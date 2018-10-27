<?php
include "Conexion.php";
$db=connect();
$query=$db->query("SELECT * FROM persona WHERE (persona_tipo_id = $_GET[select]) AND (persona_estado = 0)");
$states = array();
while($r=$query->fetch_object()){ 
	$states[]=$r; 
}
if(count($states)>0){
	print "<option value=''>-- SELECCIONE --</option>";
	foreach ($states as $s) {
		print "<option value='$s->persona_id'>$s->persona_nombres</option>";
	}
}else{
	print "<option value=''>-- NO HAY DATOS --</option>";
}
?>