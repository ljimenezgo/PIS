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
		public $trabajo_caracteristica;
		public $trabajo_titulo;
		public $trabajo_cargo;

	public $trabajo_error;
	public $trabajo_size;
	public $trabajo_name;
	public $trabajo_type;
	public $trabajo_tmp_name;


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
			$stm = $this->pdo->prepare("SELECT * FROM libro WHERE libro_id = ?");
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
			$stm = $this->pdo->prepare("SELECT * FROM libro WHERE libro_estado = 0 ");
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
	public function ListarTrabajo()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM libro WHERE libro_estado = 0 AND libro_caracteristica = 3");
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
			$sql = "UPDATE libro SET
						libro_codigo          = ?,
						libro_nombre        = ?,
						libro_autor        = ?,
						trabajo_titulo        = ?,
						trabajo_cargo        = ?,
						libro_tipo			 = ?,
						libro_pdf				 = ?,
						libro_estado			 = ?,
						libro_cantidad_disponible		 = ?,
						libro_cantidad		 = ?,
						libro_anio		 = ?,
						libro_editorial		 = ?,
						libro_caracteristica = ?

				    WHERE libro_id = ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$id_insert = $data->trabajo_id;
			if($data->trabajo_error>0){
				echo "Error al cargar archivo";
			} else {

				$permitidos = array("image/gif","image/png","application/pdf");
				$limite_kb = 2000000;

				if(in_array($data->trabajo_type, $permitidos) && $data->trabajo_size <= $limite_kb * 1024){
					$ruta = '../files/'.$id_insert.'/';
					$archivo = $ruta.$data->trabajo_name;

					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if(!file_exists($archivo)){

						$resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo);

						if($resultado){
							echo "Archivo Guardado";
						} else {
							echo "Error al guardar archivo";
						}

					} else {
						echo "Archivo ya existe";
					}
				} else {
					echo "Archivo no permitido o excede el tamaño";
				}

			}
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->trabajo_codigo,
						$data->trabajo_nombre,
						$data->trabajo_autor,
						$data->trabajo_titulo,
						$data->trabajo_cargo,
						$data->trabajo_tipo,
						$data->trabajo_pdf,
						$data->trabajo_estado,
						$data->trabajo_cantidad_disponible,
						$data->trabajo_cantidad,
						$data->trabajo_anio,
						$data->trabajo_editorial,
						$data->trabajo_caracteristica,
						$data->trabajo_id
					)
				);
				header('Location: ../Vista/Accion.php?c=trabajo');
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
			            ->prepare("UPDATE libro SET libro_estado = 1 WHERE libro_id = ?");
			$stm->execute(array($trabajo_id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(trabajo $data)
	{
		$consulta = "select count(*) as total from libro where libro_id = ?";
		$result = $this->pdo->prepare($consulta);
		$result->bindParam(1,$data->persona_cui,PDO::PARAM_STR);
		$result->execute();

		if($result->fetchColumn()==0){ //si no existe el dato lo inserto
		try
		{
			//Sentencia SQL.
			$sql = "INSERT INTO libro (libro_codigo,trabajo_titulo,trabajo_cargo, libro_nombre, libro_autor, libro_tipo, libro_pdf, libro_enlace, libro_estado, libro_cantidad_disponible,libro_cantidad,libro_anio,libro_editorial,libro_caracteristica) VALUES ( ?,?,?,?,?, ?, ?, ?, ?, ?, ?,?,?,?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->trabajo_codigo,
					$data->trabajo_titulo,
					$data->trabajo_cargo,
						$data->trabajo_nombre,
						$data->trabajo_autor,
						$data->trabajo_tipo,
						$data->trabajo_pdf,
						$data->trabajo_enlace,
						$data->trabajo_estado,
						$data->trabajo_cantidad_disponible,
						$data->trabajo_cantidad,
						$data->trabajo_anio,
						$data->trabajo_editorial,
						$data->trabajo_caracteristica
                )
			);
			$id_insert = $this->pdo->lastInsertId($sql);
			if($data->trabajo_error>0){
				echo "Error al cargar archivo";
			} else {
				$permitidos = array("image/gif","image/png","application/pdf");
				$limite_kb = 2000000;

				if(in_array($data->trabajo_type, $permitidos) && $data->trabajo_size <= $limite_kb * 1024){
					$ruta = '../files/'.$id_insert.'/';
					$archivo = $ruta.$data->trabajo_name;

					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if(!file_exists($archivo)){

						$resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo);

						if($resultado){
							echo "Archivo Guardado";
						} else {
							echo "Error al guardar archivo";
						}

					} else {
						echo "Archivo ya existe";
					}
				} else {
					echo "Archivo no permitido o excede el tamaño";
				}

			}
			header('Location: ../Vista/Accion.php?c=trabajo');
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
		}else{
			header("Location: ../Vista/Accion.php?c=alumno&a=error");
		}
	}
}
