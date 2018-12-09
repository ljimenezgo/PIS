<?php
class Tutoria
{
	//Atributo para conexión a SGBD
	private $pdo;

	//Atributos del objeto alumno
    public $tutoria_id;
    public $tutoria_docente;
    public $tutoria_alumno;
    public $tutoria_fecha;
	public $tutoria_observacion;
	public $tutoria_asunto;
	public $tutoria_piscologia;
	public $tutoria_social;
	public $tutoria_medico;
	public $tutoria_piscologia_aceptado;
	public $tutoria_social_aceptado;
	public $tutoria_medico_aceptado;
	public $tutoria_cancelacion_motivo;
	public $tutoria_medico_fecha;
	public $tutoria_social_fecha;
	public $tutoria_piscologia_fecha;
	public $tutoria_lugar;
	public $p2;

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
			$stm = $this->pdo->prepare("SELECT * FROM tutoria WHERE (tutoria_observacion = 2) AND (tutoria_estado = 0)");
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
			$stm = $this->pdo->prepare("SELECT * FROM tutoria JOIN persona ON tutoria.tutoria_alumno= persona.persona_id");
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
			$stm = $this->pdo->prepare("SELECT * FROM tutoria JOIN persona ON tutoria.tutoria_alumno= persona.persona_id WHERE tutoria.tutoria_docente=$id_profesor");
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
	public function Obtener($tutoria_id)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el id del alumno.
			$stm = $this->pdo->prepare("SELECT * FROM tutoria WHERE tutoria_id = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro id.
			$stm->execute(array($tutoria_id));
			return $stm->fetch(PDO::FETCH_OBJ);

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Obtenert($tutoria_id)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el id del alumno.
			$stm = $this->pdo->prepare("SELECT * FROM tutoria WHERE tutoria_alumno = ? AND tutoria_estado=0");
			//Ejecución de la sentencia SQL utilizando el parámetro id.
			$stm->execute(array($tutoria_id));
			return $stm->fetch(PDO::FETCH_OBJ);

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	//Este método elimina la tupla alumno dado un id.
	public function Eliminar($tutoria_id)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("UPDATE tutoria SET tutoria_estado = 1 WHERE tutoria_id = ?");

			$stm->execute(array($tutoria_id));
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
						tutoria_docente          = ?,
						tutoria_alumno        = ?,
						tutoria_fecha        = ?,
						tutoria_observacion			 = ?,
						tutoria_asunto		 = ?

				    WHERE tutoria_id = ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->tutoria_docente,
                        $data->tutoria_alumno,
                        $data->tutoria_fecha,
                        $data->tutoria_observacion,
                        $data->tutoria_asunto,
						$data->tutoria_id

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
						$data->tutoria_alumno
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
			$sql = "UPDATE tutoria SET
						tutoria_observacion			 = ?,
						tutoria_medico =?,
						tutoria_piscologia =?,
						tutoria_social =?,
						tutoria_piscologia_fecha =?,
						tutoria_social_fecha =?,
						tutoria_medico_fecha	 =?,
						tutoria_estado =2,
						tutoria_asunto		 = ?

				    WHERE tutoria_id = ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->tutoria_observacion,
						$data->tutoria_medico,
						$data->tutoria_piscologia,
						$data->tutoria_social,
						$data->tutoria_piscologia_fecha,
						$data->tutoria_social_fecha,
						$data->tutoria_medico_fecha	,

                        $data->tutoria_asunto,
						$data->tutoria_id

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
						tutoria_piscologia_aceptado =?,
						tutoria_social_aceptado =?

				    WHERE tutoria_id = ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->tutoria_medico_aceptado,
						$data->tutoria_piscologia_aceptado,
						$data->tutoria_social_aceptado,
						$data->tutoria_id

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
			$sql = "INSERT INTO usuario (usuario_cuenta,usuario_password,usuario_rol_id,usuario_tutoria_id,usuario_estado)
		        VALUES (?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
						$data->usuario_cuenta,
                        $data->usuario_password,
                        $data->usuario_rol_id,
                        $data->usuario_tutoria_id,
						$data->usuario_estado
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
