<?php
class matricula
{
	private $pdo;

    public $matricula_id;
    public $matricula_anio;
    public $matricula_semestre;
    public $matricula_tipo;
    public $matricula_descripcion;
    public $matricula_fecha_inicio;
    public $matricula_fecha_fin;
    public $matricula_estado;

	
	
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
	public function Obtener($matricula_id)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el id del alumno.
			$stm = $this->pdo->prepare("SELECT * FROM matricula WHERE matricula_id = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro id.
			$stm->execute(array($matricula_id));
			return $stm->fetch(PDO::FETCH_OBJ);

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Listar()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM matricula WHERE matricula_estado=0 ORDER BY matricula_id DESC LIMIT 1");
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

	public function Actualizar($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "UPDATE matricula SET
						matricula_anio          = ?,
						matricula_semestre        = ?,
						matricula_tipo        = ?,
						matricula_descripcion			 = ?,
						matricula_fecha_inicio				 = ?,
						matricula_fecha_fin			 = ?,
						matricula_estado		 = ?
						
				    WHERE matricula_id = ?";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->matricula_anio,
						$data->matricula_semestre,
						$data->matricula_tipo,
						$data->matricula_descripcion,
						$data->matricula_fecha_inicio,
						$data->matricula_fecha_fin,
						$data->matricula_estado,
						$data->matricula_id
					)
				);
				header('Location: ../Vista/Accion.php?c=matricula');
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Eliminar($matricula_id)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("UPDATE matricula SET matricula_estado = 1 WHERE matricula_id = ?");
			$stm->execute(array($matricula_id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function Registrar(matricula $data)
	{
		$consulta = "select count(*) as total from matricula where matricula_id = ?";
		$result = $this->pdo->prepare($consulta);
		$result->bindParam(1,$data->persona_cui,PDO::PARAM_STR);
		$result->execute();
		
		if($result->fetchColumn()==0){ //si no existe el dato lo inserto
		try
		{
			//Sentencia SQL.
			$sql = "INSERT INTO matricula (matricula_anio, matricula_semestre, matricula_tipo, matricula_descripcion, matricula_fecha_inicio, matricula_fecha_fin, matricula_estado) VALUES ( ?,?,?, ?, ?, ?, ?)";
			
			$this->pdo->prepare($sql)
		     ->execute(
				array(
						$data->matricula_anio,
						$data->matricula_semestre,
						$data->matricula_tipo,
						$data->matricula_descripcion,
						$data->matricula_fecha_inicio,
						$data->matricula_fecha_fin,
						$data->matricula_estado
                )
			);
			
			header('Location: ../Vista/Accion.php?c=matricula');
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
		}else{
			header("Location: ../Vista/Accion.php?c=alumno&a=error");
		}
	}
}
