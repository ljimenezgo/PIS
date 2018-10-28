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
                            Edicion de Tesis
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="Formulario">
									<form role="form" id="frm-tesis" action="?c=tesis&a=Editar" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="tesis_tipo" value="<?php echo $pvd->libro_tipo; ?>" />
                                        <input type="hidden" name="tesis_id" value="<?php echo $pvd->libro_id; ?>" />
                                        <input type="hidden" name="tesis_caracteristica" value="<?php echo $pvd->libro_caracteristica; ?>" />
										<div class="form-group col-lg-12">
                                            <label>Codigo</label>
											<input type="text" name="tesis_codigo" value="<?php echo $pvd->libro_codigo; ?>" class="form-control" placeholder="Ingrese Codigo" data-error="Llene este campo" required>                                        
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group col-lg-6">
                                            <label>Titulo</label>
                                            <input class="form-control" name="tesis_nombre" value="<?php echo $pvd->libro_nombre; ?>"  placeholder="Ingrese Titulo"data-error="Llene este campo" required>                                        
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group col-lg-6">
                                            <label>Autor</label>
                                            <input class="form-control" name="tesis_autor" value="<?php echo $pvd->libro_autor; ?>"  placeholder="Ingrese Autor"pattern="^[a-zA-Z\s]+$" data-error="Debe de contener solo letras" required>
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group col-lg-3">
                                            <label>Año Publicacion</label>
                                            <input class="form-control" name="tesis_anio" value="<?php echo $pvd->libro_anio; ?>"  placeholder="Ingrese Año de Publicacion"pattern="^[0-9]+$" data-error="Debe de contener solo numeros" required>
											<div class="help-block with-errors"></div>
										</div>
                                        <?php
											if($pvd->libro_tipo == 2){
										?>
										<div class="form-group col-lg-6">
                                            <label>Actualmente tiene <?php echo $pvd->libro_cantidad_disponible; ?> unidades. Ingrese nuevo valor</label>
                                            <input class="form-control" name="tesis_cantidad" value="<?php echo $pvd->libro_cantidad_disponible; ?>"  placeholder="Ingrese Cantidad"pattern="^[0-9]+$" data-error="Debe de contener solo numeros" >
											<div class="help-block with-errors"></div>
										</div>

										<?php
											}else{
										?>
										<input type="hidden" name="tesis_cantidad" value="0" />
										<div class="form-group">
											<div class="col-sm-12">
												<label for="archivo" class="col-sm-2 control-label">Archivo</label>
												<input type="file" class="form-control" id="archivo" name="archivo">
												
												<?php 
													$path = "../files/".$pvd->libro_id;
													if(file_exists($path)){
														$directorio = opendir($path);
														?>
																<p>Usted tiene los siguientes archivos subidos</p>
																<?php
														while ($archivo = readdir($directorio))
														{
															if (!is_dir($archivo)){
																
																echo "<div data='".$path."/".$archivo."'><a href='".$path."/".$archivo."' title='Ver Archivo Adjunto'><span class='glyphicon glyphicon-file'></span>$archivo</a>";
																
																echo " <a href='#' class='delete' title='Ver Archivo Adjunto' ><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></div>";
																
															}
														}
													}
													
												?>
												
											</div>
										</div>
										<?php
											}
										?>
										<br><br><br>
										<div class="col-lg-12">
											<button type="submit" class="btn btn-default ">Editar</button>
											<a href="../Vista/Accion.php?c=tesis" class="btn btn-default">Regresar</a>
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
			$(document).ready(function() {
				$('.delete').click(function(){
					var parent = $(this).parent().attr('id');
					var service = $(this).parent().attr('data');
					var dataString = 'id='+service;
					
					$.ajax({
						type: "POST",
						url: "../Vista/del_file.php",
						data: dataString,
						success: function() {			
							location.reload();
						}
					});
				});                 
			});    
	</script>
</body>

</html>
