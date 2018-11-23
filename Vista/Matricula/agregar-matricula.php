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
                            Registro de matricula
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="Formulario">
									<form data-toggle="validator" role="form" id="frm-matricula-archivo" enctype="multipart/form-data"  action="?c=matricula&a=Guardar" method="post" >
                                        <input type="hidden" name="matricula_anio" value="<?php echo date("Y"); ?>" />
                                        <input type="hidden" name="matricula_estado" value=0 />
										<div class="form-group col-lg-8" >
											<label>Tipo</label>
											<select name= "matricula_tipo" id="matricula_tipo" class="selectpicker col-lg-3" data-live-search="true">
													<option value="0" >--TIPO--</option>
													<option value="Semestral" >SEMESTRAL</option>
													<option value="Verano" >VERANO</option>
											</select>
										</div>
										<div class="form-group col-lg-8" >
											<label>Semestre</label>
											<select name= "matricula_semestre" id="matricula_semestre" class="selectpicker col-lg-3" data-live-search="true">
													<option value="0" >--SEMESTRE--</option>
													<option value="1" >I</option>
													<option value="2" >II</option>
													<option value="3" >Verano</option>
											</select>
										</div>

										<div class="form-group col-lg-6">
                                            <label class="control-label">Fecha Inicio</label>
                                            <?php $fecha=date("Y-m-d") ?>
											<input type="date" name="matricula_fecha_inicio" min="<?php echo $fecha ?>" max="2050-11-20" value="<?php echo $pvd->matricula_fecha_inicio; ?>" class="form-control" data-error="La fecha no puede ser hoy o antes de hoy" required>
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group col-lg-6">
                                            <label class="control-label">Fecha Final</label>
											<input type="date" name="matricula_fecha_fin" min="<?php echo $fecha ?>" max="2050-11-20" value="<?php echo $pvd->matricula_fecha_fin; ?>" class="form-control" >
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group col-lg-12">
                                            <label class="control-label">Observación</label><br>
											<textarea rows="4" cols="140" name="matricula_descripcion" form="frm-matricula-archivo"></textarea>
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
	<script type="text/javascript">
		function habilitar(obj) {
			var hab;
			frm=obj.form;
			num=obj.selectedIndex;
			if (num==1){
				hab=true;
			}else if (num==2){
				hab=false;
			}
			frm.archivo.disabled=!hab;
			frm.matricula_cantidad.disabled=hab;
			frm.nombre.disabled=hab;
		}
	</script>

</body>

</html>
