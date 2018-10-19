<?php
//Se incluye el modelo donde conectará el controlador.
require_once '../Modelo/prestamo.php';
require_once '../Modelo/profesor.php';

class PrestamoController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new prestamo();
        $this->model2 = new profesor();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once '../Vista/lista-prestamo.php';

    }

    //Llamado a la vista prestamo-editar
    public function Crud(){
        $pvd = new prestamo();

        //Se obtienen los datos del prestamo a editar.
        if(isset($_REQUEST['nota_promedio_id'])){
            $pvd = $this->model->Obtener($_REQUEST['nota_promedio_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/editar-prestamo.php';
	}
	
	//Llamado a la vista prestamo-perfil
    public function Perfil(){
        $pvd = new prestamo();

        //Se obtienen los datos del prestamo.
        if(isset($_REQUEST['nota_promedio_id'])){
            $pvd = $this->model->Obtener($_REQUEST['nota_promedio_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/perfil-prestamo.php';
	}

    //Llamado a la vista prestamo-nuevo
    public function Nuevo(){
        $pvd = new prestamo();

        //Llamado de las vistas.
        require_once '../Vista/Prestamo/agregar-prestamo.php';

    }
    public function nuevoExAlumno(){
        $pvd = new profesor();

        require_once '../Vista/Prestamo/agregar-exalumno.php';

    }
    public function lista(){
        $pvd = new prestamo();

        //Llamado de las vistas.
        require_once '../Vista/prestamo/lista-prestamo.php';

    }    

    public function historial(){
        $pvd = new prestamo();

        //Llamado de las vistas.
        require_once '../Vista/prestamo/historial-prestamo.php';

    } 
    //Método que registrar al modelo un nuevo proveedor.
    public function Guardar(){
        $pvd = new prestamo();
		$fecha = date('Y-m-j');
		$dias = $_REQUEST['libro_cantidad'];
		$nuevafecha = strtotime ( '+'.$dias.' day' , strtotime ( $fecha ) ) ;
		$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
		if($_REQUEST['select'] == 1){
			$pvd->prestamo_tipo = "Libro";
		}elseif($_REQUEST['select'] == 2){
			$pvd->prestamo_tipo = "Tesis";
		}elseif($_REQUEST['select'] == 3){
			$pvd->prestamo_tipo = "Informes de Trabajo";
		}
        //Captura de los datos del formulario (vista).
        $pvd->prestamo_id = $_REQUEST['prestamo_id'];
        $pvd->prestamo_libro_id = $_REQUEST['prestamo_libro_id'];
		$pvd->prestamo_persona_id = $_REQUEST['prestamo_persona_id'];
        $pvd->prestamo_fecha_entrega = $_REQUEST['prestamo_fecha_entrega'];
        $pvd->prestamo_telefono = $_REQUEST['prestamo_telefono'];
        $pvd->prestamo_direccion = $_REQUEST['prestamo_direccion'];
		$pvd->prestamo_fecha_a_devolver = $nuevafecha;
        $pvd->prestamo_fecha_devolucion = "";
        $pvd->prestamo_estado = 0;
		$pvd->prestamo_prestador = $_REQUEST['prestamo_prestador'];

        //Registro al modelo prestamo.
        $this->model->Registrar($pvd);
        $this->model->Prestamo_Persona($pvd);
		$this->model->DisminuirDisponible($_REQUEST['prestamo_libro_id']);
		$this->model->AumentarEntregado($_REQUEST['prestamo_libro_id']);
        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: ../Vista/Accion.php?c=prestamo&a=lista');
    }
    public function GuardarExAlumno(){
        $pvd = new profesor();
        $pvd->persona_id = $_REQUEST['persona_dni'];
        $pvd->persona_nombres = $_REQUEST['persona_nombres'];
        $pvd->persona_apellido1 = $_REQUEST['persona_apellido1'];
        $pvd->persona_apellido2 = $_REQUEST['persona_apellido2'];
		$pvd->persona_tipo_id = $_REQUEST['persona_tipo_id'];
        $pvd->persona_dni = $_REQUEST['persona_dni'];
        $pvd->persona_email = $_REQUEST['persona_email'];
        $pvd->persona_estado = $_REQUEST['persona_estado'];
        $pvd->persona_egresado = $_REQUEST['persona_egresado'];
        $pvd->persona_prestamo = $_REQUEST['persona_prestamo'];
        $this->model->RegistrarExAlumno($pvd);
		header('Location: ../Vista/Accion.php?c=prestamo&a=Nuevo#ExAlumnos');
    }
    //Método que modifica el modelo de un proveedor.
    public function Editar(){
        $pvd = new prestamo();

        $pvd->nota_promedio_id = $_REQUEST['nota_promedio_id'];
        $pvd->nota_promedio_alumno_id = $_REQUEST['nota_promedio_alumno_id'];
        $pvd->nota_promedio_semestre = $_REQUEST['nota_promedio_semestre'];
        $pvd->nota_promedio_nota = $_REQUEST['nota_promedio_nota'];

        $this->model->Actualizar($pvd);

        header('Location: ../Vista/prestamoVista.php');
    }

    //Método que elimina la tupla proveedor con el nit dado.
    public function Eliminar(){
		$pvd = new prestamo();
		$pvd->prestamo_fecha_devolucion = $_REQUEST['prestamo_fecha_devolucion'];
		$pvd->prestamo_id = $_REQUEST['prestamo_id'];
		$this->model->Eliminar($_REQUEST['prestamo_id']);
        $this->model->Devolucion($pvd);
		if($_REQUEST['tiempo'] > 0 ){
			$this->model->Deudor($_REQUEST['persona_id']);
		}
		$this->model->AumentarDisponible($_REQUEST['prestamo_libro_id']);
		$this->model->DisminuirEntregado($_REQUEST['prestamo_libro_id']);
        header('Location: ../Vista/Accion.php?c=prestamo&a=lista');
    }

    public function GuardarArchivo(){
        $pvd = new prestamo();

        $tipo = $_FILES['archivo']['type'];
        $tamanio = $_FILES['archivo']['size'];
        $archivotmp = $_FILES['archivo']['tmp_name'];
        $lineas = file($archivotmp);
        $i = 0;
        foreach ($lineas as $linea_num => $linea) { 
            if($i != 0) { 
                $datos = explode(";",$linea);
                $pvd->nota_promedio_alumno_id = $datos[0];
                $pvd->nota_promedio_semestre = $datos[1];
                $pvd->nota_promedio_nota = $datos[2];

                $this->model->Registrar($pvd);
            }
            $i++;
        }

        header('Location: ../Vista/prestamoVista.php?c=prestamo&a=Nuevo');
    }

}
