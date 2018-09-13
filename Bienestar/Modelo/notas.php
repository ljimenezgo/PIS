<?php
class notas
{
	private $pdo;

    public $nota_promedio_id;
    public $nota_promedio_alumno_id;
    public $nota_promedio_semestre;
    public $nota_promedio_anio;
    public $nota_promedio_nota;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Conectar::Conexion();
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

			$stm = $this->pdo->prepare("SELECT * FROM persona WHERE (persona_tipo_id = 2) AND (persona_estado = 0)");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function Notas_quinto()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM nota_promedio,persona 
				WHERE nota_promedio.nota_promedio_alumno_id=persona.persona_cui AND nota_promedio.nota_promedio_nota>17");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

		public function Notas_tercio()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM nota_promedio,persona 
				WHERE nota_promedio.nota_promedio_alumno_id=persona.persona_cui AND nota_promedio.nota_promedio_nota>15 AND nota_promedio.nota_promedio_nota<=17");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

		public function Notas_regular()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM nota_promedio,persona 
				WHERE nota_promedio.nota_promedio_alumno_id=persona.persona_cui AND nota_promedio.nota_promedio_nota>11 AND nota_promedio.nota_promedio_nota<=15");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

		public function Notas_bajo()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM nota_promedio,persona 
				WHERE nota_promedio.nota_promedio_alumno_id=persona.persona_cui AND nota_promedio.nota_promedio_nota>5 AND nota_promedio.nota_promedio_nota<=11");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

		public function Notas_deserto()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM nota_promedio,persona WHERE nota_promedio.nota_promedio_alumno_id=persona.persona_cui AND nota_promedio.nota_promedio_nota<=5");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Obtener($nota_promedio_id)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM nota_promedio WHERE nota_promedio_id = ?");
			$stm->execute(array($nota_promedio_id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($nota_promedio_id)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM nota_promedio WHERE nota_promedio_id = ?");

			$stm->execute(array($nota_promedio_id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE nota_promedio SET
						nota_promedio_alumno_id        = ?,
						nota_promedio_semestre        = ?,
						nota_promedio_nota        = ?
				    WHERE nota_promedio_id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nota_promedio_alumno_id,
                        $data->nota_promedio_semestre,
                        $data->nota_promedio_nota,
                        $data->nota_promedio_id
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(notas $data)
	{
		try
		{
		$sql = "INSERT INTO nota_promedio (nota_promedio_alumno_id,nota_promedio_semestre,nota_promedio_nota)
		        VALUES (?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    //$data->nota_promedio_id,
                    $data->nota_promedio_alumno_id,
                    $data->nota_promedio_semestre,
                    $data->nota_promedio_nota
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
