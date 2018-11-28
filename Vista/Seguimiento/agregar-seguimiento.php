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
                            Registro de Seguimiento de Asesoria Academica
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->


                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="Formulario">
									<form data-toggle="validator" role="form" id="frm-alumno" action="?c=seguimiento&a=Guardar" method="post" >


                    <div class="form-group col-lg-12">
                                            <label for="seguimiento_alumno" class="control-label">Nombres</label>
											<input type="text" name="seguimiento_alumno" value="<?php echo $pvd->persona_nombres; ?>" class="form-control" placeholder="Ingrese Nombre" pattern="^[a-zA-Z\s]+$" data-error="Debe de contener solo letras" required>
											<div class="help-block with-errors"></div>
										</div>
                    <div class="form-group col-lg-12">
                                            <label for="seguimiento_docente" class="control-label">Nombres</label>
                      <input type="text" name="seguimiento_docente" value="<?php echo $pvd->seguimiento_docente; ?>" class="form-control" placeholder="Ingrese Nombre" pattern="^[a-zA-Z\s]+$" data-error="Debe de contener solo letras" required>
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-lg-12">
                                            <label for="persona_nombres" class="control-label">Nombres</label>
                      <input type="text" name="persona_nombres" value="<?php echo $pvd->persona_nombres; ?>" class="form-control" placeholder="Ingrese Nombre" pattern="^[a-zA-Z\s]+$" data-error="Debe de contener solo letras" required>
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-lg-12">
                                            <label for="persona_nombres" class="control-label">Nombres</label>
                      <input type="text" name="persona_nombres" value="<?php echo $pvd->persona_nombres; ?>" class="form-control" placeholder="Ingrese Nombre" pattern="^[a-zA-Z\s]+$" data-error="Debe de contener solo letras" required>
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-lg-12">
                                            <label for="persona_nombres" class="control-label">Nombres</label>
                      <input type="text" name="persona_nombres" value="<?php echo $pvd->persona_nombres; ?>" class="form-control" placeholder="Ingrese Nombre" pattern="^[a-zA-Z\s]+$" data-error="Debe de contener solo letras" required>
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-lg-12">
                                            <label for="persona_nombres" class="control-label">Nombres</label>
                      <input type="text" name="persona_nombres" value="<?php echo $pvd->persona_nombres; ?>" class="form-control" placeholder="Ingrese Nombre" pattern="^[a-zA-Z\s]+$" data-error="Debe de contener solo letras" required>
                      <div class="help-block with-errors"></div>
                    </div>


										<div class="col-lg-12">
											<button type="submit" class="btn btn-default ">Registrar</button>
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
