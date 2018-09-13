<?php include("restriccion.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php include("head.php"); ?>
<body>

    <div id="wrapper">
	<?php include("panel.php"); ?>		
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <br>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
				<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edicion de Administradores
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="Formulario">
									<form role="form" id="frm-administrador" action="?c=administrador&a=Editar" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="persona_id" value="<?php echo $pvd->persona_id; ?>" />
                                        <input type="hidden" name="persona_tipo_id" value="<?php echo $pvd->persona_tipo_id; ?>" />
										<div class="form-group col-lg-12">
                                            <label>Nombres</label>
											<input type="text" name="persona_nombres" value="<?php echo $pvd->persona_nombres; ?>" class="form-control" placeholder="Ingrese Nombre" data-validacion-tipo="requerido|min:100" />                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Primer Apellido</label>
                                            <input class="form-control" name="persona_apellido1" value="<?php echo $pvd->persona_apellido1; ?>"  placeholder="Ingrese Primer Apellido">
                                        </div>
										<div class="form-group col-lg-6">
                                            <label>Segundo Apellido</label>
                                            <input class="form-control" name="persona_apellido2" value="<?php echo $pvd->persona_apellido2; ?>"  placeholder="Ingrese Segundo Apellido">
                                        </div>
										<div class="form-group col-lg-6">
                                            <label>Correo Electrónico</label>
                                            <input class="form-control" name="persona_email" value="<?php echo $pvd->persona_email; ?>"  placeholder="Ingrese Correo Electrónico">
                                        </div>
										<div class="form-group col-lg-12">
                                            <label>Dirección</label>
                                            <input class="form-control" name="persona_direccion" value="<?php echo $pvd->persona_direccion; ?>"  placeholder="Ingrese Dirección">
                                        </div>
										<div class="form-group col-lg-6">
                                            <label>Teléfono</label>
                                            <input class="form-control" name="persona_telefono" value="<?php echo $pvd->persona_telefono; ?>"  placeholder="Ingrese Teléfono">
                                        </div>
										<br>
										<div class="col-lg-12">
											<button type="submit" class="btn btn-default ">Actualizar</button>
											<button type="reset" class="btn btn-default">Reset</button>
										</div>
                                    </form>
								</div>
                                
                                
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.Registro -->
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	<?php include("scripts.php"); ?>

</body>

</html>
