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
                            Registro de Ex Alumnos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                           

                            <!-- Tab panes -->
                            <div class="tab-content">
									<form data-toggle="validator" role="form" id="frm-prestamo" action="?c=prestamo&a=GuardarExAlumno" method="post" >
                                        <input type="hidden" name="persona_id" value="<?php echo $pvd->persona_id; ?>" />
                                        <input type="hidden" name="persona_tipo_id" value="6" />
                                        <input type="hidden" name="persona_estado" value="0" />
										<input type="hidden" name="persona_prestamo" value="0" />

										<div class="form-group col-lg-12">
                                            <label>Nombres</label>
											<input type="text" name="persona_nombres" value="<?php echo $pvd->persona_nombres; ?>" class="form-control" placeholder="Ingrese Nombre" pattern="^[a-zA-Za-zA-Z\s]+$" data-error="Debe de contener solo letras" required>                                        
											<div class="help-block with-errors"></div>
										</div>
                                        <div class="form-group col-lg-6">
                                            <label>Primer Apellido</label>
                                            <input class="form-control" name="persona_apellido1" value="<?php echo $pvd->persona_apellido1; ?>"  placeholder="Ingrese Primer Apellido" pattern="^[a-zA-Z\s]+$" data-error="Debe de contener solo letras" required>
                                        	<div class="help-block with-errors"></div>
										</div>
										<div class="form-group col-lg-6">
                                            <label>Segundo Apellido</label>
                                            <input class="form-control" name="persona_apellido2" value="<?php echo $pvd->persona_apellido2; ?>"  placeholder="Ingrese Segundo Apellido" pattern="^[a-zA-Z\s]+$" data-error="Debe de contener solo letras" required>
                                        	<div class="help-block with-errors"></div>
										</div>
										<div class="form-group col-lg-6">
                                            <label>Año Egreso</label>
                                            <input class="form-control" name="persona_egresado" value="<?php echo $pvd->persona_egresado; ?>"  placeholder="Ingrese Año de Egreso" pattern="^\d{4}$" data-error="Debe de tener 4 dígitos">
                                        	<div class="help-block with-errors"></div>
										</div>
                                        <div class="form-group col-lg-6">
                                            <label for="persona_dni" class="control-label" >DNI</label>
                                            <input class="form-control"  name="persona_dni" value="<?php echo $pvd->persona_dni; ?>"  placeholder="Ingrese DNI" pattern="^\d{8}$" data-error="Debe de tener 8 dígitos" required>
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group col-lg-6">
                                            <label for="persona_email" class="control-label" >Correo Electrónico</label>
                                            <input class="form-control" type="email"  name="persona_email" value="<?php echo $pvd->persona_email; ?>"  placeholder="Ingrese Correo Electrónico" data-error="Ingresa un correo válido" required>
											<div class="help-block with-errors"></div>
										</div>
										
										<br>
										<div class="col-lg-12">
											<button type="submit" class="btn btn-default ">Registrar</button>
											<button type="reset" class="btn btn-default">Reset</button>
										</div>
                                    </form>
                                
                                
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
