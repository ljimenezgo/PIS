<?php
//Se incluye el modelo donde conectará el controlador.
require_once '../Modelo/prestamo.php';

class PrestamoController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new prestamo();
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
		

        //Captura de los datos del formulario (vista).
        $pvd->prestamo_id = $_REQUEST['prestamo_id'];
        $pvd->prestamo_libro_id = $_REQUEST['prestamo_libro_id'];
		$pvd->prestamo_persona_id = $_REQUEST['prestamo_persona_id'];
        $pvd->prestamo_fecha_entrega = $_REQUEST['prestamo_fecha_entrega'];
		$pvd->prestamo_fecha_a_devolver = $_REQUEST['prestamo_fecha_a_devolver'];
        $pvd->prestamo_fecha_devolucion = "";
        $pvd->prestamo_estado = 0;


        //Registro al modelo prestamo.
        $this->model->Registrar($pvd);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: ../Vista/Accion.php?c=prestamo&a=lista');
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
        $this->model->Eliminar($_REQUEST['prestamo_id']);
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
