<?php
//Se incluye el modelo donde conectará el controlador.
require_once '../Modelo/alumno.php';
require_once '../Modelo/usuario.php';
require_once '../Modelo/database.php';
require_once '../Modelo/comentar.php';


if(isset($_POST['id_usuario'])) {
    $usuario = $_POST['id_usuario'];
    $modelo = new alumno();
    $pvd = $modelo->Obtener($usuario);
    header('Content-Type: application/json');
    echo json_encode($pvd);
}

class AlumnoController{

    private $model;
    private $modeloo;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new alumno();
        $this->modeloo = new comentar();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once '../Vista/Alumno/lista-alumnos.php';

    }

    //Llamado a la vista alumno-editar
    public function Crud(){
        $pvd = new alumno();

        //Se obtienen los datos del alumno a editar.
        if(isset($_REQUEST['persona_id'])){
            $pvd = $this->model->Obtener($_REQUEST['persona_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/Alumno/editar-alumnos.php';
	}

	//Llamado a la vista alumno-perfil
    public function Perfil(){
        $pvd = new alumno();

        //Se obtienen los datos del alumno.
        if(isset($_REQUEST['persona_id'])){
            $pvd = $this->model->Obtener($_REQUEST['persona_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/Alumno/perfil-alumno.php';
	}

    //Llamado a la vista alumno-nuevo
    public function Nuevo(){
        $pvd = new alumno();

        //Llamado de las vistas.
        require_once '../Vista/Alumno/agregar-alumnos.php';

    }

    //Método que registrar al modelo un nuevo proveedor.
    public function Guardar(){
        $pvd = new alumno();
		$pc2 = new usuario();
		$hash = password_hash($_REQUEST['persona_cui'], PASSWORD_BCRYPT);
        //Captura de los datos del formulario (vista).
        $pvd->persona_id = $_REQUEST['persona_cui'];
        $pvd->persona_nombres = $_REQUEST['persona_nombres'];
        $pvd->persona_apellido1 = $_REQUEST['persona_apellido1'];
        $pvd->persona_apellido2 = $_REQUEST['persona_apellido2'];
		$pvd->persona_tipo_id = $_REQUEST['persona_tipo_id'];
        $pvd->persona_cui = $_REQUEST['persona_cui'];
        $pvd->persona_direccion = $_REQUEST['persona_direccion'];
        $pvd->persona_email = $_REQUEST['persona_email'];
        $pvd->persona_telefono = $_REQUEST['persona_telefono'];
        $pvd->persona_estado = $_REQUEST['persona_estado'];
		$pc2->usuario_id = $_REQUEST['usuario_id'];
        $pc2->usuario_cuenta = $_REQUEST['persona_cui'];
        $pc2->usuario_password = $hash;
        $pc2->usuario_rol_id = $_REQUEST['persona_tipo_id'];
		$pc2->usuario_persona_id = $_REQUEST['persona_cui'];;
        $pc2->usuario_estado = $_REQUEST['persona_estado'];
        
        //Registro al modelo alumno.
        $this->model->Registrar($pvd);
        $this->model->RegistrarU($pc2);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
    }

    //Método que modifica el modelo de un proveedor.
    public function Editar(){
        $pvd = new alumno();

        $pvd->persona_id = $_REQUEST['persona_id'];
        $pvd->persona_nombres = $_REQUEST['persona_nombres'];
        $pvd->persona_apellido1 = $_REQUEST['persona_apellido1'];
        $pvd->persona_apellido2 = $_REQUEST['persona_apellido2'];
		$pvd->persona_tipo_id = $_REQUEST['persona_tipo_id'];
        $pvd->persona_cui = $_REQUEST['persona_cui'];
        $pvd->persona_direccion = $_REQUEST['persona_direccion'];
        $pvd->persona_email = $_REQUEST['persona_email'];
        $pvd->persona_telefono = $_REQUEST['persona_telefono'];

        $this->model->Actualizar($pvd);

        header('Location: ../Vista/Accion.php?c=alumno');
    }

    //Método que elimina la tupla proveedor con el nit dado.
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['persona_id']);
        header('Location: ../Vista/Accion.php?c=alumno');
    }

    public function GuardarArchivo(){
        $pvd = new alumno();
		$pc2 = new usuario();
		

        $tipo = $_FILES['archivo']['type'];
        $tamanio = $_FILES['archivo']['size'];
        $archivotmp = $_FILES['archivo']['tmp_name'];
        $lineas = file($archivotmp);
        $i = 0;
        foreach ($lineas as $linea_num => $linea) { 
            if($i != 0) { 
                $datos = explode(",",$linea);
				$hash = password_hash($datos[4], PASSWORD_BCRYPT);
                $pvd->persona_id = $datos[4];
                $pvd->persona_nombres = utf8_encode($datos[0]);
                $pvd->persona_apellido1 = utf8_encode($datos[1]);
                $pvd->persona_apellido2 = utf8_encode($datos[2]);
                $pvd->persona_tipo_id = 2;
                $pvd->persona_cui = $datos[4];
                $pvd->persona_direccion = utf8_encode($datos[5]);
                $pvd->persona_email = utf8_encode($datos[6]);
                $pvd->persona_telefono = $datos[7];
                $pvd->persona_estado = $datos[8];
				$pc2->usuario_cuenta = $datos[4];
				$pc2->usuario_password = $hash;
				$pc2->usuario_rol_id = 2;
				$pc2->usuario_persona_id = $datos[4];
				$pc2->usuario_estado = 0;
                $this->model->Registrar($pvd);
				$this->model->RegistrarU($pc2);

            }
            $i++;
        }

    }

}
