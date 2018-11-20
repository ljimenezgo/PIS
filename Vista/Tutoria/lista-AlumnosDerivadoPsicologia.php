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
                            Alumnos Derivados
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Alumno</th>
                                            <th>Tutor</th>
                                            <th style="text-align: center" >Ver</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if($_SESSION['rol']==7){
                                        foreach($this->model->ListarAlumnosDerivadoPsicologia() as $r): ?>
                                            <tr class="odd gradeX">
											<?php if($r->tutoria_social==1){ ?>
                                                <td><?php echo $r->tutoria_social; ?></td>
                                                <td><?php echo $r->tutoria_alumno; ?></td>
                                                <td><?php echo $r->tutoria_docente; ?></td>
											    <td style="text-align: center" class="center"><a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="#"><span class="glyphicon glyphicon-trash"></span></a></td>
												<?php } ?>
                                        </tr>                                        
                                    <?php endforeach; 
                                    } ?>
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