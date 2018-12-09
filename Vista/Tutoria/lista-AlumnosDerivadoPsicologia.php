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
                                            <th>Alumno</th>
                                            <th>Fecha</th>
                                            <th style="text-align: center" >Ver</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if($_SESSION['rol']==8){
                                        foreach($this->model->ListarAlumnosDerivadoPsicologia() as $r): ?>
                                            <tr class="odd gradeX">
											                        <?php if($r->tutoria_piscologia==1){ ?>
                                                <td><?php echo $r->persona_nombres; ?></td>
                                                <td><?php echo $r->tutoria_piscologia_fecha; ?></td>
											    <td style="text-align: center" class="center"><?php if($r->tutoria_piscologia == 1){
                                                        if($r->tutoria_piscologia_aceptado == 0){
                                                    ?>
                                                <label class="">
                                                  <a class="btn btn-danger btn-sm" href="?c=tutoria&a=Asistido&tutoria_piscologia_aceptado=1&tutoria_alumno=<?php echo $r->tutoria_id; ?>&tutoria_medico_aceptado=<?php echo $r->tutoria_medico_aceptado; ?>&tutoria_social_aceptado=<?php echo $r->tutoria_social_aceptado; ?>&tutoria_id=<?php echo $r->tutoria_id; ?>" role="button">Atender</a>
                                                  <a class="btn btn-warning btn-sm" href="?c=tutoria&a=Asistido&tutoria_piscologia_aceptado=2&tutoria_alumno=<?php echo $r->tutoria_id; ?>&tutoria_medico_aceptado=<?php echo $r->tutoria_medico_aceptado; ?>&tutoria_social_aceptado=<?php echo $r->tutoria_social_aceptado; ?>&tutoria_id=<?php echo $r->tutoria_id; ?>" role="button">Seguimiento</a>

                                                </label>
                                              <?php }else if($r->tutoria_piscologia_aceptado == 2){?>
                                                <a class="btn btn-warning btn-sm" href="?c=tutoria&a=Asistido&tutoria_piscologia_aceptado=2&tutoria_alumno=<?php echo $r->tutoria_id; ?>&tutoria_medico_aceptado=<?php echo $r->tutoria_medico_aceptado; ?>&tutoria_social_aceptado=<?php echo $r->tutoria_social_aceptado; ?>&tutoria_id=<?php echo $r->tutoria_id; ?>" role="button">Está en seguimiento</a>
                                                <a class="btn btn-danger btn-sm" href="?c=tutoria&a=Asistido&tutoria_piscologia_aceptado=1&tutoria_alumno=<?php echo $r->tutoria_id; ?>&tutoria_medico_aceptado=<?php echo $r->tutoria_medico_aceptado; ?>&tutoria_social_aceptado=<?php echo $r->tutoria_social_aceptado; ?>&tutoria_id=<?php echo $r->tutoria_id; ?>" role="button">Atender</a>

                                                <input type="hidden" name="tutoria_piscologia_aceptado" value="2" />

                                              <?php }else{?>
                                                <span class="btn btn-success btn-sm">Atendido</span>
                                                <input type="hidden" name="tutoria_piscologia_aceptado" value="1" />

                                              <?php }} ?> </td>
												                      <?php } ?>
                                           </tr>
                                    <?php endforeach;
                                    }

                                    if($_SESSION['rol']==7){
                                        foreach($this->model->ListarAlumnosDerivadoPsicologia() as $r): ?>
                                            <tr class="odd gradeX">
											                        <?php if($r->tutoria_social==1){ ?>
                                                <td><?php echo $r->persona_nombres; ?></td>
                                                <td><?php echo $r->tutoria_social_fecha; ?></td>
											                          <td style="text-align: center" class="center"><?php if($r->tutoria_social == 1){
                                                        if($r->tutoria_social_aceptado == 0){
                                                    ?>
                                                <label class="">
                                                  <a class="btn btn-danger btn-sm" href="?c=tutoria&a=Asistido&tutoria_social_aceptado=1&tutoria_alumno=<?php echo $r->tutoria_id; ?>&tutoria_medico_aceptado=<?php echo $r->tutoria_medico_aceptado; ?>&tutoria_piscologia_aceptado=<?php echo $r->tutoria_piscologia_aceptado; ?>&tutoria_id=<?php echo $r->tutoria_id; ?>" role="button">No Atendido</a>

                                                </label>
                                                <?php }else{?>
                                                <span class="btn btn-success btn-sm">Atendido</span>
                                                <input type="hidden" name="tutoria_social_aceptado" value="1" />

                                              <?php }} ?> </td>
												                      <?php } ?>
                                           </tr>
                                    <?php endforeach;
                                    }

                                    if($_SESSION['rol']==9){
                                        foreach($this->model->ListarAlumnosDerivadoPsicologia() as $r): ?>
                                            <tr class="odd gradeX">
											                        <?php if($r->tutoria_medico==1){ ?>
                                                <td><?php echo $r->persona_nombres; ?></td>
                                                <td><?php echo $r->tutoria_medico_fecha; ?></td>
											                          <td style="text-align: center" class="center"><?php if($r->tutoria_medico == 1){
                                                        if($r->tutoria_medico_aceptado == 0){
                                                    ?>
                                                <label class="">
                                                  <a class="btn btn-danger btn-sm" href="?c=tutoria&a=Asistido&tutoria_medico_aceptado=1&tutoria_alumno=<?php echo $r->tutoria_id; ?>&tutoria_social_aceptado=<?php echo $r->tutoria_social_aceptado; ?>&tutoria_piscologia_aceptado=<?php echo $r->tutoria_piscologia_aceptado; ?>&tutoria_id=<?php echo $r->tutoria_id; ?>" role="button">No Atendido</a>

                                                </label>
                                                <?php }else{?>
                                                <span class="btn btn-success btn-sm">Atendido</span>
                                                <input type="hidden" name="tutoria_medico_aceptado" value="1" />

                                              <?php }} ?> </td>
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
