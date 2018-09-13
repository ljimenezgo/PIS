<?php
//Se incluye el modelo donde conectará el controlador.
require_once '../Modelo/notas.php';

class NotasController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new notas();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once '../Vista/lista-notas.php';

    }

    //Llamado a la vista notas-editar
    public function Crud(){
        $pvd = new notas();

        //Se obtienen los datos del notas a editar.
        if(isset($_REQUEST['nota_promedio_id'])){
            $pvd = $this->model->Obtener($_REQUEST['nota_promedio_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/editar-notas.php';
	}
	
	//Llamado a la vista notas-perfil
    public function Perfil(){
        $pvd = new notas();

        //Se obtienen los datos del notas.
        if(isset($_REQUEST['nota_promedio_id'])){
            $pvd = $this->model->Obtener($_REQUEST['nota_promedio_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/perfil-notas.php';
	}

    //Llamado a la vista notas-nuevo
    public function Nuevo(){
        $pvd = new notas();

        //Llamado de las vistas.
        require_once '../Vista/Notas/agregar-notas.php';

    }

    public function estadistico(){
        $pvd = new notas();

        //Llamado de las vistas.
        require_once '../Vista/Notas/notas-estadistico.php';

    }    


    //Método que registrar al modelo un nuevo proveedor.
    public function Guardar(){
        $pvd = new notas();
		

        //Captura de los datos del formulario (vista).
        $pvd->nota_promedio_id = $_REQUEST['nota_promedio_id'];
        $pvd->nota_promedio_alumno_id = $_REQUEST['nota_promedio_alumno_id'];
        $pvd->nota_promedio_semestre = $_REQUEST['nota_promedio_anio'].'-'.$_REQUEST['nota_promedio_semestre'];
        $pvd->nota_promedio_nota = $_REQUEST['nota_promedio_nota'];

        //Registro al modelo notas.
        $this->model->Registrar($pvd);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: ../Vista/Accion.php?c=notas&a=estadistico');
    }

    //Método que modifica el modelo de un proveedor.
    public function Editar(){
        $pvd = new notas();

        $pvd->nota_promedio_id = $_REQUEST['nota_promedio_id'];
        $pvd->nota_promedio_alumno_id = $_REQUEST['nota_promedio_alumno_id'];
        $pvd->nota_promedio_semestre = $_REQUEST['nota_promedio_semestre'];
        $pvd->nota_promedio_nota = $_REQUEST['nota_promedio_nota'];

        $this->model->Actualizar($pvd);

        header('Location: ../Vista/notasVista.php');
    }

    //Método que elimina la tupla proveedor con el nit dado.
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['nota_promedio_id']);
        header('Location: ../Vista/notasVista.php');
    }

    public function GuardarArchivo(){
        $pvd = new notas();

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

        header('Location: ../Vista/notasVista.php?c=notas&a=Nuevo');
    }

}
