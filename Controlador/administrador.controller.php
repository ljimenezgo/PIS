<?php
//Se incluye el modelo donde conectará el controlador.
require_once '../Modelo/administrador.php';
require_once '../Modelo/usuario.php';
class AdministradorController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new administrador();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once '../Vista/Administrador/lista-direccion.php';

    }

    //Llamado a la vista alumno-editar
    public function Crud(){
        $pvd = new administrador();

        //Se obtienen los datos del alumno a editar.
        if(isset($_REQUEST['persona_id'])){
            $pvd = $this->model->Obtener($_REQUEST['persona_id']);
        }

        //Llamado de las vistas.
        require_once '../Vista/Administrador/editar-direccion.php';
  }

    //Llamado a la vista alumno-nuevo
    public function Nuevo(){
        $pvd = new administrador();

        //Llamado de las vistas.
        require_once '../Vista/Administrador/agregar-direccion.php';

    }

    //Método que registrar al modelo un nuevo proveedor.
    public function Guardar(){
        $pvd = new administrador();
		$pc2 = new usuario();
		$hash = password_hash($_REQUEST['persona_dni'], PASSWORD_BCRYPT);
        //Captura de los datos del formulario (vista).
        $pvd->persona_id = $_REQUEST['persona_dni'];
        $pvd->persona_dni = $_REQUEST['persona_dni'];
        $pvd->persona_nombres = $_REQUEST['persona_nombres'];
        $pvd->persona_apellido1 = $_REQUEST['persona_apellido1'];
        $pvd->persona_apellido2 = $_REQUEST['persona_apellido2'];
		$pvd->persona_tipo_id = $_REQUEST['persona_tipo_id'];
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
        $pvd = new administrador();

        $pvd->persona_id = $_REQUEST['persona_id'];
        $pvd->persona_nombres = $_REQUEST['persona_nombres'];
        $pvd->persona_apellido1 = $_REQUEST['persona_apellido1'];
        $pvd->persona_apellido2 = $_REQUEST['persona_apellido2'];
		$pvd->persona_tipo_id = $_REQUEST['persona_tipo_id'];
        $pvd->persona_direccion = $_REQUEST['persona_direccion'];
        $pvd->persona_email = $_REQUEST['persona_email'];
        $pvd->persona_telefono = $_REQUEST['persona_telefono'];
		$pvd->persona_prestamo = $_REQUEST['persona_prestamo'];
		$pvd->persona_prestamo=0;

        $this->model->Actualizar($pvd);

        header('Location: ../Vista/Accion.php?c=administrador');
    }

    //Método que elimina la tupla proveedor con el nit dado.
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['persona_id']);
        header('Location: ../Vista/Accion.php?c=administrador');
    }
}
