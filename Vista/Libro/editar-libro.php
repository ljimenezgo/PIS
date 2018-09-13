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
                            Edicion de Alumnos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="Formulario">
									<form role="form" id="frm-libro" action="?c=libro&a=Editar" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="libro_tipo" value="1" />
                                        <input type="hidden" name="libro_id" value="<?php echo $pvd->libro_id; ?>" />
                                        <input type="hidden" name="libro_cantidad_disponible" value="<?php echo $pvd->libro_cantidad_disponible; ?>" />

										<div class="form-group col-lg-12">
                                            <label>Codigo</label>
											<input type="text" name="libro_codigo" value="<?php echo $pvd->libro_codigo; ?>" class="form-control" placeholder="Ingrese Codigo" data-validacion-tipo="requerido|min:100" />                                        </div>
                                        
										<div class="form-group col-lg-6">
                                            <label>Nombre</label>
                                            <input class="form-control" name="libro_nombre" value="<?php echo $pvd->libro_nombre; ?>"  placeholder="Ingrese Nombre">
                                        </div>
										<div class="form-group col-lg-6">
                                            <label>Autor</label>
                                            <input class="form-control" name="libro_autor" value="<?php echo $pvd->libro_autor; ?>"  placeholder="Ingrese Autor">
                                        </div>
										
                                        <div class="form-group col-lg-6">
                                            <label>Enlace</label>
                                            <input class="form-control" name="libro_enlace" value="<?php echo $pvd->libro_enlace; ?>"  placeholder="Ingrese Enlace">
                                        </div>
										<div class="form-group col-lg-6">
                                            <label>Cantidad Agregada</label>
                                            <input class="form-control" name="cantidad" value="0"  placeholder="Ingrese Cantidad">
                                        </div>
										
										<br>
										<div class="col-lg-12">
											<button type="submit" class="btn btn-default ">Editar</button>
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
