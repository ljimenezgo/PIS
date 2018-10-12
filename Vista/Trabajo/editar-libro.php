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
									<form role="form" id="frm-libro" action="?c=trabajo&a=Editar" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="libro_anio" value="<?php echo $pvd->libro_anio; ?>" />
                                        <input type="hidden" name="libro_tipo" value="1" />
                                        <input type="hidden" name="libro_cantidad" value="10000" />
                                        <input type="hidden" name="libro_id" value="<?php echo $pvd->libro_id; ?>" />

										<div class="form-group col-lg-12">
                                            <label>Codigo</label>
											<input type="text" name="libro_codigo" value="<?php echo $pvd->libro_codigo; ?>" class="form-control" placeholder="Ingrese Codigo" data-error="Llene este campo" required>                                        
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group col-lg-6">
                                            <label>Autor</label>
                                            <input class="form-control" name="libro_nombre" value="<?php echo $pvd->libro_nombre; ?>"  placeholder="Ingrese Nombre"data-error="Llene este campo" required>                                        
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group col-lg-6">
                                            <label>Empresa</label>
                                            <input class="form-control" name="libro_autor" value="<?php echo $pvd->libro_autor; ?>"  placeholder="Ingrese Autor"pattern="^[a-zA-Z\s]+$" data-error="Debe de contener solo letras" required>
											<div class="help-block with-errors"></div>
										</div>
										
										<div class="form-group col-lg-6">
                                            <label>Cargo</label>
                                            <input class="form-control" name="libro_editorial" value="<?php echo $pvd->libro_editorial; ?>"  placeholder="Ingrese Editorial"pattern="^[a-zA-Z\s]+$" data-error="Debe de contener solo letras" required>
											<div class="help-block with-errors"></div>
										</div>
                                        <div class="form-group col-lg-6">
                                            <label>Especializacion</label>
                                            <input class="form-control" name="libro_enlace" value="<?php echo $pvd->libro_enlace; ?>"  placeholder="Ingrese Enlace">
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
