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
                            Prestamo
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="Formulario">
									<form data-toggle="validator" role="form" id="frm-prestamo" action="?c=prestamo&a=Guardar" method="post" >
										<input type="hidden" name="prestamo_fecha_entrega" value="<?php echo date("Y-m-d");?>" readonly>

										<div class="form-group col-lg-12"><br>
											
                                            <label>Alumno</label>
											<select name= "prestamo_persona_id" class="selectpicker col-lg-12" data-live-search="true" required>
												<?php foreach($this->model->ListarAlumnos() as $r): ?>
													<option value="<?php echo $r->persona_id; ?>"  data-tokens="<?php echo $r->persona_cui; ?> <?php echo $r->persona_apellido1; ?> <?php echo $r->persona_nombres; ?>"><?php echo $r->persona_cui; ?> <?php echo $r->persona_apellido1; ?> <?php echo $r->persona_nombres; ?></option>
												<?php endforeach; ?> 
											</select>
											<br><br>
											
											<label>Libro</label>
											<select name= "prestamo_libro_id" class="selectpicker col-lg-12" data-live-search="true" required>
												<?php foreach($this->model->ListarLibros() as $rr): ?>
													<option value="<?php echo $rr->libro_id; ?>"  data-tokens="<?php echo $rr->libro_nombre; ?>"><?php echo $rr->libro_nombre; ?></option>
												<?php endforeach; ?> 
											</select>
											<br><br>
											<div class="form-group col-lg-9">
												<label>Fecha de devolucion</label>
												<input type="date" name="prestamo_fecha_a_devolver" step="1" min="<?php $hoy = getdate();?>" max="2019-12-31" value="<?php echo date("Y-m-d");?>"data-error="Llene este campo" required>                                        
												<div class="help-block with-errors"></div>
											</div>
										</div>
										
										<br>
										<div class="col-lg-12">
											<button type="submit" class="btn btn-default ">Prestar</button>
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
