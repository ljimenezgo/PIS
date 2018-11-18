<?php
class tesis
{
	private $pdo;

    public $tesis_id;
    public $tesis_codigo;
    public $tesis_nombre;
    public $tesis_autor;
    public $tesis_tipo;
    public $tesis_enlace;
    public $tesis_estado;
    public $tesis_cantidad_disponible;
    public $tesis_cantidad;
    public $tesis_anio;
    public $tesis_caracteristica;
	
	public $tesis_error;
	public $tesis_size;
	public $tesis_name;
	public $tesis_type;
	public $tesis_tmp_name;
	
	
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
	public function Obtener($tesis_id)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el id del alumno.
			$stm = $this->pdo->prepare("SELECT * FROM libro WHERE libro_id = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro id.
			$stm->execute(array($tesis_id));
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
	public function ListarTesis()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM libro WHERE libro_estado = 0 AND libro_caracteristica = 2");
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
		public function ListarTesisVirtual()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM libro WHERE libro_estado = 0 AND libro_caracteristica = 2 ");
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
						libro_tipo			 = ?,
						libro_estado			 = ?,
						libro_cantidad_disponible		 = ?,
						libro_cantidad		 = ?,
						libro_anio		 = ?,
						libro_caracteristica = ?
						
				    WHERE libro_id = ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$id_insert = $data->tesis_id;
			if($data->tesis_error>0){
				echo "Error al cargar archivo";	
			} else {
				
				$permitidos = array("image/gif","image/png","application/pdf");
				$limite_kb = 2000000;
				
				if(in_array($data->tesis_type, $permitidos) && $data->tesis_size <= $limite_kb * 1024){
					$ruta = '../files/'.$id_insert.'/';
					$archivo = $ruta.$data->tesis_name;
					
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
                        $data->tesis_codigo,
						$data->tesis_nombre,
						$data->tesis_autor,
						$data->tesis_tipo,
						$data->tesis_estado,
						$data->tesis_cantidad_disponible,
						$data->tesis_cantidad,
						$data->tesis_anio,
						$data->tesis_caracteristica,
						$data->tesis_id
					)
				);
				header('Location: ../Vista/Accion.php?c=tesis');
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Eliminar($tesis_id)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("UPDATE libro SET libro_estado = 1 WHERE libro_id = ?");
			$stm->execute(array($tesis_id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function Registrar(tesis $data)
	{
		$consulta = "select count(*) as total from libro where libro_id = ?";
		$result = $this->pdo->prepare($consulta);
		$result->bindParam(1,$data->persona_cui,PDO::PARAM_STR);
		$result->execute();
		
		if($result->fetchColumn()==0){ //si no existe el dato lo inserto
		try
		{
			//Sentencia SQL.
			$sql = "INSERT INTO libro (libro_codigo, libro_nombre, libro_autor, libro_tipo, libro_enlace, libro_estado, libro_cantidad_disponible,libro_cantidad,libro_anio,libro_caracteristica) VALUES ( ?,?, ?, ?, ?, ?, ?,?,?,?)";
			
			$this->pdo->prepare($sql)
		     ->execute(
				array(
						$data->tesis_codigo,
						$data->tesis_nombre,
						$data->tesis_autor,
						$data->tesis_tipo,
						$data->tesis_enlace,
						$data->tesis_estado,
						$data->tesis_cantidad_disponible,
						$data->tesis_cantidad,
						$data->tesis_anio,
						$data->tesis_caracteristica
                )
			);
			$id_insert = $this->pdo->lastInsertId($sql);
			if($data->tesis_error>0){
				echo "Error al cargar archivo";
			} else {
				$permitidos = array("image/gif","image/png","application/pdf");
				$limite_kb = 2000000;
				
				if(in_array($data->tesis_type, $permitidos) && $data->tesis_size <= $limite_kb * 1024){
					$ruta = '../files/'.$id_insert.'/';
					$archivo = $ruta.$data->tesis_name;
					
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
			header('Location: ../Vista/Accion.php?c=tesis');
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
		}else{
			header("Location: ../Vista/Accion.php?c=alumno&a=error");
		}
	}
}
