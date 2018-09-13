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
                            Historial de Libros prestados
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Libro</th>
                                            <th>Alumno</th>
                                            <th>Fecha Entrega</th>
                                            <th>Fecha Devolución</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($this->model->ListarHistorial() as $r): ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $r->libro_nombre; ?></td>
                                            <td><?php echo $r->persona_nombres; ?></td>
                                            <td><?php echo $r->prestamo_fecha_entrega; ?></td>
                                            <td><?php echo $r->prestamo_fecha_a_devolver; ?></td>
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