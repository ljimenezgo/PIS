<?php
//Se incluye el modelo donde conectará el controlador.
require_once '../Modelo/malla.php';
require_once '../Modelo/curso.php';

class MallaController{

    private $model_malla;
    private $model_curso;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model_malla = new malla();
        $this->model_curso = new curso();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once '../Vista/Malla/lista-malla.php';

    }
    //Llamado a la vista alumno-nuevo
    public function Nuevo(){
        $pvd = new malla();

        //Llamado de las vistas.
        require_once '../Vista/Malla/agregar-malla.php';

    }

    public function GuardarArchivo(){
        $pvd = new malla();
        $pvc = new curso();
        $malla = new malla();

        $nombreArchivo = explode(".", $_FILES['archivo']['name']);
        $pvd->malla_curricular_dsc = $nombreArchivo[1].$nombreArchivo[0];
        $pvd->malla_curricular_anio = $nombreArchivo[0];
        $this->model_malla->RegistrarMallaArchivo($pvd);
        $malla = $this->model_malla->ObtenerPorAnio($nombreArchivo[0]);

        $tipo = $_FILES['archivo']['type'];
        $tamanio = $_FILES['archivo']['size'];
        $archivotmp = $_FILES['archivo']['tmp_name'];
        $lineas = file($archivotmp);
        $i = 0;
        foreach ($lineas as $linea_num => $linea) { 
            if($i != 0) { 
                $datos = explode(",",$linea);
                $pvc->curso_codigo = $datos[0];
                $pvc->curso_descripcion = $datos[1];
                $pvc->curso_malla_id = $malla->malla_curricular_id;
                $curso_equivalencia = $datos[2];
 
                $this->model_curso->RegistrarPorArchivo($pvc, $curso_equivalencia);
            }
            $i++;
        }

        header('Location: ../Vista/Accion.php?c=malla');
    }

}
