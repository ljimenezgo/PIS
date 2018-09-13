<?php
session_start();

echo "<h1 style='text-aligin:center;'>Bienvenido! " . $_SESSION['usuario_cuenta']."</h1>";
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   echo "Esta pagina es solo para usuarios registrados.<br>";
   echo "<br><a href='../index.php'>Login</a>";
	exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();

echo "Su sesion a terminado,
<a href='../index.php'>Necesita Hacer Login</a>";
exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ciencias de la Comunicacion</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="plugins/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/dist/css/skins/skin-blue-light.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <script src="plugins/jquery/jquery-2.1.4.min.js"></script>
	<script src="plugins/morris/raphael-min.js"></script>
	<script src="plugins/morris/morris.js"></script>
  	<link rel="stylesheet" href="plugins/morris/morris.css">
  	<link rel="stylesheet" href="plugins/morris/example.css">
    <script src="plugins/jspdf/jspdf.min.js"></script>
    <script src="plugins/jspdf/jspdf.plugin.autotable.js"></script>
	<script type="text/javascript" src="plugins/jsqrcode/llqrcode.js"></script>
	<script type="text/javascript" src="plugins/jsqrcode/webqr.js"></script>
 	<meta charset = "utf-8">
</head>

<body  skin-blue-light sidebar-mini>
  
<h1>Bienestar Social</h1>
<p>Aqui va tods los modulos relacionados a Bienestar Social</p>

<ul>
  <li>Alumnos</li>
  <li>Docentes</li>
  <li>Administrador</li>
  <li>etc.</li>
</ul>

<br><br>
<a href="../Controlador/verUsuarios_controlador.php">Ver Usuarios Registrados </a>
<br><br>
<a href="../Vista/registro_vista.php">Registrar Usuarios </a>
<br><br>
<a href=logout.php>Cerrar Sesion X </a>


</body>
</html>