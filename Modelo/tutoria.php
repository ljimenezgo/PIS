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

	//Método que registra un nuevo alumno a la tabla.
	public function Registrar(tutoria $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "INSERT INTO tutoria (tutoria_id, tutoria_docente,tutoria_alumno,tutoria_fecha,tutoria_observacion,tutoria_asunto)
		        VALUES (?,?, ?, ?,?, ?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
						$data->tutoria_id,
						$data->tutoria_docente,
                        $data->tutoria_alumno,
                        $data->tutoria_fecha,
                        $data->tutoria_observacion,
						$data->tutoria_asunto
                )
			);
        header('Location: ../Vista/Accion.php?c=alumno');
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
