<?php
include "Conexion.php";
$db=connect();
$query=$db->query("select * from libro where libro_caracteristica=$_GET[select]");
$states = array();
while($r=$query->fetch_object()){ $states[]=$r; }
if(count($states)>0){
print "<option value=''>-- SELECCIONE --</option>";
foreach ($states as $s) {
	print "<option value='$s->libro_id'>$s->libro_nombre</option>";
}
}else{
print "<option value=''>-- NO HAY DATOS --</option>";
}
?>