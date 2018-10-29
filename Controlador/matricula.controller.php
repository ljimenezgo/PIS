<?php
//Se incluye el modelo donde conectará el controlador.
require_once '../Modelo/matricula.php';
require_once '../Modelo/usuario.php';
require_once '../Modelo/database.php';


if(isset($_POST['id_usuario'])) {
    $usuario = $_POST['id_usuario'];
    $modelo = new matricula();
    $pvd = $modelo->Obtener($usuario);
    header('Content-Type: application/json');
    echo json_encode($pvd);
}

class matriculaController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new matricula();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once '../Vista/matricula/lista-matricula.php';

    }

    //Llamado a la vista matricula-editar
    public function Crud(){
        $pvd = new matricula();

        //Se obtienen los datos del matricula a editar.
        if(isset($_REQUEST['matricula_id'])){
            $pvd = $this->model->Obtener($_REQUEST['matricula_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/matricula/editar-matricula.php';
	}
	

	//Llamado a la vista matricula-perfil
    public function Perfil(){
        $pvd = new matricula();

        //Se obtienen los datos del matricula.
        if(isset($_REQUEST['matricula_id'])){
            $pvd = $this->model->Obtener($_REQUEST['matricula_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/matricula/perfil-matricula.php';
	}

    //Llamado a la vista matricula-nuevo
    public function Nuevo(){
        $pvd = new matricula();

        //Llamado de las vistas.
        require_once '../Vista/matricula/agregar-matricula.php';

    }
    //Método que registrar al modelo un nuevo proveedor.
    public function Guardar(){
        $pvd = new matricula();

        $pvd->matricula_anio = $_REQUEST['matricula_anio'];
        $pvd->matricula_semestre = $_REQUEST['matricula_semestre'];
        $pvd->matricula_tipo = $_REQUEST['matricula_tipo'];
		$pvd->matricula_descripcion = $_REQUEST['matricula_descripcion'];
        $pvd->matricula_fecha_inicio = $_REQUEST['matricula_fecha_inicio'];
        $pvd->matricula_fecha_fin = $_REQUEST['matricula_fecha_fin'];
        $pvd->matricula_estado = $_REQUEST['matricula_estado'];
		
        //Registro al modelo matricula.
        $this->model->Registrar($pvd);
    }

    //Método que modifica el modelo de un proveedor.
    public function Editar(){
        $pvd = new matricula();
		$pvd->matricula_anio = $_REQUEST['matricula_anio'];
        $pvd->matricula_semestre = $_REQUEST['matricula_semestre'];
        $pvd->matricula_tipo = $_REQUEST['matricula_tipo'];
		$pvd->matricula_descripcion = $_REQUEST['matricula_descripcion'];
        $pvd->matricula_fecha_inicio = $_REQUEST['matricula_fecha_inicio'];
        $pvd->matricula_fecha_fin = $_REQUEST['matricula_fecha_fin'];
        $pvd->matricula_estado = $_REQUEST['matricula_estado'];

        $this->model->Actualizar($pvd);
		header('Location: ../Vista/Accion.php?c=matricula');
    }

    //Método que elimina la tupla proveedor con el nit dado.
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['matricula_id']);
        header('Location: ../Vista/Accion.php?c=matricula');
    }

    
}
