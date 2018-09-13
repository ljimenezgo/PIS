<?php
class contrasena
{
	private $pdo;

    public $usuario_id;
    public $usuario_cuenta;
    public $usuario_password;
	
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

	public function Obtener($usuario_id)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM usuario WHERE usuario_id = ?");
			$stm->execute(array($usuario_id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE usuario SET
						usuario_password		 = ?
						
				    WHERE usuario_id = ?";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(

                        $data->usuario_password,
						$data->usuario_id

					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}


}
