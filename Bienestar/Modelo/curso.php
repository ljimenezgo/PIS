<?php
class curso
{
	//Atributo para conexión a SGBD
	private $pdo;

    public $curso_id;
    public $curso_codigo;
    public $curso_descripcion;
    public $curso_malla_id;
    public $curso_equivalencia_id;

	
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

	//Método que registra una nueva malla junto con sus cursos a la tabla.
	public function RegistrarPorArchivo(curso $data, $curso_equivalencia) {
		try {
			/*
			$cursoc = new curso();
			$stm = $this->pdo->prepare("SELECT * FROM curso WHERE curso_codigo = ?");
			$stm->execute(array($curso_equivalencia));
			$cursoc = $stm->fetch(PDO::FETCH_OBJ);
			if (!is_null($cursoc->curso_id)) {
				$id_curso = $cursoc->curso_id;
			} else {
				$id_curso = 0;
			}*/
			
			$id_curso = 0;

		    $sql = "INSERT INTO curso (curso_codigo, curso_descripcion, curso_malla_id, curso_equivalencia_id) VALUES (?, ?, ?, ?)";
			$this->pdo->prepare($sql)
		     ->execute(
				array(
						$data->curso_codigo,
                        $data->curso_descripcion,
                        $data->curso_malla_id,
                        $id_curso
                )
			);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	
	
	

}
