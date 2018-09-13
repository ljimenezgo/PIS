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
                            Registro de libro
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
									<form role="form" id="frm-libro" action="?c=libro&a=Guardar" method="post" >

										<div class="form-group col-lg-12">
                                            <label>Codigo</label>
											<input type="text" name="libro_codigo" value="<?php echo $pvd->libro_codigo; ?>" class="form-control" placeholder="Ingrese Codigo" data-validacion-tipo="requerido|min:100" />                                        </div>
                                        
										<div class="form-group col-lg-6">
                                            <label>Nombre</label>
                                            <input class="form-control" name="libro_nombre" value="<?php echo $pvd->libro_nombre; ?>"  placeholder="Ingrese Nombre">
                                        </div>
										<div class="form-group col-lg-6">
                                            <label>Autor</label>
                                            <input class="form-control" name="libro_autor" value="<?php echo $pvd->libro_autor; ?>"  placeholder="Ingrese Autor">
                                        </div>
										
                                        <div class="form-group col-lg-9">
                                            <label>Enlace</label>
                                            <input class="form-control" name="libro_enlace" value="<?php echo $pvd->libro_enlace; ?>"  placeholder="Ingrese Enlace">
                                        </div>
										<div class="form-group col-lg-3">
                                            <label>Cantidad</label>
                                            <input class="form-control" name="libro_cantidad" value="<?php echo $pvd->libro_cantidad_disponible; ?>"  placeholder="Ingrese Cantidad">
                                        </div>
										 <div class="form-group col-lg-12">
										<label>Tipo</label>
											<select name= "libro_tipo" class="selectpicker col-lg-2" data-live-search="true">
													<option value="1" >Virtual</option>
													<option value="2" >Fisico</option>
											</select>
										 </div>
										<br>
										<div class="col-lg-12">
											<button type="submit" class="btn btn-default ">Registrar</button>
											<button type="reset" class="btn btn-default">Reset</button>
										</div>
                                    </form>
								</div>
                                <div class="tab-pane fade" id="Archivo">
                                    <form role="form" id="frm-libro-archivo" enctype="multipart/form-data" action="?c=libro&a=GuardarArchivo" method="post">
                                        
                                        <div class="form-group">
                                            <label>Subir Archivo</label>
                                            <input id="archivo" accept=".csv" name="archivo" type="file" /> 
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
