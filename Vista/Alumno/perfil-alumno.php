<?php include("restriccion.php"); ?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<body>
    <div id="wrapper">
	<?php include("panel.php"); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
							<br>
							
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo $pvd->persona_nombres; ?> <?php echo $pvd->persona_apellido1; ?>  <!-- <button type="button" class="btn btn-primary btn-xs">Generar Reporte</button>--></h3>
								
                            </div>
							<!--
							<div class="alert alert-success">
                                Usted se encuentra en <a href="#" class="alert-link"> Tercio Superior</a>.
                            </div>
							-->
                            <div class="panel-body">
                                <div class="row">
                                    <div class=" col-md-9 col-lg-9 ">
                                        <table class="table table-user-information">
                                            <tbody>
                                                <tr><td>CUI:</td>
                                                    <td><?php echo $pvd->persona_cui; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Dirección</td>
                                                    <td><?php echo $pvd->persona_direccion; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Correo</td>
                                                    <td><a href="mailto:info@support.com"><?php echo $pvd->persona_email; ?></a></td>
                                                </tr>
                                                <tr>
                                                    <td>Telefono</td>
                                                    <td><?php echo $pvd->persona_telefono; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
							<div >
							<canvas id="chart1" width="400" height="100"></canvas>
							</div>
							<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            FICHA DE SEGUIMIENTO - Tutoría
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <?php foreach($this->modeloo->ListaTutoria($pvd->persona_id) as $r): 
									if($r->tutoria_estado==0){
								?>

								<div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><?php echo $r->persona_nombres; ?> <?php echo $r->persona_apellido1; ?></a>
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><?php echo $r->tutoria_fecha; ?></a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                           <?php echo $r->tutoria_observacion; ?> 
										</div>
                                    </div>
									
									<div class="alert alert-success">
										<?php 
										if($r->tutoria_medico == 1 || $r->tutoria_piscologia == 1 || $r->tutoria_social == 1){ ?>
										<form data-toggle="validator" role="form" id="frm-alumno" action="?c=tutoria&a=Asistido" method="post" >
										<input type="hidden" name="tutoria_alumno" value="<?php echo $pvd->persona_id; ?>" />
                                        <input type="hidden" name="tutoria_id" value="<?php echo $r->tutoria_id; ?>" />
										<?php if($r->tutoria_medico == 1){ ?>
										Derivado a <a href="#" class="alert-link"> asistencia medica</a>.<br>
										<?php } if($r->tutoria_social == 1){?>
										Derivado a <a href="#" class="alert-link"> Bienestar Social</a>.<br>
										<?php } if($r->tutoria_piscologia == 1){?>
										Derivado a <a href="#" class="alert-link"> Psicología</a>.
										
										<?php } ?>
										<br>
										<div class="col-lg-12">
											<button type="submit" class="btn btn-default ">Asistido</button>
										</div>
										</form>
										<?php } ?>
									</div>
                                </div>
                                <?php 
									}
								endforeach; ?>
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
							
                </div>
            </div>
            <!-- /.row -->
            
           
           
        <!-- /#page-wrapper -->
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	<?php include("scripts.php"); ?>
</body>



</html>
