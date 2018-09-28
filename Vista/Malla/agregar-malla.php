<?php include("restriccion.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php include("head.php"); ?>
<body>
	<?php include("panel.php"); ?>
    <div id="wrapper">		
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
                           Registro de Mallas Curriculares
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                              
                                <div lass="tab-pane fade" id="Archivo">
                                    <form data-toggle="validator"  role="form" id="malla-archivo" enctype="multipart/form-data" action="?c=malla&a=GuardarArchivo" method="post">
                                        
                                        <div class="form-group">
                                            <label>Subir Archivo</label> <br>
                                            <label>(OJO)  El nombre del archivo debe tener la siguiente estructura:</label>
                                            <label>año.iniciales_de_escuela.csv</label>
                                            <input id="archivo" accept=".csv" name="archivo" type="file" data-error="Selecciona un archivo" required> 
											<div class="help-block with-errors"></div>
                                        </div>
                                  
                                        <button type="submit" class="btn btn-default">Subir</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
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
