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
									<form data-toggle="validator" role="form" id="frm-libro" action="?c=libro&a=Guardar" method="post" >
                                        <input type="hidden" name="libro_tipo" value="1" />
                                        <input type="hidden" name="libro_cantidad" value="1000" />
                                        <input type="hidden" name="libro_enlace" value="<?php echo $pvd->libro_enlace; ?>" />
                                        <input type="hidden" name="libro_editorial" value="<?php echo $pvd->libro_editorial; ?>" />
										<div class="form-group col-lg-12">
                                            <label>Codigo</label>
											<input type="text" name="libro_codigo" value="<?php echo $pvd->libro_codigo; ?>" class="form-control" placeholder="Ingrese Codigo" data-error="Llene este campo" required>                                        
											<div class="help-block with-errors"></div>
										</div>
                                        
										<div class="form-group col-lg-6">
                                            <label>Titulo</label>
                                            <input class="form-control" name="libro_nombre" value="<?php echo $pvd->libro_nombre; ?>"  placeholder="Ingrese Nombre"data-error="Llene este campo" required>                                        
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group col-lg-6">
                                            <label>Autor</label>
                                            <input class="form-control" name="libro_autor" value="<?php echo $pvd->libro_autor; ?>"  placeholder="Ingrese Autor"pattern="^[a-zA-Z\s]+$" data-error="Debe de contener solo letras" required>
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group col-lg-3">
                                            <label>Año Publicacion</label>
                                            <input class="form-control" name="libro_anio" value="<?php echo $pvd->libro_anio; ?>"  placeholder="Ingrese Año de Publicacion"pattern="^[0-9]+$" data-error="Debe de contener solo numeros" required>
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
	function habilitar(obj) { 
		var hab; 
		frm=obj.form; 
		num=obj.selectedIndex; 
		if (num==1) hab=true; 
		else if (num==2) hab=false; 
		frm.libro_cantidad.disabled=hab; 
		frm.nombre.disabled=hab; 
	} 
</script>

</body>

</html>