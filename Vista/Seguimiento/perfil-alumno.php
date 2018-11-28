<?php include("restriccion.php"); ?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<body>
	<div id="wrapper">
	<?php include("panel.php"); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
							<br>

                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo $pvd->persona_nombres; ?> <?php echo $pvd->persona_apellido1; ?>  <!-- <button type="button" class="btn btn-primary btn-xs">Generar Reporte</button>--></h3>

                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class=" col-md-9 col-lg-9 ">
                                        <table class="table table-user-information">
                                            <tbody>
                                                <tr><td>CUI:</td>
                                                    <td><?php echo $pvd->persona_cui; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Dirección</td>
                                                    <td><?php echo $pvd->persona_direccion; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Correo</td>
                                                    <td><?php echo $pvd->persona_email; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Telefono</td>
                                                    <td><?php echo $pvd->persona_telefono; ?></td>
                                                </tr>
                                                <?php if($_SESSION['rol']==3){ ?>
                                                <tr>
                                                    <td><a class="btn btn-warning btn-sm" href="../Vista/Accion.php?c=alumnoCurso&a=ListaCursos&alumno=<?php echo $pvd->persona_id; ?>" role="button">Matricular a cursos</a> </td>
                                                    <td><a class="btn btn-warning btn-sm" href="../Vista/Accion.php?c=alumnoCurso&a=ListaCursosDeAlumno&alumno=<?php echo $pvd->persona_id; ?>" role="button">Ver cursos</a></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


							<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            FICHA DE SEGUIMIENTO - Tutoría
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <?php foreach($this->modeloo->ListaTutoria($pvd->persona_id) as $r):
									if($r->tutoria_estado==2 ){
								?>

								<div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <?php echo $r->tutoria_docente; ?>
                                            <?php echo $r->tutoria_fecha; ?>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                           <?php echo $r->tutoria_observacion; ?>

                                           <div >
                                            <br>
                                        <?php
                                        if($r->tutoria_medico == 1 || $r->tutoria_piscologia == 1 || $r->tutoria_social == 1){ ?>
                                            <form data-toggle="validator" role="form" id="frm-alumno" action="?c=tutoria&a=Asistido" method="post" >
                                                <input type="hidden" name="tutoria_alumno" value="<?php echo $pvd->persona_id; ?>" />
                                                <input type="hidden" name="tutoria_id" value="<?php echo $r->tutoria_id; ?>" />
                                                <?php if($r->tutoria_piscologia == 1){
                                                        if($r->tutoria_piscologia_aceptado == 0){
                                                    ?>
                                                <label class="checkbox-inline">
                                                    <span class="btn btn-danger btn-sm">Psicología</span><br>
                                                </label>
                                                <?php }else{?>
                                                <span class="btn btn-success btn-sm">Psicología</span>
                                                <input type="hidden" name="tutoria_piscologia_aceptado" value="1" />

                                                <?php }}

																								if($r->tutoria_social == 1){
                                                        if($r->tutoria_social_aceptado == 0){
                                                    ?>
                                                <label class="checkbox-inline">
                                                    <span class="btn btn-danger btn-sm">Bienestar Social</span><br>
                                                </label>
                                                <?php }else{ ?>
                                                <span class="btn btn-success btn-sm">Bienestar Social</span>
                                                <input type="hidden" name="tutoria_social_aceptado" value="1" />

                                                <?php }} if($r->tutoria_medico == 1){
                                                        if($r->tutoria_medico_aceptado == 0){
                                                    ?>

                                                <label class="checkbox-inline">
                                                    <span class="btn btn-danger btn-sm">Atención Médica</span><br>
                                                </label>
                                                <?php }else{ ?>
                                                <span class="btn btn-success btn-sm">Atención Médica</span>
                                                <input type="hidden" name="tutoria_medico_aceptado" value="1" />

                                                <?php }} ?>
                                                <?php
                                                if($_SESSION['rol']==3){
                                                if(($r->tutoria_medico == $r->tutoria_medico_aceptado) && ($r->tutoria_social == $r->tutoria_social_aceptado) && ($r->tutoria_piscologia == $r->tutoria_piscologia_aceptado)){ ?>

                                                <?php }else{ ?>
                                                <br><br>
                                                <!--<div >
                                                    <button type="submit" class="btn btn-primary">Confirmar Asistencia</button>
                                                </div>-->
                                            <?php } }?>
                                            </form>
                                        <?php } ?>
                                    </div>
										</div>
                                    </div>
                                </div>
                                <?php
									}
								endforeach; ?>
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->

                </div>
            </div>
            <!-- /.row -->
        <!-- /#page-wrapper -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
	<?php include("scripts.php"); ?>
</body>
</html>
