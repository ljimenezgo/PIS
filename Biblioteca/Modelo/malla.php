<?php
class malla
{
	//Atributo para conexión a SGBD
	private $pdo;

	//Atributos del objeto malla
    public $malla_curricular_id;
    public $malla_curricular_dsc;
    public $malla_curricular_anio;
	

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

	//Este método obtiene los datos de la mall a partir del nit
	//utilizando SQL.
	public function ObtenerPorAnio($malla_curricular_anio)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM malla_curricular WHERE malla_curricular_anio = ?");
			$stm->execute(array($malla_curricular_anio));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que registra una nueva malla junto con sus cursos a la tabla.
	public function RegistrarMallaArchivo(malla $data)	{
		try {
			//Sentencia SQL.
			$sql = "INSERT INTO malla_curricular (malla_curricular_dsc, malla_curricular_anio) VALUES (?, ?)";
			$this->pdo->prepare($sql)
		     ->execute(
				array(
						$data->malla_curricular_dsc,
                        $data->malla_curricular_anio
                )
			);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	
	public function Listar()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM malla_curricular");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	
	

}
