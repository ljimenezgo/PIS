<?php
//Se incluye el modelo donde conectará el controlador.
require_once '../Modelo/alumno.php';
require_once '../Modelo/seguimiento.php';
require_once '../Modelo/profesor.php';
require_once '../Modelo/tutoria.php';
require_once '../Modelo/usuario.php';
require_once '../Modelo/database.php';
require_once '../Modelo/comentar.php';


if(isset($_POST['id_usuario'])) {
    $usuario = $_POST['id_usuario'];
    $modelo = new tutoria();
    $pvd = $modelo->Obtener($usuario);
    header('Content-Type: application/json');
    echo json_encode($pvd);
}

class TutoriaController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new tutoria();
        $this->modell = new alumno();
        $this->modeloCurso = new alumnoCurso();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once '../Vista/tutoria/lista-tutorias.php';
    }
    //Llamado plantilla principal
    public function ListarAlumnosDerivadoPsicologia(){
        require_once '../Vista/tutoria/lista-AlumnosDerivadoPsicologia.php';
    }
    public function ListaCitas(){
        require_once '../Vista/Tutoria/ListaCitas-tutoria.php';
    }
	public function error(){
        require_once '../Vista/error.php';

    }
    //Llamado a la vista tutoria-editar
    public function Crud(){
        $pvd = new tutoria();

        //Se obtienen los datos del tutoria a editar.
        if(isset($_REQUEST['persona_id'])){
            $pvd = $this->model->Obtener($_REQUEST['persona_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/tutoria/editar-tutorias.php';
	}

	//Llamado a la vista tutoria-perfil
    public function Perfil(){
        $pvd = new tutoria();

        //Se obtienen los datos del tutoria.
        if(isset($_REQUEST['persona_id'])){
            $pvd = $this->model->Obtener($_REQUEST['persona_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/tutoria/perfil-tutoria.php';
	}

    public function Nuevo(){
        $tut = new tutoria();
        $alm = new usuario();
        $dct = new usuario();
        //Se obtienen los datos del tutoria.
        if(isset($_REQUEST['persona_id'])){
            $tut = $this->model->Obtener($_REQUEST['persona_id']);
        }
        if(isset($_REQUEST['id_alumno'])){
            $alm = $this->modell->Obtener($_REQUEST['id_alumno']);
        }
        if(isset($_REQUEST['id_docente'])){
            $dct = $this->modell->Obtener($_REQUEST['id_docente']);
        }
        //Llamado de las vistas.
        require_once '../Vista/tutoria/agregar-tutoria.php';
    }
	    public function Ver(){
        $tut = new tutoria();
        $alm = new usuario();
        $dct = new usuario();
        //Se obtienen los datos del tutoria.
        if(isset($_REQUEST['id_alumno'])){
            $tut = $this->model->Obtenert($_REQUEST['id_alumno']);
        }
        if(isset($_REQUEST['id_alumno'])){
            $alm = $this->modell->Obtener($_REQUEST['id_alumno']);
        }
        if(isset($_REQUEST['id_docente'])){
            $dct = $this->modell->Obtener($_REQUEST['id_docente']);
        }
        //Llamado de las vistas.
        require_once '../Vista/tutoria/ver-tutoria.php';
    }

    public function EstadoCurso(){
      $tut = new tutoria();
      $alm = new usuario();
      $dct = new usuario();
      $pvd = new alumnoCurso();
      $pvd->alumno_curso_id = $_REQUEST['aa'];
      //Se obtienen los datos del tutoria.
      if($_REQUEST['id_tipo']==0){
        $this->modeloCurso->Bueno($pvd);
      }
      if($_REQUEST['id_tipo']==1){
        $this->modeloCurso->Regular($pvd);
      }
      if($_REQUEST['id_tipo']==2){
        $this->modeloCurso->Malo($pvd);
      }
      if(isset($_REQUEST['id_alumno'])){
          $tut = $this->model->Obtenert($_REQUEST['id_alumno']);
      }
      if(isset($_REQUEST['id_alumno'])){
          $alm = $this->modell->Obtener($_REQUEST['id_alumno']);
      }
      if(isset($_REQUEST['id_docente'])){
          $dct = $this->modell->Obtener($_REQUEST['id_docente']);
      }
      //Llamado de las vistas.
      require_once '../Vista/tutoria/ver-tutoria.php';
  }


            public function cancelar(){
        $tut = new tutoria();
        $alm = new usuario();
        $dct = new usuario();
        //Se obtienen los datos del tutoria.
        if(isset($_REQUEST['id_alumno'])){
            $tut = $this->model->Obtenert($_REQUEST['id_alumno']);
        }
        if(isset($_REQUEST['id_alumno'])){
            $alm = $this->modell->Obtener($_REQUEST['id_alumno']);
        }
        if(isset($_REQUEST['id_docente'])){
            $dct = $this->modell->Obtener($_REQUEST['id_docente']);
        }
        //Llamado de las vistas.
        require_once '../Vista/tutoria/cancelar-tutoria.php';
    }

	    public function Citar(){
        $tut = new tutoria();
        $alm = new usuario();
        $dct = new usuario();
        //Se obtienen los datos del tutoria.
        if(isset($_REQUEST['persona_id'])){
            $tut = $this->model->Obtener($_REQUEST['persona_id']);
        }
        if(isset($_REQUEST['id_alumno'])){
            $alm = $this->modell->Obtener($_REQUEST['id_alumno']);
        }
        if(isset($_REQUEST['id_docente'])){
            $dct = $this->modell->Obtener($_REQUEST['id_docente']);
        }
        //Llamado de las vistas.
        require_once '../Vista/tutoria/citar-tutoria.php';
    }



    //Método que registrar al modelo un nuevo proveedor.
    public function Guardar(){
        $pvd = new tutoria();
        $pvd->seguimiento_alumno = $_REQUEST['seguimiento_alumno'];
        $pvd->seguimiento_docente = $_REQUEST['seguimiento_docente'];
        $pvd->seguimiento_asistencia = $_REQUEST['seguimiento_asistencia'];
        $pvd->seguimiento_asignatura = $_REQUEST['seguimiento_asignatura'];
        $pvd->seguimiento_fecha = $_REQUEST['seguimiento_fecha'];
        $pvd->seguimiento_tema = $_REQUEST['seguimiento_tema'];

        //Registro al modelo tutoria.
        $this->model->Registrar($pvd);
        header('Location: ../Vista/Accion.php?c=alumno&a=Perfil&persona_id='.$_REQUEST['tutoria_alumno']);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
    }

	public function Asistido(){
        $pvd = new tutoria();
        $pvd->tutoria_medico_aceptado = $_REQUEST['tutoria_medico_aceptado'];
        $pvd->tutoria_social_aceptado = $_REQUEST['tutoria_social_aceptado'];
        $pvd->tutoria_piscologia_aceptado = $_REQUEST['tutoria_piscologia_aceptado'];
        $pvd->tutoria_id = $_REQUEST['tutoria_id'];
        $pvd->tutoria_alumno = $_REQUEST['tutoria_alumno'];

        //Registro al modelo tutoria.
        $this->model->Asistido($pvd);
        header('Location: ../Vista/Accion.php?c=tutoria&a=ListarAlumnosDerivadoPsicologia');

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
    }
    //Método que registrar al modelo un nuevo proveedor.

    //Método que modifica el modelo de un proveedor.
    public function Editar(){
        $pvd = new tutoria();

        $pvd->persona_id = $_REQUEST['persona_id'];
        $pvd->persona_nombres = strtoupper($_REQUEST['persona_nombres']);
        $pvd->persona_apellido1 = "";
        $pvd->persona_apellido2 = "";
		$pvd->persona_tipo_id = $_REQUEST['persona_tipo_id'];
        $pvd->persona_cui = $_REQUEST['persona_cui'];
        $pvd->persona_dni = $_REQUEST['persona_cui'];
        $pvd->persona_direccion = $_REQUEST['persona_direccion'];
        $pvd->persona_email = $_REQUEST['persona_email'];
        $pvd->persona_telefono = $_REQUEST['persona_telefono'];
		$pvd->persona_prestamo = $_REQUEST['persona_prestamo'];

        $this->model->Actualizar($pvd);

        header('Location: ../Vista/Accion.php?c=tutoria&a=Perfil&persona_id='.$_REQUEST['persona_id']);
    }

    //Método que elimina la tupla proveedor con el nit dado.
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['persona_id']);
        header('Location: ../Vista/Accion.php?c=tutoria');
    }

    public function GuardarArchivo(){
        $pvd = new tutoria();
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
                $pvd->persona_cui = $datos[1];
                $pvd->persona_dni = $datos[3];
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
