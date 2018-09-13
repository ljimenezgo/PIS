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
                            Alumnos Registrados
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Nombre</th>
                                            <th>Autor</th>
                                            <th>Cantidad</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                            <th>Ver</th>
											
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($this->model->Listar() as $r): ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $r->libro_codigo; ?></td>
                                            <td><?php echo $r->libro_nombre; ?></td>
                                            <td><?php echo $r->libro_autor; ?></td>
                                            <td><?php echo $r->libro_cantidad_disponible; ?></td>
                                            <td class="center"><a href="?c=libro&a=Crud&libro_id=<?php echo $r->libro_id; ?>">Editar</a></td>
                                            <td class="center"><a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=libro&a=Eliminar&libro_id=<?php echo $r->libro_id; ?>">Eliminar</a></td>
                                            <td class="center"><a href="?c=libro&a=Perfil&libro_id=<?php echo $r->libro_id; ?>">Ver</a></td>
                                            
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