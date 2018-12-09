<?php
class profesor
{
	private $pdo;

    public $persona_id;
    public $persona_nombres;
    public $persona_apellido1;
    public $persona_apellido2;
	public $persona_tipo_id;
	public $persona_dni;
	public $persona_direccion;
	public $persona_email;
	public $persona_telefono;
	public $persona_estado;
	public $persona_egresado;
	public $persona_tipo_libro_prestado;
	public $persona_tutor;
	public $persona_solicitar;
	public $persona_alumnos;
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Conectar::conexion();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM persona WHERE (persona_tipo_id = 3) AND (persona_estado = 0)");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function ListarAlumnos($persona_id)
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM persona WHERE (persona_tutor = ?) AND (persona_estado = 0)");
			$stm->execute(array($persona_id));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Solicitudes()
	{
		try
		{
			$result = array();
			$sesioniniciada = $_SESSION['persona_id'];
			$stm = $this->pdo->prepare("SELECT * FROM persona WHERE persona_solicitar = ?  AND (persona_estado = 0) AND (persona_tutor = '')");
			$stm->execute(array($sesioniniciada));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Obtener($persona_id)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM persona WHERE persona_id = ?");
			$stm->execute(array($persona_id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	

	public function Eliminar($persona_id)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("UPDATE persona SET persona_estado = 1 WHERE persona_id = ?");

			$stm->execute(array($persona_id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Matricular($data)
	{
		try
		{
			$sql = "UPDATE persona SET persona_tutor = ?,persona_solicitar=0 WHERE persona_id = ?";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->persona_tutor,
						$data->persona_id
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	
		
	public function MatricularP($data)
	{
		try
		{
			$sql = "UPDATE persona SET persona_alumnos=persona_alumnos+1 WHERE persona_id = ?";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->persona_tutor
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Solicitar($data)
	{
		try
		{
			$sql = "UPDATE persona SET persona_solicitar = ? WHERE persona_id = ?";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->persona_solicitar, 						
                        $data->persona_id

					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function desmatricular($data)
	{
		try
		{
			$sql = "UPDATE persona SET persona_tutor = '' WHERE persona_id = ?";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->persona_id
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function desmatricularP($data)
	{
		try
		{
			$sql = "UPDATE persona SET persona_alumnos=persona_alumnos-1 WHERE persona_id = ?";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->persona_tutor
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}	

		public function cancelarSolicitud($data)
	{
		try
		{
			$sql = "UPDATE persona SET persona_citado_tutoria = '0' WHERE persona_id = ?";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->persona_id
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
		public function cancelarSolicitudTutor($data)
	{
		try
		{
			$sql = "UPDATE persona SET persona_solicitar = '0' WHERE persona_id = ?";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->persona_id
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}	

	public function cancelarSolicitudT($data)
	{
		try
		{
			$sql = "UPDATE tutoria SET tutoria_estado = 1 , tutoria_cancelacion_motivo = ? WHERE tutoria_alumno = ? ORDER BY tutoria_id DESC LIMIT 1";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->tutoria_cancelacion_motivo,
						$data->tutoria_alumno

					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function cancelarSolicitudQuitar($data)
	{
		try
		{
			$sql = "UPDATE tutoria SET tutoria_estado = 2 WHERE tutoria_alumno = ? ORDER BY tutoria_id DESC LIMIT 1";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->tutoria_alumno
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE persona SET
						persona_nombres          = ?,
						persona_apellido1        = ?,
						persona_apellido2        = ?,
						persona_tipo_id			 = ?,
						persona_dni				 = ?,
						persona_direccion		 = ?,
						persona_email			 = ?,
						persona_telefono		 = ?
						
				    WHERE persona_id = ?";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->persona_nombres,
                        $data->persona_apellido1,
                        $data->persona_apellido2,
                        $data->persona_tipo_id,
						$data->persona_dni,
                        $data->persona_direccion,
                        $data->persona_email,
                        $data->persona_telefono,
						$data->persona_id

					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(profesor $data)
	{
		$consulta = "select count(*) as total from persona where persona_id = ?";
		$result = $this->pdo->prepare($consulta);
		$result->bindParam(1,$data->persona_dni,PDO::PARAM_STR);
		$result->execute();
		
		if($result->fetchColumn()==0){ //si no existe el dato lo inserto
		try
		{
			$sql = "INSERT INTO persona (persona_id, persona_nombres,persona_apellido1,persona_apellido2,persona_tipo_id,persona_dni,persona_direccion,persona_email,persona_telefono, persona_estado)
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?,?,?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
						$data->persona_id,
						$data->persona_nombres,
                        $data->persona_apellido1,
                        $data->persona_apellido2,
                        $data->persona_tipo_id,
						$data->persona_dni,
                        $data->persona_direccion,
                        $data->persona_email,
                        $data->persona_telefono,
                        $data->persona_estado
                )
			);
			        header('Location: ../Vista/Accion.php?c=profesor');

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
		}else{
			header("Location: ../Vista/Accion.php?c=profesor&a=error");
		}
	}
	
	//Método que registra un nuevo alumno a la tabla.
	 function RegistrarU(usuario $data)
	{
		$consulta = "select count(*) as total from usuario where usuario_cuenta = ?";
		$result = $this->pdo->prepare($consulta);
		$result->bindParam(1,$data->usuario_cuenta,PDO::PARAM_STR);
		$result->execute();
		if($result->fetchColumn()==0){ //si no existe el dato lo inserto
		try
		{
			//Sentencia SQL.
			$sql = "INSERT INTO usuario (usuario_cuenta,usuario_password,usuario_rol_id,usuario_persona_id,usuario_estado)
		        VALUES (?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
						$data->usuario_cuenta,
                        $data->usuario_password,
                        $data->usuario_rol_id,
                        $data->usuario_persona_id,
						$data->usuario_estado
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
		}else{
			header("Location: ../Vista/Accion.php?c=profesor&a=error");
		}
	}
}
