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
        require_once '../Vista/libro/editar-libros.php';
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
        $pvd->libro_codigo = $_REQUEST['libro_codigo'];
        $pvd->libro_nombre = $_REQUEST['libro_nombre'];
        $pvd->libro_autor = $_REQUEST['libro_autor'];
		$pvd->libro_tipo = $_REQUEST['libro_tipo'];
        $pvd->libro_pdf = "";
        $pvd->libro_enlace = $_REQUEST['libro_enlace'];
        $pvd->libro_estado = 0;
        $pvd->libro_cantidad_disponible = $_REQUEST['libro_cantidad_disponible'];

        //Registro al modelo libro.
        $this->model->Registrar($pvd);
    }

    //Método que modifica el modelo de un proveedor.
    public function Editar(){
        $pvd = new libro();

        $pvd->libro_id = $_REQUEST['libro_id'];
        $pvd->persona_nombres = strtoupper($_REQUEST['persona_nombres']);
        $pvd->persona_apellido1 = strtoupper($_REQUEST['persona_apellido1']);
        $pvd->persona_apellido2 = strtoupper($_REQUEST['persona_apellido2']);
		$pvd->persona_tipo_id = $_REQUEST['persona_tipo_id'];
        $pvd->persona_cui = $_REQUEST['persona_cui'];
        $pvd->persona_direccion = $_REQUEST['persona_direccion'];
        $pvd->persona_email = $_REQUEST['persona_email'];
        $pvd->persona_telefono = $_REQUEST['persona_telefono'];

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
		$pc2 = new usuario();


        $tipo = $_FILES['archivo']['type'];
        $tamanio = $_FILES['archivo']['size'];
        $archivotmp = $_FILES['archivo']['tmp_name'];
        $lineas = file($archivotmp);
        $i = 0;
        foreach ($lineas as $linea_num => $linea) {
            if($i != 0) {
                $datos = explode(";",$linea);
				$hash = password_hash($datos[1], PASSWORD_BCRYPT);
                $pvd->libro_id = $datos[1];

                $pvd->persona_nombres = utf8_encode($datos[2]);
                $pvd->persona_apellido1 = "";
                $pvd->persona_apellido2 = "";

                $pvd->persona_tipo_id = 2;
                $pvd->persona_cui = $datos[1];
                //$pvd->persona_direccion = utf8_encode($datos[5]);
                $pvd->persona_email = utf8_encode($datos[5]);
                //$pvd->persona_telefono = $datos[7];
                $pvd->persona_estado = 0;
				$pc2->usuario_cuenta = $datos[1];
				$pc2->usuario_password = $hash;
				$pc2->usuario_rol_id = 2;
				$pc2->usuario_libro_id = $datos[1];
				$pc2->usuario_estado = 0;
                $this->model->Registrar($pvd);
				$this->model->RegistrarU($pc2);

            }
            $i++;
        }

    }

}
