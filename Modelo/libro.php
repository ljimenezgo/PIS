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
	
	public function Listar()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM libro");
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
	//Este método elimina la tupla alumno dado un id.
	public function Eliminar($libro_codigo)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("UPDATE libro SET libro_estado = 1 WHERE libro_codigo = ?");

			$stm->execute(array($libro_codigo));
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
			$sql = "INSERT INTO libro (libro_codigo, libro_nombre, libro_autor, libro_tipo, libro_pdf, libro_enlace, libro_estado, libro_cantidad_disponible) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";


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
						$data->libro_cantidad_disponible
                )
			);
        header('Location: ../Vista/Accion.php?c=libro');
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
		}else{
			header("Location: ../Vista/Accion.php?c=alumno&a=error");
		}
	}
	
	public function RegistrarPorArchivo(libro $data, $libro_equivalencia) {
		try {
			$id_libro = 0;

		    $sql = "INSERT INTO libro (libro_codigo, libro_nombre, libro_autor, libro_tipo, libro_pdf, libro_enlace, libro_estado, libro_cantidad_disponible) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";
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
                        $id_libro
                )
			);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	
	
	

}
