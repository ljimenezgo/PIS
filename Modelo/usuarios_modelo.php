<?php

class usuarios_modelo{

		private $db;
		private $usuarios;
		
		public function __construct(){
			//requiere_once("Modelo/conectar.php");
			$this->db=conectar::conexion();
			$this->usuarios=array();
		}

		public function validar($username,$password){
			
			 $sql = "SELECT * FROM usuario JOIN persona ON usuario.usuario_cuenta=persona.persona_id WHERE usuario.usuario_cuenta = '$username'";
			 $result = $this->db->query($sql);
			// if ($result->num_rows > 0) {     
			 //}

	 		$row = $result->fetch_array(MYSQLI_ASSOC);
			 if (password_verify($password, $row['usuario_password'])) { 
	  		 	 $_SESSION['loggedin'] = true;
				 $_SESSION['rol']= $row['usuario_rol_id'];
				 $_SESSION['usuario_dni']= $row['usuario_cuenta'];
				 $_SESSION['solicitud']= $row['persona_solicitar'];
	   			 $_SESSION['usuario_cuenta'] = $username;
	   			 $_SESSION['persona_id'] = $row['usuario_persona_id'];
	   			 $_SESSION['nombre_persona'] = $row['persona_nombres'];
	   			 $_SESSION['usuario_id'] = $row['usuario_id'];
	   			 $_SESSION['persona_colaborador'] = $row['persona_colaborador'];
	   			 $_SESSION['start'] = time();
	  			 $_SESSION['expire'] = $_SESSION['start'] + (50 * 60);
	  			 header('Location: Vista/bienvenida.php');
			 }

			 else { 
	  			echo "Usuario o contraseña incorrectos.";
	  			
	 		}
	 		mysqli_close($this->db);
	 	}

	 	public function validarLogin($username,$password){
			
			 $sql = "SELECT * FROM usuario WHERE usuario_cuenta = '$username'";
			 $result = $this->db->query($sql);
			// if ($result->num_rows > 0) {     
			 //}

	 		$row = $result->fetch_array(MYSQLI_ASSOC);
			 if (password_verify($password, $row['usuario_password'])) { 
	  		 	$_SESSION['loggedin'] = true;
				 	$_SESSION['rol']= $row['usuario_rol_id'];
	   			$_SESSION['usuario_cuenta'] = $username;
	   			$_SESSION['start'] = time();
	  			$_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
	  			// header('Location: Vista/bienvenida.php');
	  			echo "Inicio de sesión correcto.";
	  			
			 }

			 else { 
	  			echo "Usuario o contraseña incorrectos.";
	  			
	 		}
	 		mysqli_close($this->db);
	 	}

	 	public function registrar($username,$password){

			$hash = password_hash($password, PASSWORD_BCRYPT); 
			$buscarUsuario = "SELECT * FROM usuario WHERE usuario_cuenta = '$username' ";
			$result = $this->db->query($buscarUsuario);
			$count = mysqli_num_rows($result);

			 if ($count == 1) {
			 echo "<br />". "El Nombre de Usuario ya a sido tomado." . "<br />";

			 echo "<a>  Por favor escoga otro Nombre    </a>";
			 echo "<a href='Home.php'>ATRAS</a>";
			 }
			 else{

			 $query = "INSERT INTO usuario (usuario_cuenta, usuario_password, usuario_rol_id, usuario_persona_id)
			           VALUES ('$username', '$hash','1','1')";

			 if ($this->db->query($query) === TRUE) {
			 
			 echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
			 echo "<h4>" . "Bienvenido: " . $username . "</h4>" . "\n\n";
			 echo "<h5>" . "Hacer Login: " . "<a href='../index.php'>Login</a>" . "</h5>"; 
			 }

			 else {
			 echo "Error al crear el usuario." . $query . "<br>" . $this->db->error; 
			   }
			 }
			 mysqli_close($this->db);

	 	}

		public function get_usuarios(){
			$consulta=$this->db->query("select * from usuario");
			while($fila=$consulta->fetch_assoc()){
				$this->usuarios[]=$fila;
			}
			return $this->usuarios;
		}




}

?>