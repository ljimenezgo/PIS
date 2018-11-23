<?php
//Se incluye el modelo donde conectará el controlador.
require_once '../Modelo/alumno.php';
require_once '../Modelo/alumnoCurso.php';
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

class alumnoCursoController{

    private $model;
    private $modeloo;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new alumnoCurso();
        $this->modeloo = new alumno();
    }
	public function citarCancelar(){
        $pvd = new alumnoCurso();
		$pvd->persona_id = $_REQUEST['persona_id'];

        //Se obtienen los datos del comentar a editar.
        $this->model->citarCancelar($pvd);
        header('Location: ../Vista/Accion.php?c=profesor&a=Tutor');
        //Llamado de las vistas.
	}

	public function citarAceptar(){
        $pvd = new alumno();
		$tut = new tutoria();
		$pvd->persona_id = $_REQUEST['tutoria_alumno'];
        $pvd->persona_citado_tutoria = $_REQUEST['persona_citado_tutoria'];
        $tut->tutoria_fecha = $_REQUEST['tutoria_fecha'];
        $tut->tutoria_docente = $_REQUEST['tutoria_docente'];
        $tut->tutoria_alumno = $_REQUEST['tutoria_alumno'];
        //Se obtienen los datos del comentar a editar.
        $this->model->citarAceptar($pvd);
        $this->model->citarAceptarT($tut);
        header('Location: ../Vista/Accion.php?c=profesor&a=Tutor');
        //Llamado de las vistas.
	}
    public function Matricular(){
        $pvd = new alumnoCurso();
        $pvd->alumno_cursoc_alumno_id = $_REQUEST['aa'];
        $pvd->alumno_curso_curso_id = $_REQUEST['b'];
        //Se obtienen los datos del comentar a editar.
        $this->model->Matricular($pvd);
        header('Location: ../Vista/Accion.php?c=alumnoCurso&a=ListaCursos&alumno='.$_REQUEST['aa']);
        //Llamado de las vistas.
    }
    public function DesmatricularCurso(){
        $pvd = new alumnoCurso();
        $pvd->alumno_curso_id = $_REQUEST['aa'];
        //Se obtienen los datos del comentar a editar.
        $this->model->DesmatricularCurso($pvd);
        $this->model->SinRevisar($pvd);
        header('Location: ../Vista/Accion.php?c=alumnoCurso&a=ListaCursos&alumno='.$_REQUEST['b']);
        //Llamado de las vistas.
    }
    //Llamado plantilla principal
    public function Index(){
        require_once '../Vista/Cursos/lista-cursos.php';
    }
    public function ListaCursos(){
        $pvd = new alumno();
        //Se obtienen los datos del alumno a editar.
        if(isset($_REQUEST['alumno'])){
            $pvd = $this->model->ObtenerCursos($_REQUEST['alumno']);
        }
        require_once '../Vista/Cursos/lista-cursos.php';
    }

    public function ListaCursosDeAlumno(){
        $pvd = new alumno();
        //Se obtienen los datos del alumno a editar.
        if(isset($_REQUEST['alumno'])){
            $pvd = $this->model->ObtenerCursos($_REQUEST['alumno']);
        }
        require_once '../Vista/Cursos/lista-cursosAlumno.php';
    }
    public function Bueno(){
        $pvd = new alumnoCurso();
        $pvd->alumno_curso_id = $_REQUEST['aa'];
        //Se obtienen los datos del comentar a editar.
        $this->model->Bueno($pvd);
        header('Location: ../Vista/Accion.php?c=alumnoCurso&a=ListaCursosDeAlumno&alumno='.$_REQUEST['b']);
        //Llamado de las vistas.
    }
    public function Malo(){
        $pvd = new alumnoCurso();
        $pvd->alumno_curso_id = $_REQUEST['aa'];
        //Se obtienen los datos del comentar a editar.
        $this->model->Malo($pvd);
        header('Location: ../Vista/Accion.php?c=alumnoCurso&a=ListaCursosDeAlumno&alumno='.$_REQUEST['b']);
        //Llamado de las vistas.
    }
    public function Regular(){
        $pvd = new alumnoCurso();
        $pvd->alumno_curso_id = $_REQUEST['aa'];
        //Se obtienen los datos del comentar a editar.
        $this->model->Regular($pvd);
        header('Location: ../Vista/Accion.php?c=alumnoCurso&a=ListaCursosDeAlumno&alumno='.$_REQUEST['b']);
        //Llamado de las vistas.
    }

    public function ProfesoresDisponibles(){
        require_once '../Vista/Alumno/lista-profesores-disponibles.php';

    }

	public function error(){
        require_once '../Vista/error.php';

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
        $pvd->persona_nombres = strtoupper(''.$_REQUEST['persona_apellido1'].'/'.$_REQUEST['persona_apellido2'].", ".$_REQUEST['persona_nombres']);
        $pvd->persona_apellido1 = "";
        $pvd->persona_apellido2 = "";
		$pvd->persona_tipo_id = $_REQUEST['persona_tipo_id'];
        $pvd->persona_cui = $_REQUEST['persona_cui'];
        $pvd->persona_dni = $_REQUEST['persona_dni'];
        $pvd->persona_direccion = $_REQUEST['persona_direccion'];
        $pvd->persona_email = $_REQUEST['persona_email'];
        $pvd->persona_telefono = $_REQUEST['persona_telefono'];
        $pvd->persona_estado = $_REQUEST['persona_estado'];
		$pvd->persona_prestamo = $_REQUEST['persona_prestamo'];
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

        header('Location: ../Vista/Accion.php?c=alumno&a=Perfil&persona_id='.$_REQUEST['persona_id']);
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
