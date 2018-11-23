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
                            Historial de citas realizadas <?php echo $_SESSION['persona_id'] ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Alumno</th>
                                            <th>Fecha</th>
                                            <th style="text-align: center">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach($this->model->ListaCitas($_SESSION['persona_id']) as $r): ?>
                                            <tr class="odd gradeX">

                                                <td><?php echo $r->persona_nombres; ?></td>
                                                <td><?php echo $r->tutoria_fecha; ?></td>
                                                <?php if($r->tutoria_estado==0){ ?>
                                                    <td style="text-align: center">PENDIENTE</td>
                                                <?php } ?>
                                                <?php if($r->tutoria_estado==1){ ?>
                                                    <td style="text-align: center">CANCELADO (<a onclick="javascript:return confirm('<?php echo $r->tutoria_cancelacion_motivo; ?>');" href="#">Motivo</a>)</td>
                                                <?php } ?>
                                                <?php if($r->tutoria_estado==2){ ?>
                                                    <td style="text-align: center">REALIZADO</td>
                                                <?php } ?>


                                        </tr>
                                    <?php endforeach;
                                    ?>
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
