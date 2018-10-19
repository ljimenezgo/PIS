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
                            Libros Registrados
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Autor</th>
                                            <th>Empresa</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                            <th>Ver</th>
											
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($this->model->ListarTrabajo() as $r): ?>
                                        <tr class="odd gradeX">
										
											<?php
												if($r->libro_cantidad_disponible!=0){
											?>
                                            <td><?php echo $r->libro_codigo; ?></td>
                                            <td><?php echo $r->libro_nombre; ?></td>
                                            <td><?php echo $r->libro_autor; ?></td>
                                            <td class="center"><a href="?c=trabajo&a=Crud&libro_id=<?php echo $r->libro_id; ?>">Editar</a></td>
                                            <td class="center"><a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=trabajo&a=Eliminar&libro_id=<?php echo $r->libro_id; ?>">Eliminar</a></td>
                                            <td class="center"><a href="?c=trabajo&a=Perfil&libro_id=<?php echo $r->libro_id; ?>">Ver</a></td>
                                            <?php
												}else{
											?>
											<td bgcolor="red"><?php echo $r->libro_codigo; ?></td>
                                            <td bgcolor="red"><?php echo $r->libro_nombre; ?></td>
                                            <td bgcolor="red"><?php echo $r->libro_autor; ?></td>
                                            <td bgcolor="red" class="center"><a href="?c=trabajo&a=Crud&libro_id=<?php echo $r->libro_id; ?>">Editar</a></td>
                                            <td bgcolor="red" class="center"><a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=trabajo&a=Eliminar&libro_id=<?php echo $r->libro_id; ?>">Eliminar</a></td>
                                            <td bgcolor="red" class="center"><a href="?c=trabajo&a=Perfil&libro_id=<?php echo $r->libro_id; ?>">Ver</a></td>
											
											
											<?php
												}
											?>
                                        </tr>                                        
                                    <?php endforeach; ?>    
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
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