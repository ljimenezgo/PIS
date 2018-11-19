<?php
class alumnoCurso
{
	//Atributo para conexión a SGBD
	private $pdo;

    public $alumno_curso_id;
    public $alumno_cursoc_alumno_id;
    public $alumno_curso_curso_id;
    public $alumno_curso_estado;
	
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
	public function Obtener($alumno_curso_id)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM alumno_curso WHERE alumno_curso_id = ?");
			$stm->execute(array($alumno_curso_id));
			return $stm->fetch(PDO::FETCH_OBJ);

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	function Matricular(alumnoCurso $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "INSERT INTO alumno_curso (alumno_cursoc_alumno_id,alumno_curso_curso_id)
		        VALUES (?, ?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                        $data->alumno_cursoc_alumno_id,
                        $data->alumno_curso_curso_id
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function DesmatricularCurso(alumnoCurso $alumno)
	{
		try
		{
			//Sentencia SQL.
			$sql = "DELETE FROM alumno_curso WHERE alumno_curso_id=? ";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                        $alumno->alumno_curso_id
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Bueno(alumnoCurso $alumno)
	{
		try
		{
			//Sentencia SQL.
			$sql = "UPDATE alumno_curso SET alumno_curso_estado=1 WHERE alumno_curso_id = ?";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                        $alumno->alumno_curso_id
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

		public function SinRevisar(alumnoCurso $alumno)
	{
		try
		{
			//Sentencia SQL.
			$sql = "UPDATE alumno_curso SET alumno_curso_estado=0 WHERE alumno_curso_id = ?";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                        $alumno->alumno_curso_id
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

		public function Malo(alumnoCurso $alumno)
	{
		try
		{
			//Sentencia SQL.
			$sql = "UPDATE alumno_curso SET alumno_curso_estado=3 WHERE alumno_curso_id = ?";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                        $alumno->alumno_curso_id
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
		public function Regular(alumnoCurso $alumno)
	{
		try
		{
			//Sentencia SQL.
			$sql = "UPDATE alumno_curso SET alumno_curso_estado=2 WHERE alumno_curso_id = ?";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                        $alumno->alumno_curso_id
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtenerCursos($persona_id)
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
	public function ListaCursos()
	{
		try
		{
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM curso");
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
	public function ListaDeCursosMatriculados($alumno_cursoc_alumno_id)
	{
		try
		{
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM alumno_curso WHERE alumno_cursoc_alumno_id=$alumno_cursoc_alumno_id");
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
	public function ListaCursosDeAlumno($persona_id)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM alumno_curso WHERE alumno_cursoc_alumno_id = ?");
			$stm->execute(array($persona_id));
			return $stm->fetch(PDO::FETCH_OBJ);

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ListaCursosAlumno($persona_id)
	{
		try
		{
			$sesionactualmente = $persona_id;
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM alumno_curso WHERE alumno_cursoc_alumno_id=$sesionactualmente");
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
	
}
