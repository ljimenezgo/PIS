<?php
//Se incluye el modelo donde conectará el controlador.
require_once '../Modelo/trabajo.php';
require_once '../Modelo/usuario.php';
require_once '../Modelo/database.php';


if(isset($_POST['id_usuario'])) {
    $usuario = $_POST['id_usuario'];
    $modelo = new trabajo();
    $pvd = $modelo->Obtener($usuario);
    header('Content-Type: application/json');
    echo json_encode($pvd);
}

class trabajoController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new trabajo();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once '../Vista/trabajo/lista-trabajo.php';

    }

    //Llamado a la vista trabajo-editar
    public function Crud(){
        $pvd = new trabajo();

        //Se obtienen los datos del trabajo a editar.
        if(isset($_REQUEST['trabajo_id'])){
            $pvd = $this->model->Obtener($_REQUEST['trabajo_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/trabajo/editar-trabajo.php';
	}

	//Llamado a la vista trabajo-perfil
    public function Perfil(){
        $pvd = new trabajo();

        //Se obtienen los datos del trabajo.
        if(isset($_REQUEST['trabajo_id'])){
            $pvd = $this->model->Obtener($_REQUEST['trabajo_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/trabajo/perfil-trabajo.php';
	}

    //Llamado a la vista trabajo-nuevo
    public function Nuevo(){
        $pvd = new trabajo();

        //Llamado de las vistas.
        require_once '../Vista/trabajo/agregar-trabajo.php';

    }
    //Método que registrar al modelo un nuevo proveedor.
    public function Guardar(){
        $pvd = new trabajo();
		$pvd->trabajo_error=$_FILES['archivo']['error'];
		$pvd->trabajo_size=$_FILES['archivo']['size'];
		$pvd->trabajo_name=$_FILES['archivo']['name'];
		$pvd->trabajo_type=$_FILES['archivo']['type'];
		$pvd->trabajo_tmp_name=$_FILES['archivo']['tmp_name'];

        $pvd->trabajo_codigo = $_REQUEST['trabajo_codigo'];
        $pvd->trabajo_nombre = $_REQUEST['trabajo_nombre'];
        $pvd->trabajo_autor = $_REQUEST['trabajo_autor'];
        $pvd->trabajo_cargo = $_REQUEST['trabajo_cargo'];
        $pvd->trabajo_titulo = $_REQUEST['trabajo_titulo'];
		$pvd->trabajo_tipo = $_REQUEST['trabajo_tipo'];
        $pvd->trabajo_pdf = "";
        $pvd->trabajo_caracteristica = $_REQUEST['trabajo_caracteristica'];
        $pvd->trabajo_anio = $_REQUEST['trabajo_anio'];
        $pvd->trabajo_editorial = $_REQUEST['trabajo_editorial'];
        $pvd->trabajo_estado = 0;
        $pvd->trabajo_cantidad = 0;
        $pvd->trabajo_cantidad_disponible = $_REQUEST['trabajo_cantidad'];

        //Registro al modelo trabajo.
        $this->model->Registrar($pvd);
    }

    //Método que modifica el modelo de un proveedor.
    public function Editar(){
        $pvd = new trabajo();
		$pvd->trabajo_error=$_FILES['archivo']['error'];
		$pvd->trabajo_size=$_FILES['archivo']['size'];
		$pvd->trabajo_name=$_FILES['archivo']['name'];
		$pvd->trabajo_type=$_FILES['archivo']['type'];
		$pvd->trabajo_tmp_name=$_FILES['archivo']['tmp_name'];
    $pvd->trabajo_cargo = $_REQUEST['trabajo_cargo'];
    $pvd->trabajo_titulo = $_REQUEST['trabajo_titulo'];
        $pvd->trabajo_codigo = $_REQUEST['trabajo_codigo'];
        $pvd->trabajo_nombre = $_REQUEST['trabajo_nombre'];
        $pvd->trabajo_autor = $_REQUEST['trabajo_autor'];
		$pvd->trabajo_tipo = $_REQUEST['trabajo_tipo'];
        $pvd->trabajo_pdf = "";
		$pvd->trabajo_id = $_REQUEST['trabajo_id'];
        $pvd->trabajo_caracteristica = $_REQUEST['trabajo_caracteristica'];
        $pvd->trabajo_anio = $_REQUEST['trabajo_anio'];
        $pvd->trabajo_editorial = $_REQUEST['trabajo_editorial'];
        $pvd->trabajo_estado = 0;
        $pvd->trabajo_cantidad = 0;
        $pvd->trabajo_cantidad_disponible = $_REQUEST['trabajo_cantidad'];

        $this->model->Actualizar($pvd);

        header('Location: ../Vista/Accion.php?c=trabajo');
    }

    //Método que elimina la tupla proveedor con el nit dado.
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['trabajo_id']);
        header('Location: ../Vista/Accion.php?c=trabajo');
    }

    public function GuardarArchivo(){
        $pvd = new trabajo();

        $tipo = $_FILES['archivo']['type'];
        $tamanio = $_FILES['archivo']['size'];
        $archivotmp = $_FILES['archivo']['tmp_name'];
        $lineas = file($archivotmp);
        $i = 0;
        foreach ($lineas as $linea_num => $linea) {
            if($i != 0) {
                $datos = explode(";",$linea);
				$pvd->trabajo_codigo = utf8_encode($datos[1]);
				$pvd->trabajo_nombre = utf8_encode($datos[2]);
				$pvd->trabajo_autor =  $datos[3];
				$pvd->trabajo_tipo = 2;
				$pvd->trabajo_pdf = "";
				$pvd->trabajo_caracteristica = 3;
				$pvd->trabajo_anio = $datos[4];
				$pvd->trabajo_editorial = $datos[5];
				$pvd->trabajo_estado = 0;
				$pvd->trabajo_cantidad = 0;
				$pvd->trabajo_cantidad_disponible = $datos[6];

                $this->model->Registrar($pvd);
            }
            $i++;
        }

    }

}
