<?php include("restriccion.php"); ?>
<?php
include "Conexion.php";
$db =  connect();
$query=$db->query("select * from libro");
$countries = array();
while($r=$query->fetch_object()){ $countries[]=$r; }


?>
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
							<p>SOLO APARECERAN LOS LIBROS FISICOS</p>
							<ul class="nav nav-pills">
                                <li class="active"><a href="#Alumnos" data-toggle="tab">Alumnos</a></li>
                                <li><a href="#Docentes" data-toggle="tab">Docentes</a></li>
                                <li><a href="#ExAlumnos" data-toggle="tab">Ex Alumnos</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="Alumnos">
									<form data-toggle="validator" role="form" id="frm-prestamo" action="?c=prestamo&a=Guardar" method="post" >
										<input type="hidden" name="prestamo_fecha_entrega" value="<?php echo date("Y-m-d");?>" readonly>
										<input type="hidden" name="prestamo_prestador" value="<?php echo $_SESSION['persona_id']; ?>" />

										<div class="form-group col-lg-12">
                                            <label>Será prestado a: </label>
											<select name= "prestamo_persona_id" class="selectpicker col-lg-12" data-live-search="true" required>
												<?php foreach($this->model->ListarAlumnos() as $r): 
													$porcentaje = ($r->persona_prestamo_deuda*100)/$r->persona_prestamo_total;
													$porcentaje = 100-$porcentaje;
												?>
													
													<option value="<?php echo $r->persona_id; ?>"  data-tokens="<?php echo $r->persona_cui; ?> <?php echo $r->persona_apellido1; ?> <?php echo $r->persona_nombres; ?>"><?php echo $r->persona_cui; ?> <?php echo $r->persona_apellido1; ?> <?php echo $r->persona_nombres; ?><?php  echo "\t"; echo "---------"; echo "\t";echo "STATUS: "; echo ''.$porcentaje.'%'; ?></option>
												<?php endforeach; ?> 
											</select>
										</div>
										<div class="form-group col-lg-12">
                                            <label for="prestamo_direccion" class="control-label" >Dirección</label>
                                            <input class="form-control" name="prestamo_direccion" placeholder="Ingrese Direccion" data-error="Debe llenar este campo"required>
                                        	<div class="help-block with-errors"></div>
										</div>
										<div class="form-group col-lg-6">
											<label>Tipo</label>
											<div class="form-group">
												<select name="select" id= "select" class="form-control" required>
												  <option value='' selected>-- SELECCIONE --</option>
												  <option value="1" >Libro</option> 
												  <option value="2">Tesis</option>
												  <option value="3">Trabajo</option>
												</select>
											</div>
											<div class="form-group">
												<label for="name1">Seleccione</label>
												<select id="prestamo_libro_id" class="form-control" name="prestamo_libro_id" required>
											    </select>
											  </div>
										</div>
										<div class="form-group col-lg-6">
                                            <label for="prestamo_telefono" class="control-label" >Telefono</label>
                                            <input class="form-control" pattern="^[0-9]+$" name="prestamo_telefono" placeholder="Ingrese Numero de Telefono" data-error="Debe llenar este campo"required>
                                        	<div class="help-block with-errors"></div>
										</div>
										
											<div class="form-group col-lg-3">
												<label>Devolución</label>
												<p>¿Cuántos días se prestará el libro?</p>
												<input class="form-control" type="number" name="libro_cantidad" value="<?php echo $pvd->libro_cantidad; ?>"  placeholder="Ingrese dias" pattern="^[0-9]+$" data-error="Debe de contener solo números" required>
												<div class="help-block with-errors"></div>
											</div>
											
										
										
										<br>
										<div class="col-lg-12">
											<button type="submit" class="btn btn-default ">Prestar</button>
											<button type="reset" class="btn btn-default">Reset</button>
										</div>
                                    </form>
								</div>
                                
								<div class="tab-pane fade" id="Docentes">
									<form data-toggle="validator" role="form" id="frm-prestamo" action="?c=prestamo&a=Guardar" method="post" >
										<input type="hidden" name="prestamo_fecha_entrega" value="<?php echo date("Y-m-d");?>" readonly>
										<input type="hidden" name="prestamo_prestador" value="<?php echo $_SESSION['persona_id']; ?>" />

										<div class="form-group col-lg-12">
                                            <label>Será prestado a: </label>
											<select name= "prestamo_persona_id" class="selectpicker col-lg-12" data-live-search="true" required>
												<?php foreach($this->model->ListarDocentes() as $r): 
													$porcentaje = ($r->persona_prestamo_deuda*100)/$r->persona_prestamo_total;
													$porcentaje = 100-$porcentaje;
												?>
													
													<option value="<?php echo $r->persona_id; ?>"  data-tokens="<?php echo $r->persona_cui; ?> <?php echo $r->persona_apellido1; ?> <?php echo $r->persona_nombres; ?>"><?php echo $r->persona_cui; ?> <?php echo $r->persona_apellido1; ?> <?php echo $r->persona_nombres; ?><?php  echo "\t"; echo "---------"; echo "\t";echo "STATUS: "; echo ''.$porcentaje.'%'; ?></option>
												<?php endforeach; ?> 
											</select>
										</div>
										<div class="form-group col-lg-12">
                                            <label for="prestamo_direccion" class="control-label" >Dirección</label>
                                            <input class="form-control" name="prestamo_direccion" placeholder="Ingrese Direccion" data-error="Debe llenar este campo"required>
                                        	<div class="help-block with-errors"></div>
										</div>
										<div class="form-group col-lg-6">
											<label>Tipo</label>
											<div class="form-group">
												<select name="select" id= "select" class="form-control">
												  <option value='' selected>-- SELECCIONE --</option>
												  <option value="1" >Libro</option> 
												  <option value="2">Tesis</option>
												  <option value="3">Trabajo</option>
												</select>
											</div>
											<div class="form-group">
												<label for="name1">Seleccione</label>
												<select id="prestamo_libro_id" class="form-control" name="prestamo_libro_id" required>
											    </select>
											  </div>
										</div>
										<div class="form-group col-lg-6">
                                            <label for="prestamo_telefono" class="control-label" >Telefono</label>
                                            <input class="form-control" pattern="^[0-9]+$" name="prestamo_telefono" placeholder="Ingrese Numero de Telefono" data-error="Debe llenar este campo"required>
                                        	<div class="help-block with-errors"></div>
										</div>
										
											<div class="form-group col-lg-3">
												<label>Devolución</label>
												<p>¿Cuántos días se prestará el libro?</p>
												<input class="form-control" type="number" name="libro_cantidad" value="<?php echo $pvd->libro_cantidad; ?>"  placeholder="Ingrese dias" pattern="^[0-9]+$" data-error="Debe de contener solo números" required>
												<div class="help-block with-errors"></div>
											</div>
											
										
										
										<br>
										<div class="col-lg-12">
											<button type="submit" class="btn btn-default ">Prestar</button>
											<button type="reset" class="btn btn-default">Reset</button>
										</div>
                                    </form>
								</div>
								
								
								
								<div class="tab-pane fade" id="ExAlumnos">
								
									<form data-toggle="validator" role="form" id="frm-prestamo" action="?c=prestamo&a=Guardar" method="post" >
										<input type="hidden" name="prestamo_fecha_entrega" value="<?php echo date("Y-m-d");?>" readonly>
										<input type="hidden" name="prestamo_prestador" value="<?php echo $_SESSION['persona_id']; ?>" />

										<div class="form-group col-lg-12">
                                            <label>Será prestado a: </label>
											<select name= "prestamo_persona_id" class="selectpicker col-lg-12" data-live-search="true" required>
												<?php foreach($this->model->ListarExAlumnos() as $r): 
													$porcentaje = ($r->persona_prestamo_deuda*100)/$r->persona_prestamo_total;
													$porcentaje = 100-$porcentaje;
												?>
													
													<option value="<?php echo $r->persona_id; ?>"  data-tokens="<?php echo $r->persona_cui; ?> <?php echo $r->persona_apellido1; ?> <?php echo $r->persona_nombres; ?>"><?php echo $r->persona_cui; ?> <?php echo $r->persona_apellido1; ?> <?php echo $r->persona_nombres; ?><?php  echo "\t"; echo "---------"; echo "\t";echo "STATUS: "; echo ''.$porcentaje.'%'; ?></option>
												<?php endforeach; ?> 
											</select>
											<label>¿No lo encuentra? Agregue un nuevo ex alumno <a href="../Vista/Accion.php?c=prestamo&a=nuevoExAlumno">aquí</a></label>
											
										</div>
										<div class="form-group col-lg-12">
                                            <label for="prestamo_direccion" class="control-label" >Dirección</label>
                                            <input class="form-control" name="prestamo_direccion" placeholder="Ingrese Direccion" data-error="Debe llenar este campo"required>
                                        	<div class="help-block with-errors"></div>
										</div>
										<div class="form-group col-lg-6">
											<label>Tipo</label>
											<div class="form-group">
												<select name="select" id= "select" class="form-control">
												  <option value='' selected>-- SELECCIONE --</option>
												  <option value="1">Libro</option> 
												  <option value="2">Tesis</option>
												  <option value="3">Trabajo</option>
												</select>
											</div>
											<div class="form-group">
												<label for="name1">Seleccione</label>
												<select id="prestamo_libro_id" class="form-control" name="prestamo_libro_id" required>
											    </select>
											  </div>
										</div>
										<div class="form-group col-lg-6">
                                            <label for="prestamo_telefono" class="control-label" >Telefono</label>
                                            <input class="form-control" pattern="^[0-9]+$" name="prestamo_telefono" placeholder="Ingrese Numero de Telefono" data-error="Debe llenar este campo"required>
                                        	<div class="help-block with-errors"></div>
										</div>
										
											<div class="form-group col-lg-3">
												<label>Devolución</label>
												<p>¿Cuántos días se prestará el libro?</p>
												<input class="form-control" type="number" name="libro_cantidad" value="<?php echo $pvd->libro_cantidad; ?>"  placeholder="Ingrese dias" pattern="^[0-9]+$" data-error="Debe de contener solo números" required>
												<div class="help-block with-errors"></div>
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
<script type="text/javascript">
	$(document).ready(function(){
		$("#select").change(function(){
			$.get("Libros.php","select="+$("#select").val(), function(data){
				$("#prestamo_libro_id").html(data);
				console.log(data);
			});
		});

		$("#prestamo_libro_id").change(function(){
			$.get("Ciudades.php","prestamo_libro_id="+$("#prestamo_libro_id").val(), function(data){
				$("#ciudad_id").html(data);
				console.log(data);
			});
		});
	});
</script>

</body>

</html>
