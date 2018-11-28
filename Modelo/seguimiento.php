<?php
class Seguimiento
{
	//Atributo para conexión a SGBD
	private $pdo;

	//Atributos del objeto alumno
    public $seguimiento_id;
    public $seguimiento_docente;
    public $seguimiento_asignatura;
    public $seguimiento_fecha;
	public $seguimiento_alumno;
	public $seguimiento_tema;
	public $seguimiento_asistencia;


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
	//tutoria en caso de error se muestra por pantalla.
	public function Listar()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM tutoria WHERE (seguimiento_alumno = 2) AND (tutoria_estado = 0)");
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

		public function ListarAlumnosDerivadoPsicologia()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM tutoria JOIN persona ON tutoria.seguimiento_asignatura= persona.persona_id left join persona as p2 on tutoria.seguimiento_docente = p2.persona_id");
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
	public function ListaCitas($id_profesor)
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM tutoria JOIN persona ON tutoria.seguimiento_asignatura= persona.persona_id WHERE tutoria.seguimiento_docente=$id_profesor");
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
	public function Obtener($seguimiento_id)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el id del alumno.
			$stm = $this->pdo->prepare("SELECT * FROM tutoria WHERE seguimiento_id = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro id.
			$stm->execute(array($seguimiento_id));
			return $stm->fetch(PDO::FETCH_OBJ);

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Obtenert($seguimiento_id)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el id del alumno.
			$stm = $this->pdo->prepare("SELECT * FROM tutoria WHERE seguimiento_asignatura = ? AND tutoria_estado=0");
			//Ejecución de la sentencia SQL utilizando el parámetro id.
			$stm->execute(array($seguimiento_id));
			return $stm->fetch(PDO::FETCH_OBJ);

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	//Este método elimina la tupla alumno dado un id.
	public function Eliminar($seguimiento_id)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("UPDATE tutoria SET tutoria_estado = 1 WHERE seguimiento_id = ?");

			$stm->execute(array($seguimiento_id));
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
			$sql = "UPDATE tutoria SET
						seguimiento_docente          = ?,
						seguimiento_asignatura        = ?,
						seguimiento_fecha        = ?,
						seguimiento_alumno			 = ?,
						seguimiento_tema		 = ?

				    WHERE seguimiento_id = ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->seguimiento_docente,
                        $data->seguimiento_asignatura,
                        $data->seguimiento_fecha,
                        $data->seguimiento_alumno,
                        $data->seguimiento_tema,
						$data->seguimiento_id

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
						$data->seguimiento_asignatura
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	//Método que registra un nuevo alumno a la tabla.
	public function Registrar($data)
	{

		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "UPDATE seguimiento SET
			seguimiento_alumno			 = ?,
			seguimiento_docente		 = ?,
						seguimiento_asistencia =?,
						seguimiento_asignatura =?,
						seguimiento_fecha =?,
						seguimiento_tema		 = ?

				    WHERE seguimiento_id = ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
            $data->seguimiento_alumno,
						$data->seguimiento_docente,
						$data->seguimiento_asistencia,
						$data->seguimiento_asignatura,
						$data->seguimiento_fecha,
						$data->seguimiento_tema,

						$data->seguimiento_id

					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}

	}


	public function Asistido($data)
	{

		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "UPDATE tutoria SET
						tutoria_medico_aceptado =?,
						seguimiento_asistencia_aceptado =?,
						tutoria_social_aceptado =?

				    WHERE seguimiento_id = ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->tutoria_medico_aceptado,
						$data->seguimiento_asistencia_aceptado,
						$data->tutoria_social_aceptado,
						$data->seguimiento_id

					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}

	}
	//Método que registra un nuevo alumno a la tabla.
	 function RegistrarU(usuario $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "INSERT INTO usuario (usuario_cuenta,usuario_password,usuario_rol_id,usuario_seguimiento_id,usuario_estado)
		        VALUES (?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
						$data->usuario_cuenta,
                        $data->usuario_password,
                        $data->usuario_rol_id,
                        $data->usuario_seguimiento_id,
						$data->usuario_estado
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
