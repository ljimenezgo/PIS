<?php

require_once '../Modelo/profesor.php';
require_once '../Modelo/tutoria.php';
require_once '../Modelo/usuario.php';

class ProfesorController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new profesor();
    }

    public function Index(){
        require_once '../Vista/Profesor/lista-profesores.php';

    }
	public function Tutor(){
        require_once '../Vista/Profesor/lista-alumnos.php';

    }
	public function error(){
        require_once '../Vista/error.php';

    }
    public function Crud(){
        $pvd = new profesor();

        if(isset($_REQUEST['persona_id'])){
            $pvd = $this->model->Obtener($_REQUEST['persona_id']);
        }

        require_once '../Vista/Profesor/editar-profesores.php';
	}
	
	public function matricular(){
        $pvd = new profesor();
		$pvd->persona_id = $_REQUEST['persona_id'];
        $pvd->persona_tutor = $_REQUEST['persona_tutor'];
        //Se obtienen los datos del comentar a editar.
        $this->model->Matricular($pvd);
        $this->model->MatricularP($pvd);
        header('Location: ../Vista/Accion.php?c=profesor&a=Tutor');
        //Llamado de las vistas.
	}

    public function solicitar(){
        $pvd = new profesor();
        $pvd->persona_id = $_REQUEST['persona_id'];
        $pvd->persona_solicitar = $_REQUEST['persona_solicitar'];
        //Se obtienen los datos del comentar a editar.
        $pvd = $this->model->Solicitar($pvd);
        header('Location: ../Vista/Accion.php?c=alumno');
        //Llamado de las vistas.
    }

	public function desmatricular(){
        $pvd = new profesor();
		$estado  = new tutoria ();
		$pvd->persona_id = $_REQUEST['persona_id'];
        $pvd->persona_tutor = $_REQUEST['persona_tutor'];
		$estado->tutoria_alumno = $_REQUEST['persona_id'];
        //Se obtienen los datos del comentar a editar.
        $pvd = $this->model->desmatricular($pvd);
        $pvd = $this->model->desmatricularP($pvd);
		$pvd = $this->model->cancelarSolicitud($pvd);
		$estado = $this->model->cancelarSolicitudQuitar($estado);
        header('Location: ../Vista/Accion.php?c=profesor&a=Tutor');
        //Llamado de las vistas.
	}	
	


    public function cancelarSolicitud(){
        $pvd = new profesor();
		$estado  = new tutoria ();
        $pvd->persona_id = $_REQUEST['persona_id'];
        $estado->tutoria_alumno = $_REQUEST['persona_id'];
        $estado->tutoria_cancelacion_motivo = $_REQUEST['tutoria_cancelacion_motivo'];
        //Se obtienen los datos del comentar a editar.
        $pvd = $this->model->cancelarSolicitud($pvd);
        $estado = $this->model->cancelarSolicitudT($estado);
        header('Location: ../Vista/Accion.php?c=profesor&a=Tutor');
        //Llamado de las vistas.
    }
    public function cancelarSolicitudTutor(){
        $pvd = new profesor();
        $pvd->persona_id = $_REQUEST['persona_id'];
        //Se obtienen los datos del comentar a editar.
        $pvd = $this->model->cancelarSolicitudTutor($pvd);
        header('Location: ../Vista/Accion.php?c=profesor&a=Tutor');
        //Llamado de las vistas.
    }
    public function Nuevo(){
        $pvd = new profesor();

        require_once '../Vista/Profesor/agregar-profesores.php';

    }
    public function Solicitudes(){
        $pvd = new profesor();

        require_once '../Vista/Profesor/lista-solicitudes.php';
    }
    public function Guardar(){
        $pvd = new profesor();
		$pc2 = new usuario();
		$hash = password_hash($_REQUEST['persona_dni'], PASSWORD_BCRYPT);
        $pvd->persona_id = $_REQUEST['persona_dni'];
        $pvd->persona_nombres = strtoupper(''.$_REQUEST['persona_apellido1'].'/'.$_REQUEST['persona_apellido2'].", ".$_REQUEST['persona_nombres']);
        $pvd->persona_apellido1 = "";
        $pvd->persona_apellido2 = "";
		$pvd->persona_tipo_id = $_REQUEST['persona_tipo_id'];
        $pvd->persona_dni = $_REQUEST['persona_dni'];
        $pvd->persona_direccion = $_REQUEST['persona_direccion'];
        $pvd->persona_email = $_REQUEST['persona_email'];
        $pvd->persona_telefono = $_REQUEST['persona_telefono'];
        $pvd->persona_estado = $_REQUEST['persona_estado'];
		$pc2->usuario_id = $_REQUEST['usuario_id'];
        $pc2->usuario_cuenta = $_REQUEST['persona_dni'];
        $pc2->usuario_password = $hash;
        $pc2->usuario_rol_id = $_REQUEST['persona_tipo_id'];
		$pc2->usuario_persona_id = $_REQUEST['persona_dni'];
        $pc2->usuario_estado = $_REQUEST['persona_estado'];
		$pvd->persona_prestamo = $_REQUEST['persona_prestamo'];

        $this->model->Registrar($pvd);
		$this->model->RegistrarU($pc2);

    }

    public function Editar(){
        $pvd = new profesor();

        $pvd->persona_id = $_REQUEST['persona_id'];
        $pvd->persona_nombres = strtoupper($_REQUEST['persona_nombres']);
        $pvd->persona_apellido1 = "";
        $pvd->persona_apellido2 = "";
		$pvd->persona_tipo_id = $_REQUEST['persona_tipo_id'];
        $pvd->persona_dni = $_REQUEST['persona_dni'];
        $pvd->persona_direccion = $_REQUEST['persona_direccion'];
        $pvd->persona_email = $_REQUEST['persona_email'];
        $pvd->persona_telefono = $_REQUEST['persona_telefono'];
		$pvd->persona_prestamo = $_REQUEST['persona_prestamo'];

        $this->model->Actualizar($pvd);

        header('Location: ../Vista/Accion.php?c=profesor');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['persona_id']);
        header('Location: ../Vista/Accion.php?c=profesor');
    }

    public function GuardarArchivo(){
        $pvd = new profesor();
		$pc2 = new usuario();
		
        $tipo = $_FILES['archivo']['type'];
        $tamanio = $_FILES['archivo']['size'];
        $archivotmp = $_FILES['archivo']['tmp_name'];
        $lineas = file($archivotmp);
        $i = 0;
        foreach ($lineas as $linea_num => $linea) {
            if($i != 0) {
                $datos = explode(";",$linea);
				$hash = password_hash($datos[2], PASSWORD_BCRYPT);
                $pvd->persona_id = $datos[2];
                $pvd->persona_nombres = utf8_encode($datos[1]);
                $pvd->persona_apellido1 = "";
                $pvd->persona_apellido2 = "";
				$pvd->persona_prestamo=0;
                $pvd->persona_tipo_id = 3;
                $pvd->persona_dni = $datos[2];
                //$pvd->persona_direccion = utf8_encode($datos[5]);
                $pvd->persona_email = utf8_encode($datos[3]);
                //$pvd->persona_telefono = $datos[7];
                $pvd->persona_estado = 0;
				$pc2->usuario_cuenta = $datos[2];
				$pc2->usuario_password = $hash;
				$pc2->usuario_rol_id = 3;
				$pc2->usuario_persona_id = $datos[2];
				$pc2->usuario_estado = 0;
                $this->model->Registrar($pvd);
				$this->model->RegistrarU($pc2);

            }
            $i++;
        }

    }

}
