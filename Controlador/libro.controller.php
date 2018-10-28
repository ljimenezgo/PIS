<?php
//Se incluye el modelo donde conectará el controlador.
require_once '../Modelo/libro.php';
require_once '../Modelo/usuario.php';
require_once '../Modelo/database.php';


if(isset($_POST['id_usuario'])) {
    $usuario = $_POST['id_usuario'];
    $modelo = new libro();
    $pvd = $modelo->Obtener($usuario);
    header('Content-Type: application/json');
    echo json_encode($pvd);
}

class LibroController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new libro();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once '../Vista/libro/lista-libro.php';

    }

    //Llamado a la vista libro-editar
    public function Crud(){
        $pvd = new libro();

        //Se obtienen los datos del libro a editar.
        if(isset($_REQUEST['libro_id'])){
            $pvd = $this->model->Obtener($_REQUEST['libro_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/libro/editar-libro.php';
	}

	//Llamado a la vista libro-perfil
    public function Perfil(){
        $pvd = new libro();

        //Se obtienen los datos del libro.
        if(isset($_REQUEST['libro_id'])){
            $pvd = $this->model->Obtener($_REQUEST['libro_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/libro/perfil-libro.php';
	}

    //Llamado a la vista libro-nuevo
    public function Nuevo(){
        $pvd = new libro();

        //Llamado de las vistas.
        require_once '../Vista/Libro/agregar-libro.php';

    }
    //Método que registrar al modelo un nuevo proveedor.
    public function Guardar(){
        $pvd = new libro();
		$pvd->libro_error=$_FILES['archivo']['error'];
		$pvd->libro_size=$_FILES['archivo']['size'];
		$pvd->libro_name=$_FILES['archivo']['name'];
		$pvd->libro_type=$_FILES['archivo']['type'];
		$pvd->libro_tmp_name=$_FILES['archivo']['tmp_name'];
		
        $pvd->libro_codigo = $_REQUEST['libro_codigo'];
        $pvd->libro_nombre = $_REQUEST['libro_nombre'];
        $pvd->libro_autor = $_REQUEST['libro_autor'];
		$pvd->libro_tipo = $_REQUEST['libro_tipo'];
        $pvd->libro_pdf = "";
        $pvd->libro_caracteristica = $_REQUEST['libro_caracteristica'];
        $pvd->libro_anio = $_REQUEST['libro_anio'];
        $pvd->libro_editorial = $_REQUEST['libro_editorial'];
        $pvd->libro_estado = 0;
        $pvd->libro_cantidad = 0;
        $pvd->libro_cantidad_disponible = $_REQUEST['libro_cantidad'];
		
        //Registro al modelo libro.
        $this->model->Registrar($pvd);
    }

    //Método que modifica el modelo de un proveedor.
    public function Editar(){
        $pvd = new libro();
		$pvd->libro_error=$_FILES['archivo']['error'];
		$pvd->libro_size=$_FILES['archivo']['size'];
		$pvd->libro_name=$_FILES['archivo']['name'];
		$pvd->libro_type=$_FILES['archivo']['type'];
		$pvd->libro_tmp_name=$_FILES['archivo']['tmp_name'];
		
        $pvd->libro_codigo = $_REQUEST['libro_codigo'];
        $pvd->libro_nombre = $_REQUEST['libro_nombre'];
        $pvd->libro_autor = $_REQUEST['libro_autor'];
		$pvd->libro_tipo = $_REQUEST['libro_tipo'];
        $pvd->libro_pdf = "";
		$pvd->libro_id = $_REQUEST['libro_id'];
        $pvd->libro_caracteristica = $_REQUEST['libro_caracteristica'];
        $pvd->libro_anio = $_REQUEST['libro_anio'];
        $pvd->libro_editorial = $_REQUEST['libro_editorial'];
        $pvd->libro_estado = 0;
        $pvd->libro_cantidad = 0;
        $pvd->libro_cantidad_disponible = $_REQUEST['libro_cantidad'];

        $this->model->Actualizar($pvd);

        header('Location: ../Vista/Accion.php?c=libro');
    }

    //Método que elimina la tupla proveedor con el nit dado.
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['libro_id']);
        header('Location: ../Vista/Accion.php?c=libro');
    }

    public function GuardarArchivo(){
        $pvd = new libro();

        $tipo = $_FILES['archivo']['type'];
        $tamanio = $_FILES['archivo']['size'];
        $archivotmp = $_FILES['archivo']['tmp_name'];
        $lineas = file($archivotmp);
        $i = 0;
        foreach ($lineas as $linea_num => $linea) {
            if($i != 0) {
                $datos = explode(";",$linea);
				$pvd->libro_codigo = utf8_encode($datos[1]);
				$pvd->libro_nombre = utf8_encode($datos[2]);
				$pvd->libro_autor =  $datos[3];
				$pvd->libro_tipo = 2;
				$pvd->libro_pdf = "";
				$pvd->libro_caracteristica = 1;
				$pvd->libro_anio = $datos[4];
				$pvd->libro_editorial = $datos[5];
				$pvd->libro_estado = 0;
				$pvd->libro_cantidad = 0;
				$pvd->libro_cantidad_disponible = $datos[6];

                $this->model->Registrar($pvd);
            }
            $i++;
        }

    }

}
