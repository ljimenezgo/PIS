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
                            CANCELAR CITA
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="Formulario">
									<form data-toggle="validator" role="form" id="frm-alumno" action="?c=profesor&a=cancelarSolicitud" method="post" >
                                        <input type="hidden" name="persona_id" value="<?php echo $alm->persona_id; ?>" />
                                        <p style="text-align: center">Tutoría</p>
                                        <p>Docente: <?php echo $dct->persona_nombres; ?></p>    
                                        <p>Alumno: <?php echo $alm->persona_nombres; ?></p>    
                                        <p>Fecha de Cita: <?php echo $tut->tutoria_fecha; ?></p>    
										<div class="form-group col-lg-12">
                                            <label for="tutoria_cancelacion_motivo" class="control-label">Motivo de Cancelacion</label>
											<input type="text" name="tutoria_cancelacion_motivo" value="<?php echo $tut->tutoria_cancelacion_motivo; ?>" class="form-control" placeholder="Ingrese Motivo de Cancelacion de Cita" data-error="Este campo es obligatorio" required>                                        
											<div class="help-block with-errors"></div>
										</div>
										<br>
										<div class="col-lg-12">
											<button type="submit" class="btn btn-default ">Cancelar Cita</button>
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
