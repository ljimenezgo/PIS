<?php
//Se incluye el modelo donde conectará el controlador.
require_once '../Modelo/colaborador.php';
require_once '../Modelo/usuario.php';
require_once '../Modelo/database.php';
require_once '../Modelo/comentar.php';


if(isset($_POST['id_usuario'])) {
    $usuario = $_POST['id_usuario'];
    $modelo = new colaborador();
    $pvd = $modelo->Obtener($usuario);
    header('Content-Type: application/json');
    echo json_encode($pvd);
}

class ColaboradorController{

    private $model;
    private $modeloo;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new colaborador();
        $this->modeloo = new comentar();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once '../Vista/colaborador/lista-colaborador.php';

    }
	public function error(){
        require_once '../Vista/error.php';
    }
	public function errorColaborador(){
		require_once '../Vista/errorColaborador.php';
	}
    //Llamado a la vista colaborador-editar
    public function Crud(){
        $pvd = new colaborador();

        //Se obtienen los datos del colaborador a editar.
        if(isset($_REQUEST['persona_id'])){
            $pvd = $this->model->Obtener($_REQUEST['persona_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/colaborador/editar-colaborador.php';
	}

	//Llamado a la vista colaborador-perfil
    public function Perfil(){
        $pvd = new colaborador();

        //Se obtienen los datos del colaborador.
        if(isset($_REQUEST['persona_id'])){
            $pvd = $this->model->Obtener($_REQUEST['persona_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/colaborador/perfil-colaborador.php';
	}

    //Llamado a la vista colaborador-nuevo
    public function Nuevo(){
        $pvd = new colaborador();

        //Llamado de las vistas.
        require_once '../Vista/colaborador/agregar-colaborador.php';

    }
	//Método que registrar al modelo un nuevo proveedor.
    public function GuardarExistente(){
        $pvd = new colaborador();
        $pvd->persona_id = $_REQUEST['persona_id'];
        $pvd->persona_colaborador = 1;
        $this->model->RegistrarExistente($pvd);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
    }
    //Método que registrar al modelo un nuevo proveedor.
    public function Guardar(){
        $pvd = new colaborador();
		$pc2 = new usuario();
		$hash = password_hash($_REQUEST['persona_dni'], PASSWORD_BCRYPT);
        //Captura de los datos del formulario (vista).
        $pvd->persona_id = $_REQUEST['persona_dni'];
        $pvd->persona_nombres = strtoupper(''.$_REQUEST['persona_apellido1'].'/'.$_REQUEST['persona_apellido2'].", ".$_REQUEST['persona_nombres']);
        $pvd->persona_apellido1 = "";
        $pvd->persona_apellido2 = "";
		$pvd->persona_tipo_id = $_REQUEST['persona_tipo_id'];
		$pvd->persona_colaborador = $_REQUEST['persona_colaborador'];
        $pvd->persona_dni = $_REQUEST['persona_dni'];
        $pvd->persona_direccion = $_REQUEST['persona_direccion'];
        $pvd->persona_email = $_REQUEST['persona_email'];
        $pvd->persona_telefono = $_REQUEST['persona_telefono'];
        $pvd->persona_estado = $_REQUEST['persona_estado'];
		$pvd->persona_prestamo = $_REQUEST['persona_prestamo'];
        $pc2->usuario_cuenta = $_REQUEST['persona_dni'];
        $pc2->usuario_password = $hash;
        $pc2->usuario_rol_id = $_REQUEST['persona_tipo_id'];
		$pc2->usuario_persona_id = $_REQUEST['persona_dni'];;
        $pc2->usuario_estado = $_REQUEST['persona_estado'];
		

        //Registro al modelo colaborador.
        $this->model->Registrar($pvd);
        $this->model->RegistrarU($pc2);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
    }

    //Método que modifica el modelo de un proveedor.
    public function Editar(){
        $pvd = new colaborador();

        $pvd->persona_id = $_REQUEST['persona_id'];
        $pvd->persona_nombres = strtoupper($_REQUEST['persona_nombres']);
        $pvd->persona_apellido1 = strtoupper($_REQUEST['persona_apellido1']);
        $pvd->persona_apellido2 = strtoupper($_REQUEST['persona_apellido2']);
		$pvd->persona_tipo_id = $_REQUEST['persona_tipo_id'];
        $pvd->persona_dni = $_REQUEST['persona_dni'];
        $pvd->persona_direccion = $_REQUEST['persona_direccion'];
        $pvd->persona_email = $_REQUEST['persona_email'];
        $pvd->persona_telefono = $_REQUEST['persona_telefono'];
		$pvd->persona_prestamo = $_REQUEST['persona_prestamo'];

        $this->model->Actualizar($pvd);

        header('Location: ../Vista/Accion.php?c=colaborador');
    }

    //Método que elimina la tupla proveedor con el nit dado.
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['persona_id']);
        header('Location: ../Vista/Accion.php?c=colaborador');
    }

    public function GuardarArchivo(){
        $pvd = new colaborador();
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
                $pvd->persona_id = $datos[1];

                $pvd->persona_nombres = utf8_encode($datos[2]);
                $pvd->persona_apellido1 = "";
                $pvd->persona_apellido2 = "";
				$pvd->persona_prestamo=0;
                $pvd->persona_tipo_id = 2;
                $pvd->persona_dni = $datos[1];
                //$pvd->persona_direccion = utf8_encode($datos[5]);
                $pvd->persona_email = utf8_encode($datos[5]);
                //$pvd->persona_telefono = $datos[7];
                $pvd->persona_estado = 0;
				$pc2->usuario_cuenta = $datos[1];
				$pc2->usuario_password = $hash;
				$pc2->usuario_rol_id = 2;
				$pc2->usuario_persona_id = $datos[1];
				$pc2->usuario_estado = 0;
                $this->model->Registrar($pvd);
				$this->model->RegistrarU($pc2);

            }
            $i++;
        }

    }

}
