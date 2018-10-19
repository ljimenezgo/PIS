<?php
class trabajo
{
	private $pdo;

    public $trabajo_id;
    public $trabajo_codigo;
    public $trabajo_nombre;
    public $trabajo_autor;
    public $trabajo_tipo;
    public $trabajo_pdf;
    public $trabajo_enlace;
    public $trabajo_estado;
    public $trabajo_cantidad_disponible;
    public $trabajo_cantidad;
    public $trabajo_anio;
    public $trabajo_editorial;
	
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
	public function Obtener($trabajo_id)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el id del alumno.
			$stm = $this->pdo->prepare("SELECT * FROM trabajo WHERE trabajo_id = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro id.
			$stm->execute(array($trabajo_id));
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
			$stm = $this->pdo->prepare("SELECT * FROM trabajo WHERE trabajo_estado = 0");
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
			$sql = "UPDATE trabajo SET
						trabajo_codigo          = ?,
						trabajo_nombre        = ?,
						trabajo_autor        = ?,
						trabajo_tipo			 = ?,
						trabajo_pdf				 = ?,
						trabajo_enlace		 = ?,
						trabajo_estado			 = ?,
						trabajo_cantidad_disponible		 = ?,
						trabajo_anio		 = ?,
						trabajo_editorial		 = ?
						
				    WHERE trabajo_id = ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->trabajo_codigo,
						$data->trabajo_nombre,
						$data->trabajo_autor,
						$data->trabajo_tipo,
						$data->trabajo_pdf,
						$data->trabajo_enlace,
						$data->trabajo_estado,
						$data->trabajo_cantidad_disponible,
						$data->trabajo_anio,
						$data->trabajo_editorial,
						$data->trabajo_id


					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
		
	}
	
	public function Eliminar($trabajo_id)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("UPDATE trabajo SET trabajo_estado = 1 WHERE trabajo_id = ?");

			$stm->execute(array($trabajo_id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function Registrar(trabajo $data)
	{
		$consulta = "select count(*) as total from trabajo where trabajo_id = ?";
		$result = $this->pdo->prepare($consulta);
		$result->bindParam(1,$data->persona_cui,PDO::PARAM_STR);
		$result->execute();
		
		if($result->fetchColumn()==0){ //si no existe el dato lo inserto
		try
		{
			//Sentencia SQL.
			$sql = "INSERT INTO trabajo (trabajo_codigo, trabajo_nombre, trabajo_autor, trabajo_tipo, trabajo_pdf, trabajo_enlace, trabajo_estado, trabajo_cantidad_disponible,trabajo_cantidad,trabajo_anio,trabajo_editorial) VALUES ( ?,?, ?, ?, ?, ?, ?, ?,?,?,?)";


			$this->pdo->prepare($sql)
		     ->execute(
				array(
						$data->trabajo_codigo,
						$data->trabajo_nombre,
						$data->trabajo_autor,
						$data->trabajo_tipo,
						$data->trabajo_pdf,
						$data->trabajo_enlace,
						$data->trabajo_estado,
						$data->trabajo_cantidad_disponible,
						$data->trabajo_cantidad,
						$data->trabajo_anio,
						$data->trabajo_editorial
                )
			);
        header('Location: ../Vista/Accion.php?c=trabajo');
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
		}else{
			header("Location: ../Vista/Accion.php?c=alumno&a=error");
		}
	}
	
	public function RegistrarPorArchivo(trabajo $data, $trabajo_equivalencia) {
		try {
			$id_trabajo = 0;

		    $sql = "INSERT INTO trabajo (trabajo_codigo, trabajo_nombre, trabajo_autor, trabajo_tipo, trabajo_pdf, trabajo_enlace, trabajo_estado, trabajo_cantidad_disponible,trabajo_anio,trabajo_editorial) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?,?,?)";
			$this->pdo->prepare($sql)
		     ->execute(
				array(
						$data->trabajo_codigo,
						$data->trabajo_nombre,
						$data->trabajo_autor,
						$data->trabajo_tipo,
						$data->trabajo_pdf,
						$data->trabajo_enlace,
						$data->trabajo_estado,
						$data->trabajo_cantidad_disponible,
						$data->trabajo_anio,
						$data->trabajo_editorial
                )
			);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	
	
	

}
