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
                            Edición de matricula
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="Formulario">
									<form data-toggle="validator" role="form" id="frm-matricula-archivo" enctype="multipart/form-data"  action="?c=matricula&a=Editar" method="post" >
                                        <input type="hidden" name="matricula_anio" value="<?php echo date("Y"); ?>" />
                                        <input type="hidden" name="matricula_estado" value=0 />
                                        <input type="hidden" name="matricula_tipo" value="<?php echo $pvd->matricula_tipo; ?>" />
                                        <input type="hidden" name="matricula_semestre" value="<?php echo $pvd->matricula_semestre; ?>" />
                                        
										<div class="form-group col-lg-6">
                                            <label class="control-label">Fecha Inicio</label>
											<input type="date" name="matricula_fecha_inicio" value="<?php echo date('Y-m-d',strtotime($pvd->matricula_fecha_inicio)); ?>" class="form-control" data-error="Ingrese una fecha de inicio" required>                                        
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group col-lg-6">
                                            <label class="control-label">Fecha Final</label>
											<input type="date" name="matricula_fecha_fin" value="<?php if (strtotime($pvd->matricula_fecha_fin) != strtotime("0000-00-00 00:00:00")){echo date('Y-m-d',strtotime($pvd->matricula_fecha_fin));}else{echo $pvd->matricula_fecha_fin;} ?>" class="form-control" >                                        
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group col-lg-12">
                                            <label class="control-label">Observación</label><br>
											<textarea rows="4" cols="140" name="matricula_descripcion"value="<?php echo $pvd->matricula_descripcion; ?>" form="frm-matricula-archivo"><?php echo $pvd->matricula_descripcion; ?></textarea>
										</div>
										<br>
										<div class="col-lg-12">
											<button type="submit" class="btn btn-default ">Editar</button>
											<a href="../Vista/Accion.php?c=matricula" class="btn btn-default">Regresar</a>										
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
