<?php
//Se incluye el modelo donde conectará el controlador.
require_once '../Modelo/tesis.php';
require_once '../Modelo/usuario.php';
require_once '../Modelo/database.php';


if(isset($_POST['id_usuario'])) {
    $usuario = $_POST['id_usuario'];
    $modelo = new tesis();
    $pvd = $modelo->Obtener($usuario);
    header('Content-Type: application/json');
    echo json_encode($pvd);
}

class TesisController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new tesis();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once '../Vista/tesis/lista-tesis.php';

    }

    //Llamado a la vista tesis-editar
    public function Crud(){
        $pvd = new tesis();

        //Se obtienen los datos del tesis a editar.
        if(isset($_REQUEST['tesis_id'])){
            $pvd = $this->model->Obtener($_REQUEST['tesis_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/tesis/editar-tesis.php';
	}

	//Llamado a la vista tesis-perfil
    public function Perfil(){
        $pvd = new tesis();

        //Se obtienen los datos del tesis.
        if(isset($_REQUEST['tesis_id'])){
            $pvd = $this->model->Obtener($_REQUEST['tesis_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/tesis/perfil-tesis.php';
	}

    //Llamado a la vista tesis-nuevo
    public function Nuevo(){
        $pvd = new tesis();

        //Llamado de las vistas.
        require_once '../Vista/tesis/agregar-tesis.php';

    }
    //Método que registrar al modelo un nuevo proveedor.
    public function Guardar(){
        $pvd = new tesis();
		$pvd->tesis_error=$_FILES['archivo']['error'];
		$pvd->tesis_size=$_FILES['archivo']['size'];
		$pvd->tesis_name=$_FILES['archivo']['name'];
		$pvd->tesis_type=$_FILES['archivo']['type'];
		$pvd->tesis_tmp_name=$_FILES['archivo']['tmp_name'];
		
        $pvd->tesis_codigo = $_REQUEST['tesis_codigo'];
        $pvd->tesis_nombre = $_REQUEST['tesis_nombre'];
        $pvd->tesis_autor = $_REQUEST['tesis_autor'];
		$pvd->tesis_tipo = $_REQUEST['tesis_tipo'];
        $pvd->tesis_caracteristica = $_REQUEST['tesis_caracteristica'];
        $pvd->tesis_anio = $_REQUEST['tesis_anio'];
        $pvd->tesis_estado = 0;
        $pvd->tesis_cantidad = 0;
        $pvd->tesis_cantidad_disponible = $_REQUEST['tesis_cantidad'];
		
        //Registro al modelo tesis.
        $this->model->Registrar($pvd);
    }

    //Método que modifica el modelo de un proveedor.
    public function Editar(){
        $pvd = new tesis();
		$pvd->tesis_error=$_FILES['archivo']['error'];
		$pvd->tesis_size=$_FILES['archivo']['size'];
		$pvd->tesis_name=$_FILES['archivo']['name'];
		$pvd->tesis_type=$_FILES['archivo']['type'];
		$pvd->tesis_tmp_name=$_FILES['archivo']['tmp_name'];
		
        $pvd->tesis_codigo = $_REQUEST['tesis_codigo'];
        $pvd->tesis_nombre = $_REQUEST['tesis_nombre'];
        $pvd->tesis_autor = $_REQUEST['tesis_autor'];
		$pvd->tesis_tipo = $_REQUEST['tesis_tipo'];
		$pvd->tesis_id = $_REQUEST['tesis_id'];
        $pvd->tesis_caracteristica = $_REQUEST['tesis_caracteristica'];
        $pvd->tesis_anio = $_REQUEST['tesis_anio'];
        $pvd->tesis_estado = 0;
        $pvd->tesis_cantidad = 0;
        $pvd->tesis_cantidad_disponible = $_REQUEST['tesis_cantidad'];

        $this->model->Actualizar($pvd);

        header('Location: ../Vista/Accion.php?c=tesis');
    }

    //Método que elimina la tupla proveedor con el nit dado.
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['tesis_id']);
        header('Location: ../Vista/Accion.php?c=tesis');
    }

    public function GuardarArchivo(){
        $pvd = new tesis();

        $tipo = $_FILES['archivo']['type'];
        $tamanio = $_FILES['archivo']['size'];
        $archivotmp = $_FILES['archivo']['tmp_name'];
        $lineas = file($archivotmp);
        $i = 0;
        foreach ($lineas as $linea_num => $linea) {
            if($i != 0) {
                $datos = explode(";",$linea);
				$pvd->tesis_codigo = utf8_encode($datos[1]);
				$pvd->tesis_nombre = utf8_encode($datos[2]);
				$pvd->tesis_autor =  $datos[3];
				$pvd->tesis_tipo = 2;
				$pvd->tesis_caracteristica = 2;
				$pvd->tesis_anio = $datos[4];
				$pvd->tesis_estado = 0;
				$pvd->tesis_cantidad = 0;
				$pvd->tesis_cantidad_disponible = $datos[5];

                $this->model->Registrar($pvd);
            }
            $i++;
        }

    }

}
