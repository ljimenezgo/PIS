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
                            Cita para Tutoria
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="Formulario">
									<form data-toggle="validator" role="form" id="frm-alumno" action="?c=alumno&a=citarAceptar" method="post" >
                                        <input type="hidden" name="tutoria_alumno" value="<?php echo $alm->persona_id; ?>" />
										<input type="hidden" name="tutoria_docente" value="<?php echo $dct->persona_id; ?>" />
                                        <input type="hidden" name="persona_citado_tutoria" value="1" />
                                        <div class="form-group col-lg-12">
                                            <p>Docente: <?php echo $dct->persona_nombres; ?></p>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <p>Alumno: <?php echo $alm->persona_nombres; ?></p>
                                        </div>
										<div class="form-group col-lg-3">
                                            <?php $fecha=date("Y-m-d") ?>
                                            <label for="tutoria_fecha" class="control-label">Fecha y Hora de Cita</label>
                                            <input type="datetime-local" min="<?php echo $fecha ?>T00:00" max="2050-11-20T21:25" name="tutoria_fecha" value="<?php echo $tut->tutoria_fecha; ?>" class="form-control" placeholder="Ingrese Fecha" data-error="La fecha no puede ser hoy o antes de hoy" required>
											<div class="help-block with-errors"></div>
										</div>
                    <div class="form-group col-lg-9">
                                            <label for="tutoria_lugar" class="control-label">Lugar</label>
											<input type="text" name="tutoria_lugar" value="<?php echo $tut->tutoria_lugar; ?>" class="form-control" placeholder="Ingrese Lugar" data-error="Este campo es obligatorio" required>
											<div class="help-block with-errors"></div>
										</div>
										<br>
										<div class="col-lg-12">
											<button type="submit" class="btn btn-default ">Citar</button>
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
