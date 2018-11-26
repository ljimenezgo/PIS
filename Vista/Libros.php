<?php
include "Conexion.php";
$db=connect();
$query=$db->query("SELECT * from libro where libro_caracteristica=$_GET[select] AND libro_tipo=2 AND libro_estado=0 ORDER BY libro_nombre");
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
