<?php
class alumno
{
	//Atributo para conexión a SGBD
	private $pdo;

	//Atributos del objeto alumno
    public $persona_id;
    public $persona_nombres;
    public $persona_apellido1;
    public $persona_apellido2;
	public $persona_tipo_id;
	public $persona_cui;
	public $persona_direccion;
	public $persona_email;
	public $persona_telefono;
	public $comentarios_docente_docente_id;
	public $comentarios_docente_comentario;
	public $comentarios_docente_fecha;
	
	

	//Método de conexión a SGBD.
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

	//Este método selecciona todas las tuplas de la tabla
	//persona en caso de error se muestra por pantalla.
	public function Listar()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM persona WHERE (persona_tipo_id = 2) AND (persona_estado = 0)");
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}

		public function Listare($comentarios_docente_alumno_id)
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * from  comentarios_docente JOIN persona on comentarios_docente.comentarios_docente_alumno_id = persona.persona_id
										WHERE comentarios_docente.comentarios_docente_alumno_id={$comentarios_docente_alumno_id}");
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}
	//Este método obtiene los datos del alumno a partir del nit
	//utilizando SQL.
	public function Obtener($persona_id)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el id del alumno.
			$stm = $this->pdo->prepare("SELECT * FROM persona WHERE persona_id = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro id.
			$stm->execute(array($persona_id));
			return $stm->fetch(PDO::FETCH_OBJ);

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Este método elimina la tupla alumno dado un id.
	public function Eliminar($persona_id)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("UPDATE persona SET persona_estado = 1 WHERE persona_id = ?");

			$stm->execute(array($persona_id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el id del alumno.
	public function Actualizar($data)
	{

		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "UPDATE persona SET
						persona_nombres          = ?,
						persona_apellido1        = ?,
						persona_apellido2        = ?,
						persona_tipo_id			 = ?,
						persona_cui				 = ?,
						persona_direccion		 = ?,
						persona_email			 = ?,
						persona_telefono		 = ?
						
				    WHERE persona_id = ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->persona_nombres,
                        $data->persona_apellido1,
                        $data->persona_apellido2,
                        $data->persona_tipo_id,
						$data->persona_cui,
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

	//Método que registra un nuevo alumno a la tabla.
	public function Registrar(alumno $data)
	{
		$consulta = "select count(*) as total from persona where persona_id = ?";
		$result = $this->pdo->prepare($consulta);
		$result->bindParam(1,$data->persona_cui,PDO::PARAM_STR);
		$result->execute();
		
		if($result->fetchColumn()==0){ //si no existe el dato lo inserto
		try
		{
			//Sentencia SQL.
			$sql = "INSERT INTO persona (persona_id, persona_nombres,persona_apellido1,persona_apellido2,persona_tipo_id,persona_cui,persona_direccion,persona_email,persona_telefono, persona_estado)
		        VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
						$data->persona_id,
						$data->persona_nombres,
                        $data->persona_apellido1,
                        $data->persona_apellido2,
                        $data->persona_tipo_id,
						$data->persona_cui,
                        $data->persona_direccion,
                        $data->persona_email,
                        $data->persona_telefono,
                        $data->persona_estado
                )
			);
        header('Location: ../Vista/Accion.php?c=alumno');
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
		}else{
			header("Location: ../Vista/Accion.php?c=alumno&a=error");
		}
	}
	
	
	
	//Método que registra un nuevo alumno a la tabla.
	 function RegistrarU(usuario $data)
	{
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
	}
}
