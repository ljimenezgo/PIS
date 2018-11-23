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
                            FICHA DE SEGUIMIENTO
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="Formulario">
									<form data-toggle="validator" role="form" id="frm-alumno" action="?c=tutoria&a=Guardar" method="post" >
                                        <input type="hidden" name="tutoria_docente" value="<?php echo $dct->persona_id; ?>" />
                                        <input type="hidden" name="tutoria_alumno" value="<?php echo $alm->persona_id; ?>" />
                                        <input type="hidden" name="tutoria_fecha" value="<?php echo date("Y-m-d");?>"  />
                                        <p style="text-align: center">Tutoría</p>
                                        <p>Docente: <?php echo $dct->persona_nombres; ?></p>
                                        <p>Alumno: <?php echo $alm->persona_nombres; ?></p>
                                        <p>Fecha: <?php echo date("Y-m-d");?></p>
										<div class="form-group col-lg-12">
                                            <label for="tutoria_observacion" class="control-label">Observacion</label>
											<input type="text" name="tutoria_observacion" value="<?php echo $tut->tutoria_observacion; ?>" class="form-control" placeholder="Ingrese Obervacion" data-error="Este campo es obligatorio" required>
											<div class="help-block with-errors"></div>
										</div>

										<div class="form-group col-lg-8" >
                                            <label>Asunto</label>
                                            <select name= "tutoria_asunto" id="tutoria_asunto" class="selectpicker col-lg-3" data-live-search="true" required>
                                                    <option value="" >---ASUNTO---</option>
                                                    <option value="Academico" >ACADEMICO</option>
                                                    <option value="Personal" >PERSONAL</option>
                                                    <option value="Familiar" >FAMILIAR</option>
                                                    <option value="Otro" >OTRO</option>
                                            </select>
                                        </div>
										<br>
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
