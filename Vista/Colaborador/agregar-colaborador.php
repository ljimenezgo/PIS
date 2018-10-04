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
                            Asignar Colaborador
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#Asignar" data-toggle="tab">Asignar Persona</a>
                                </li>
                                <li><a href="#Registrar" data-toggle="tab">Registrar Persona</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="Asignar">
									<form data-toggle="validator" role="form" id="frm-colaborador" action="?c=colaborador&a=GuardarExistente" method="post" >
										<br>
                                        <label>Elegir persona a la persona que se le asignará el puesto de colaborador</label>
										<div class="form-group col-lg-12">
											<select name= "persona_id" class="selectpicker col-lg-12" data-live-search="true" required>
												<?php foreach($this->model->ListarTodos() as $r): 
													$tipo = $r->tipo_persona_dsc;
												?>
												<option value="<?php echo $r->persona_id; ?>"  data-tokens="<?php echo $r->persona_apellido1; ?> <?php echo $r->persona_nombres; ?>"><?php echo $r->persona_apellido1; ?> <?php echo $r->persona_nombres; ?><?php  echo "\t"; echo "---------"; echo "\t";echo "TIPO: "; echo ''.$tipo.''; ?></option>
												<?php endforeach; ?> 
											</select>
										</div>
										<div class="col-lg-12">
											<button type="submit" class="btn btn-default ">Asignar Colaborador</button>
											<button type="reset" class="btn btn-default">Reset</button>
										</div>
                                    </form>
								</div>
                                <div class="tab-pane fade" id="Registrar">
                                    <form data-toggle="validator" role="form" id="frm-colaborador" action="?c=colaborador&a=Guardar" method="post" >
                                        <input type="hidden" name="persona_colaborador" value="2" />
                                        <input type="hidden" name="persona_tipo_id" value="5" />
                                        <input type="hidden" name="persona_estado" value="0" />
                                        <input type="hidden" name="persona_prestamo" value="0" />


										<div class="form-group col-lg-12">
                                            <label for="persona_nombres" class="control-label">Nombres</label>
											<input type="text" name="persona_nombres" value="<?php echo $pvd->persona_nombres; ?>" class="form-control" placeholder="Ingrese Nombre" pattern="^[a-zA-Z\s]+$" data-error="Debe de contener solo letras" required>                                        
											<div class="help-block with-errors"></div>
										</div>
                                        
										<div class="form-group col-lg-6">
                                            <label for="persona_apellido1" class="control-label">Primer Apellido</label>
                                            <input class="form-control" name="persona_apellido1" value="<?php echo $pvd->persona_apellido1; ?>"  placeholder="Ingrese Primer Apellido" pattern="^[a-zA-Z\s]+$" data-error="Debe de contener solo letras" required>
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group col-lg-6">
                                            <label for="persona_apellido2" class="control-label" >Segundo Apellido</label>
                                            <input class="form-control" pattern="^[a-zA-Z\s]+$" name="persona_apellido2" value="<?php echo $pvd->persona_apellido2; ?>"  placeholder="Ingrese Segundo Apellido" data-error="Debe de contener solo letras"required>
                                        	<div class="help-block with-errors"></div>
										</div>
										
                                        <div class="form-group col-lg-6">
                                            <label for="persona_dni" class="control-label" >DNI</label>
                                            <input class="form-control"  name="persona_dni" value="<?php echo $pvd->persona_dni; ?>"  placeholder="Ingrese DNI" pattern="^\d{8}$" data-error="Debe de tener 8 dígitos" required>
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group col-lg-6">
                                            <label for="persona_email" class="control-label" >Correo Electrónico</label>
                                            <input type="email" id="persona_email" class="form-control" name="persona_email" value="<?php echo $pvd->persona_email; ?>" placeholder="Ingrese Correo Electrónico"  data-error="Ingresa un correo válido" required>
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group col-lg-12">
                                            <label>Dirección</label>
                                            <input class="form-control" name="persona_direccion" value="<?php echo $pvd->persona_direccion; ?>"  placeholder="Ingrese Dirección">
                                        </div>
										<div class="form-group col-lg-6">
                                            <label>Teléfono</label>
                                            <input class="form-control" name="persona_telefono" value="<?php echo $pvd->persona_telefono; ?>"  placeholder="Ingrese Teléfono">
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
