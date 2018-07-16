<?php
//Se incluye el modelo donde conectará el controlador.
require_once '../Modelo/contrasena.php';
require_once '../Modelo/usuario.php';
class ContrasenaController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new contrasena();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once '../Vista/lista-direccion.php';

    }

    //Llamado a la vista alumno-editar
    public function CambiarContrasena(){
        $pvd = new contrasena();
        require_once '../Vista/Contrasena/cambio-contrasena.php';
  }
    //Método que modifica el modelo de un proveedor.
    public function Cambiar(){
        $pvd = new contrasena();
		$hash = password_hash($_REQUEST['usuario_password'], PASSWORD_BCRYPT);
        $pvd->usuario_id = $_REQUEST['persona_id'];
        $pvd->usuario_password = $hash;
        $this->model->Actualizar($pvd);

        header('Location: ../Vista/bienvenida.php');
    }

    //Método que elimina la tupla proveedor con el nit dado.
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['persona_id']);
        header('Location: ../Vista/contrasenaVista.php');
    }
}
