<?php
class colaborador
{
	//Atributo para conexión a SGBD
	private $pdo;

	//Atributos del objeto colaborador
    public $persona_id;
    public $persona_nombres;
    public $persona_apellido1;
    public $persona_apellido2;
	public $persona_tipo_id;
	public $persona_prestamo;
	public $persona_dni;
	public $persona_direccion;
	public $persona_email;
	public $persona_telefono;
	public $persona_prestamo_total;
	public $persona_prestamo_deuda;
	public $comentarios_docente_docente_id;
	public $comentarios_docente_comentario;
	public $comentarios_docente_fecha;
	public $persona_colaborador;
	
	

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
			$stm = $this->pdo->prepare("SELECT * FROM persona WHERE (persona_colaborador = 1 OR persona_colaborador = 2) AND (persona_estado = 0)");
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
	public function ListarTodos()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM persona JOIN tipo_persona on persona.persona_tipo_id = tipo_persona.tipo_persona_id
										WHERE (persona_tipo_id != 1 AND persona_tipo_id !=4 AND persona_tipo_id !=6) AND (persona_estado = 0) AND (persona_colaborador !=1 AND persona_colaborador != 2)");
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
		public function Listare($comentarios_docente_colaborador_id)
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * from  comentarios_docente JOIN persona on comentarios_docente.comentarios_docente_colaborador_id = persona.persona_id
										WHERE comentarios_docente.comentarios_docente_colaborador_id={$comentarios_docente_colaborador_id}");
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
	//Este método obtiene los datos del colaborador a partir del nit
	//utilizando SQL.
	public function Obtener($persona_id)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el id del colaborador.
			$stm = $this->pdo->prepare("SELECT * FROM persona WHERE persona_id = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro id.
			$stm->execute(array($persona_id));
			return $stm->fetch(PDO::FETCH_OBJ);

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Este método elimina la tupla colaborador dado un id.
	public function Eliminar($persona_id)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("UPDATE persona SET persona_colaborador = 0 WHERE persona_id = ?");
			$stm->execute(array($persona_id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el id del colaborador.
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
						persona_dni				 = ?,
						persona_direccion		 = ?,
						persona_email			 = ?,
						persona_prestamo		 = ?,
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
						$data->persona_dni,
                        $data->persona_direccion,
                        $data->persona_email,
                        $data->persona_telefono,
                        $data->persona_prestamo,
						$data->persona_id

					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
		
	}
	
	public function RegistrarExistente($data)
	{

		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "UPDATE persona SET
						persona_colaborador          = ?
						
				    WHERE persona_id = ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->persona_colaborador,
						$data->persona_id

					)
				);
				header('Location: ../Vista/Accion.php?c=colaborador');
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
		
	}
	//Método que registra un nuevo colaborador a la tabla.
	public function Registrar(colaborador $data)
	{
		$consulta = "select count(*) as total from persona where persona_id = ?";
		$result = $this->pdo->prepare($consulta);
		$result->bindParam(1,$data->persona_dni,PDO::PARAM_STR);
		$result->execute();
		
		if($result->fetchColumn()==0){ //si no existe el dato lo inserto
		try
		{
			$sql = "INSERT INTO persona (persona_id, persona_nombres,persona_apellido1,persona_apellido2,persona_tipo_id,persona_dni,persona_direccion,persona_email,persona_telefono, persona_estado,persona_colaborador)
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?,?,?,?)";

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
                        $data->persona_estado,
                        $data->persona_colaborador
                )
			);
			        header('Location: ../Vista/Accion.php?c=colaborador');

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
		}else{
			header("Location: ../Vista/Accion.php?c=colaborador&a=errorColaborador");
		}
	}
	
	
	
	//Método que registra un nuevo colaborador a la tabla.
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
