<?php
// simple conexion a la base de datos
function connect(){
	return new mysqli("localhost","root","","bd_epcc");
}

?>