	<?php

	class conectar{
		public static function conexion(){
			$pdo = new PDO('mysql:host=localhost;dbname=bd_epcc;charset=latin1', 'root', '');
			//Filtrando posibles errores de conexión.
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
		}
	}



	?>