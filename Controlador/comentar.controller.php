<?php
//Se incluye el modelo donde conectará el controlador.
require_once '../Modelo/comentar.php';
require_once '../Modelo/usuario.php';
require_once '../Modelo/database.php';


if(isset($_POST['id_usuario'])) {
    $usuario = $_POST['id_usuario'];
    // $rpta =$arr = array ('a'=>1,'b'=>2,'c'=>3,'d'=>4,'e'=>5);
    // $rpta = $pvd = new comentar();
    $modelo = new comentar();
    $pvd = $modelo->Obtener($usuario);
    header('Content-Type: application/json');
    echo json_encode($pvd);
}

class ComentarController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new comentar();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once '../Vista/Comentar/form-comentar.php';

    }

    //Llamado a la vista comentar-editar
    public function comentario(){
        $pvd = new comentar();

        //Se obtienen los datos del comentar a editar.
        if(isset($_REQUEST['persona_id'])){
            $pvd = $this->model->Obtener($_REQUEST['persona_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/Comentar/form-comentar.php';
	}

	//Llamado a la vista comentar-perfil
    public function Perfil(){
        $pvd = new comentar();

        //Se obtienen los datos del comentar.
        if(isset($_REQUEST['persona_id'])){
            $pvd = $this->model->Obtener($_REQUEST['persona_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/perfil-comentar.php';
	}

    //Llamado a la vista comentar-nuevo
    public function Nuevo(){
        $pvd = new comentar();

        //Llamado de las vistas.
        require_once '../Vista/agregar-comentars.php';

    }

    //Método que registrar al modelo un nuevo proveedor.
    public function EnviarComentario(){
        $pvd = new comentar();
        //Captura de los datos del formulario (vista).
        $pvd->comentarios_docente_docente_id = $_REQUEST['usuario_persona_id'];
        $pvd->comentarios_docente_alumno_id = $_REQUEST['persona_cui'];
        $pvd->comentarios_docente_comentario = $_REQUEST['comentarios_docente_comentario'];
        
        //Registro al modelo comentar.
        $this->model->EnviarComentario($pvd);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: ../Vista/Accion.php?c=alumno&a=Perfil&persona_id='.$_REQUEST['persona_cui']);
    }

    //Método que modifica el modelo de un proveedor.
    public function Editar(){
        $pvd = new comentar();

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

        header('Location: ../Vista/comentarVista.php');
    }

    //Método que elimina la tupla proveedor con el nit dado.
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['persona_id']);
        header('Location: ../Vista/alumnoVista.php');
    }

    public function GuardarArchivo(){
        $pvd = new comentar();

        $tipo = $_FILES['archivo']['type'];
        $tamanio = $_FILES['archivo']['size'];
        $archivotmp = $_FILES['archivo']['tmp_name'];
        $lineas = file($archivotmp);
        $i = 0;
        foreach ($lineas as $linea_num => $linea) { 
            if($i != 0) { 
                $datos = explode(",",$linea);
                $pvd->persona_nombres = utf8_encode($datos[0]);
                $pvd->persona_apellido1 = utf8_encode($datos[1]);
                $pvd->persona_apellido2 = utf8_encode($datos[2]);
                $pvd->persona_tipo_id = 2;
                $pvd->persona_cui = $datos[4];
                $pvd->persona_direccion = utf8_encode($datos[5]);
                $pvd->persona_email = utf8_encode($datos[6]);
                $pvd->persona_telefono = $datos[7];
                $pvd->persona_estado = $datos[8];

                $this->model->Registrar($pvd);
            }
            $i++;
        }

        header('Location: ../Vista/alumnoVista.php');
    }

}
