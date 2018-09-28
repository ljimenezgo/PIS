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
                            Registro Notas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#Formulario" data-toggle="tab">Formulario</a>
                                </li>
                                <li><a href="#Archivo" data-toggle="tab">Archivo</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="Formulario">
									<form data-toggle="validator" role="form" id="frm-notas" action="?c=notas&a=Guardar" method="post" >
                                        <input type="hidden" name="persona_id" value="<?php echo $pvd->persona_id; ?>" />
                                        <input type="hidden" name="persona_tipo_id" value="1" />
                                        <input type="hidden" name="persona_estado" value="0" />

										<div class="form-group col-lg-12"><br>
											
                                            <label>Alumno</label>
											<select name= "nota_promedio_alumno_id" class="selectpicker col-lg-12" data-live-search="true">
												<?php foreach($this->model->Listar() as $r): ?>
													<option value="<?php echo $r->persona_id; ?>"  data-tokens="<?php echo $r->persona_cui; ?> <?php echo $r->persona_apellido1; ?> <?php echo $r->persona_nombres; ?>"><?php echo $r->persona_cui; ?> <?php echo $r->persona_apellido1; ?> <?php echo $r->persona_nombres; ?></option>
												<?php endforeach; ?> 
											</select>
											<br><br>
											<label>Año</label>
											<select name= "nota_promedio_anio" class="selectpicker col-lg-2" data-live-search="true">
													<option value="2018"  data-tokens="<?php echo $pvd->nota_promedio_anio; ?>">2018</option>
													<option value="2019"  data-tokens="<?php echo $pvd->nota_promedio_anio; ?>">2019</option>
													<option value="2020"  data-tokens="<?php echo $pvd->nota_promedio_anio; ?>">2020</option>
											</select>
											<label>Semestre</label>
											<select name= "nota_promedio_semestre" class="selectpicker col-lg-1" data-live-search="true">
													<option value="I"  data-tokens="<?php echo $pvd->nota_promedio_semestre; ?>">I</option>
													<option value="II"  data-tokens="<?php echo $pvd->nota_promedio_semestre; ?>">II</option>
													<option value="III"  data-tokens="<?php echo $pvd->nota_promedio_semestre; ?>">III</option>
											</select>
											<br><br>
											<div class="form-group col-lg-12">
												<label>Nota</label>
													<input class="form-control" name="nota_promedio_nota" value="<?php echo $pvd->nota_promedio_nota; ?>"  placeholder="Ingrese Nota" pattern="^[0-9]+$" data-error="Debe de contener solo números" required>
												<div class="help-block with-errors"></div>
											</div>
										</div>
										
										<br>
										<div class="col-lg-12">
											<button type="submit" class="btn btn-default ">Registrar</button>
											<button type="reset" class="btn btn-default">Reset</button>
										</div>
                                    </form>
								</div>
                                <div class="tab-pane fade" id="Archivo">
                                    <form data-toggle="validator" role="form" id="frm-nota-archivo" enctype="multipart/form-data" action="?c=notas&a=GuardarArchivo" method="post">
                                        
                                        <div class="form-group">
                                            <label>Subir Archivo</label>
                                            <input id="archivo" accept=".csv" name="archivo" type="file" data-error="Selecciona un archivo" required> 
											<div class="help-block with-errors"></div>
                                        </div>
                                  
                                        <button type="submit" class="btn btn-default">Registrar</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
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
