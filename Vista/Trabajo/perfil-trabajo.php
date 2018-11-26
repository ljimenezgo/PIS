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
                                if(($pvd->libro_cantidad_disponible!=0 && $pvd->libro_estado==0) or $pvd->libro_tipo==1){
                            ?>

							<div class="alert alert-success">
                                Este Informe de trabajo se encuentra disponible</a>.
                            </div>
							<?php
                               }else{
                            ?>
							<div class="alert alert-danger">
                                Este Informe de trabajo NO se encuentra disponible</a>.
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
                                                    <td>Tipo</td>
													<?php
														if($pvd->libro_tipo == 1){
													?>
													<td>Virtual</td>
													<?php
													   }else{
													?>
													<td>Físico</td>
													<?php
													   }
													?>
                                                </tr>
												<tr>
                                                    <td>Año Publicación</td>
                                                    <td><?php echo $pvd->libro_anio; ?></td>
                                                </tr>
												<tr>
                                                    <td>Titulo</td>
                                                    <td><?php echo $pvd->trabajo_titulo; ?></td>
                                                </tr>
													<?php
														if($pvd->libro_tipo == 2){
													?>
												<tr>
                                                    <td>Cantidad Total</td>
                                                    <td><?php echo $pvd->libro_cantidad_disponible+$pvd->libro_cantidad; ?></td>
                                                </tr>
														<?php } ?>

                                            </tbody>
                                        </table>
										<?php
											if($pvd->libro_tipo==1){

												$path = "../files/".$pvd->libro_id;
													if(file_exists($path)){
														$directorio = opendir($path);
														?>
																<p>ENLACE</p>
																<?php
														while ($archivo = readdir($directorio))
														{
															if (!is_dir($archivo)){

																echo "<div data='".$path."/".$archivo."'><a href='".$path."/".$archivo."' title='Ver Archivo Adjunto'><span class='glyphicon glyphicon-file'></span>$archivo</a>";

															}
														}
													}

											}
										?>
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
