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
							<div class="alert alert-success">
                                Usted se encuentra en <a href="#" class="alert-link"> Tercio Superior</a>.
                            </div>
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
                            Comentarios de los docentes
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <?php foreach($this->modeloo->Listare($pvd->persona_id) as $r): ?>
								<div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><?php echo $r->persona_nombres; ?> <?php echo $r->persona_apellido1; ?></a>
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><?php echo $r->comentarios_docente_fecha; ?></a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                           <?php echo $r->comentarios_docente_comentario; ?> 
										</div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
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
