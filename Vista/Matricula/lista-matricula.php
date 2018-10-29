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
                            MATRICULA
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
									
                                    <?php if(sizeof($this->model->Listar())){
										foreach($this->model->Listar() as $r): ?>
											
                                            <p>MATRICULA <?php echo $r->matricula_anio; ?></p>
                                            <p>SEMESTRE <?php echo $r->matricula_semestre; ?></p>
                                            <p>FECHA DE INICIO: <?php echo date('Y-m-d',strtotime($r->matricula_fecha_inicio)); ?></p>
                                            <?php if((strtotime($r->matricula_fecha_fin) != strtotime("0000-00-00 00:00:00"))){ ?>
												<p>FECHA DE CIERRE: 
													<?php echo date('Y-m-d',strtotime($r->matricula_fecha_fin)); ?>
												</p>
											<?php } ?>
                                            <?php if($r->matricula_descripcion != ""){ ?>
												<p>OBSERVACIÓN: 
													<?php echo $r->matricula_descripcion; ?>
												</p>
											<?php } ?>
											<?php
											if($_SESSION['rol']==1){
											?>
                                            <a href="?c=matricula&a=Crud&matricula_id=<?php echo $r->matricula_id; ?>"><span class="glyphicon glyphicon-pencil">EDITAR</a>
                                            <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=matricula&a=Eliminar&matricula_id=<?php echo $r->matricula_id; ?>"> <span class="glyphicon glyphicon-trash"></span> ELIMINAR</a>
											<?php
											}
											?>
                                    <?php endforeach; }else {
										if($_SESSION['rol']==1){
											echo "INGRESE UNA PROGRAMACIÓN DE MATRICULA <a href='../Vista/Accion.php?c=matricula&a=Nuevo'>AQUI</a> ";
										}else{
											echo "AUN NO INGRESARON LA FECHA DE MATRICULA";
										}
									}?>    
                                   
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include("scripts.php"); ?>

</body>

</html>