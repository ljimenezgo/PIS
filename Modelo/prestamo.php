<?php
class prestamo
{
	private $pdo;

    public $prestamo_id;
    public $prestamo_libro_id;
    public $prestamo_persona_id;
    public $prestamo_fecha_entrega;
    public $prestamo_fecha_a_devolver;
    public $prestamo_fecha_devolucion;
    public $prestamo_estado;
    public $prestamo_telefono;
    public $prestamo_direccion;
    public $persona_prestamo_deuda;
    public $libro_nombre;
    public $persona_nombres;
	
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
			//Sentencia SQL para selección de datos.
			
			$stm = $this->pdo->prepare("SELECT * from  prestamo JOIN persona on prestamo.prestamo_persona_id = persona.persona_id JOIN libro on prestamo.prestamo_libro_id=libro.libro_id  WHERE prestamo_estado=0");
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
		public function ListarHistorial()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			
			$stm = $this->pdo->prepare("SELECT * from  prestamo JOIN persona on prestamo.prestamo_persona_id = persona.persona_id JOIN libro on prestamo.prestamo_libro_id=libro.libro_id WHERE prestamo_estado=1 ");
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
	public function ListarAlumnos()
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
	public function ListarLibros()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM libro WHERE libro_estado = 0 AND libro_cantidad_disponible>0");
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

	public function Eliminar($prestamo_id)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("UPDATE prestamo SET prestamo_estado = 1 WHERE prestamo_id = ?");

			$stm->execute(array($prestamo_id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Deudor($prestamo_id)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("UPDATE persona SET persona_prestamo_deuda = persona_prestamo_deuda + 1 WHERE persona_id = ?");

			$stm->execute(array($prestamo_id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function AumentarDisponible($prestamo_libro_id)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("UPDATE libro SET libro_cantidad_disponible = libro_cantidad_disponible + 1 WHERE libro_id = ?");

			$stm->execute(array($prestamo_libro_id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	
		public function DisminuirDisponible($prestamo_libro_id)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("UPDATE libro SET libro_cantidad_disponible = libro_cantidad_disponible - 1 WHERE libro_id = ?");

			$stm->execute(array($prestamo_libro_id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
		
	public function AumentarEntregado($prestamo_libro_id)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("UPDATE libro SET libro_cantidad = libro_cantidad + 1 WHERE libro_id = ?");

			$stm->execute(array($prestamo_libro_id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	
		public function DisminuirEntregado($prestamo_libro_id)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("UPDATE libro SET libro_cantidad = libro_cantidad- 1 WHERE libro_id = ?");

			$stm->execute(array($prestamo_libro_id));
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

	public function Prestamo_Persona(prestamo $data){
		try
		{
			$sql = "update persona set persona_prestamo_total=persona_prestamo_total+1 where persona_id=?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->prestamo_persona_id
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
		
		
	}
	public function Registrar(prestamo $data)
	{
		try
		{
		$sql = "INSERT INTO prestamo (prestamo_id,prestamo_libro_id,prestamo_persona_id,prestamo_fecha_entrega,prestamo_fecha_a_devolver,prestamo_fecha_devolucion,prestamo_estado,prestamo_telefono,prestamo_direccion)
		        VALUES (?, ?, ?, ?, ?,?,?,?,?)";
			
		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    //$data->nota_promedio_id,
                    $data->prestamo_id,
                    $data->prestamo_libro_id,
                    $data->prestamo_persona_id,
                    $data->prestamo_fecha_entrega,
                    $data->prestamo_fecha_a_devolver,
                    $data->prestamo_fecha_devolucion,
                    $data->prestamo_estado,
                    $data->prestamo_telefono,
                    $data->prestamo_direccion
                )
			);
			} catch (Exception $e)
			{
			die($e->getMessage());
		}
	}
}
