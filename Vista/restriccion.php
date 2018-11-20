<?php
session_start();

//echo "<h1 style='text-aligin:center;'>Bienvenido! " . $_SESSION['usuario_persona_id']."</h1>";
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   echo "Esta pagina es solo para usuarios registrados.<br>";
   echo "<br><a href='../PIS/index.php'>Login</a>";
    exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();

echo "Su sesion a terminado,
<a href='../PIS/index.php'>Necesita Hacer Login</a>";
exit;
}
?>