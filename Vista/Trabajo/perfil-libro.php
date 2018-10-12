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
                                <h3 class="panel-title"><?php echo $pvd->libro_nombre; ?> <!-- <button type="button" class="btn btn-primary btn-xs">Generar Reporte</button>--></h3>
								
                            </div>
							<?php
                                if($pvd->libro_cantidad_disponible!=0 && $pvd->libro_estado==0){
                            ?>
                                            
							<div class="alert alert-success">
                                Este libro se encuentra disponible</a>.
                            </div>
							<?php
                               }else{
                            ?>
							<div class="alert alert-danger">
                                Este libro NO se encuentra disponible</a>.
                            </div>
							<?php
                               }
                            ?>
                            <div class="panel-body">
                                <div class="row">
                                    <div class=" col-md-9 col-lg-9 ">
                                        <table class="table table-user-information">
                                            <tbody>
                                                <tr><td>Autor:</td>
                                                    <td><?php echo $pvd->libro_autor; ?></td>
                                                </tr>
                                                
												<tr>
                                                    <td>Autor</td>
                                                    <td><?php echo $pvd->libro_nombre; ?></td>
                                                </tr>
												<tr>
                                                    <td>Empresa</td>
                                                    <td><?php echo $pvd->libro_autor; ?></td>
                                                </tr>
												
												<tr>
                                                    <td>Especializacion</td>
                                                    <td><?php echo $pvd->libro_enlace; ?></td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
							<div >
							<canvas id="chart1" width="400" height="100"></canvas>
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
