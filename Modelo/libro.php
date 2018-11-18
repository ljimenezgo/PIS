<?php
class libro
{
	private $pdo;

    public $libro_id;
    public $libro_codigo;
    public $libro_nombre;
    public $libro_autor;
    public $libro_tipo;
    public $libro_pdf;
    public $libro_enlace;
    public $libro_estado;
    public $libro_cantidad_disponible;
    public $libro_cantidad;
    public $libro_anio;
    public $libro_editorial;
    public $libro_caracteristica;
	
	public $libro_error;
	public $libro_size;
	public $libro_name;
	public $libro_type;
	public $libro_tmp_name;
	
	
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
	public function Obtener($libro_id)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el id del alumno.
			$stm = $this->pdo->prepare("SELECT * FROM libro WHERE libro_id = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro id.
			$stm->execute(array($libro_id));
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
	
	public function ListarLibro()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM libro WHERE libro_estado = 0 AND libro_caracteristica = 1");
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
	public function ListarLibroVirtual()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM libro WHERE libro_estado = 0 AND libro_caracteristica = 1 ");
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
						libro_pdf				 = ?,
						libro_estado			 = ?,
						libro_cantidad_disponible		 = ?,
						libro_cantidad		 = ?,
						libro_anio		 = ?,
						libro_editorial		 = ?,
						libro_caracteristica = ?
						
				    WHERE libro_id = ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$id_insert = $data->libro_id;
			if($data->libro_error>0){
				echo "Error al cargar archivo";	
			} else {
				
				$permitidos = array("image/gif","image/png","application/pdf");
				$limite_kb = 2000000;
				
				if(in_array($data->libro_type, $permitidos) && $data->libro_size <= $limite_kb * 1024){
					$ruta = '../files/'.$id_insert.'/';
					$archivo = $ruta.$data->libro_name;
					
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
                        $data->libro_codigo,
						$data->libro_nombre,
						$data->libro_autor,
						$data->libro_tipo,
						$data->libro_pdf,
						$data->libro_estado,
						$data->libro_cantidad_disponible,
						$data->libro_cantidad,
						$data->libro_anio,
						$data->libro_editorial,
						$data->libro_caracteristica,
						$data->libro_id
					)
				);
				header('Location: ../Vista/Accion.php?c=libro');
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Eliminar($libro_id)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("UPDATE libro SET libro_estado = 1 WHERE libro_id = ?");
			$stm->execute(array($libro_id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function Registrar(libro $data)
	{
		$consulta = "select count(*) as total from libro where libro_id = ?";
		$result = $this->pdo->prepare($consulta);
		$result->bindParam(1,$data->persona_cui,PDO::PARAM_STR);
		$result->execute();
		
		if($result->fetchColumn()==0){ //si no existe el dato lo inserto
		try
		{
			//Sentencia SQL.
			$sql = "INSERT INTO libro (libro_codigo, libro_nombre, libro_autor, libro_tipo, libro_pdf, libro_enlace, libro_estado, libro_cantidad_disponible,libro_cantidad,libro_anio,libro_editorial,libro_caracteristica) VALUES ( ?,?,?, ?, ?, ?, ?, ?, ?,?,?,?)";
			
			$this->pdo->prepare($sql)
		     ->execute(
				array(
						$data->libro_codigo,
						$data->libro_nombre,
						$data->libro_autor,
						$data->libro_tipo,
						$data->libro_pdf,
						$data->libro_enlace,
						$data->libro_estado,
						$data->libro_cantidad_disponible,
						$data->libro_cantidad,
						$data->libro_anio,
						$data->libro_editorial,
						$data->libro_caracteristica
                )
			);
			$id_insert = $this->pdo->lastInsertId($sql);
			if($data->libro_error>0){
				echo "Error al cargar archivo";
			} else {
				$permitidos = array("image/gif","image/png","application/pdf");
				$limite_kb = 2000000;
				
				if(in_array($data->libro_type, $permitidos) && $data->libro_size <= $limite_kb * 1024){
					$ruta = '../files/'.$id_insert.'/';
					$archivo = $ruta.$data->libro_name;
					
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
			header('Location: ../Vista/Accion.php?c=libro');
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
		}else{
			header("Location: ../Vista/Accion.php?c=alumno&a=error");
		}
	}
}
