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
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Tab panes -->
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#Seguimiento" data-toggle="tab">Ficha de Seguimiento</a>
                                </li>
                                <li><a href="#Derivacion" data-toggle="tab">Derivacion</a>
                                </li>
                            </ul>
                            <form data-toggle="validator" role="form" id="frm-alumno" action="?c=tutoria&a=Guardar" method="post" >

                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="Seguimiento">
                                        <input type="hidden" name="tutoria_docente" value="<?php echo $dct->persona_id; ?>" />
                                        <input type="hidden" name="tutoria_alumno" value="<?php echo $alm->persona_id; ?>" />
                                        <input type="hidden" name="tutoria_id" value="<?php echo $tut->tutoria_id; ?>" />
<br>                                        <p>Docente: <?php echo $dct->persona_nombres; ?></p>
                                        <p>Alumno: <?php echo $alm->persona_nombres; ?></p>
                                        <p>Fecha: <?php echo $tut->tutoria_fecha; ?></p>
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Codigo</th>
                                                    <th>Nombre</th>
                                                    <th style="text-align: center">Estado</th>
                                                    <th style="text-align: center">Opcion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                  foreach($this->modeloCurso->ListaCursos() as $curso): ?>
                                                <tr class="odd gradeX">

                                                    <?php
                                                        $pdo = Conectar::conexion();
                                                        $sql = $pdo->prepare("SELECT * FROM alumno_curso WHERE alumno_cursoc_alumno_id=$alm->persona_id && alumno_curso_curso_id=$curso->curso_id");
                                                        $sql->execute();
                                                        $row = $sql->fetch(PDO::FETCH_BOTH);

                                                    ?>
                                                    <?php if($row['alumno_curso_id']!="") { ?>
                                                    <td><?php echo $curso->curso_codigo; ?></td>
                                                    <td><?php echo $curso->curso_descripcion; ?></td>
                                                    <?php if($row['alumno_curso_estado']==0){ ?>
                                                        <td style="text-align: center">Sin revisar</td>
                                                    <?php } ?>
                                                    <?php if($row['alumno_curso_estado']==1){ ?>
                                                        <td style="text-align: center">Bueno</td>
                                                    <?php } ?>
                                                    <?php if($row['alumno_curso_estado']==2){ ?>
                                                        <td style="text-align: center">Regular</td>
                                                    <?php } ?>
                                                    <?php if($row['alumno_curso_estado']==3){ ?>
                                                        <td style="text-align: center">Malo</td>
                                                    <?php } ?>

                                                        <td style="text-align: center">
                                                            <a class="btn btn-success btn-sm" href="?c=tutoria&a=EstadoCurso&aa=<?php echo $row['alumno_curso_id'] ?>&id_alumno=<?php echo $alm->persona_id; ?>&id_docente=<?php echo $dct->persona_id; ?>&id_tipo=0" role="button">Bien</a>
                                                            <a class="btn btn-warning btn-sm" href="?c=tutoria&a=EstadoCurso&aa=<?php echo $row['alumno_curso_id'] ?>&id_alumno=<?php echo $alm->persona_id; ?>&id_docente=<?php echo $dct->persona_id; ?>&id_tipo=1" role="button">Regular</a>
                                                            <a class="btn btn-danger btn-sm" href="?c=tutoria&a=EstadoCurso&aa=<?php echo $row['alumno_curso_id'] ?>&id_alumno=<?php echo $alm->persona_id; ?>&id_docente=<?php echo $dct->persona_id; ?>&id_tipo=2" role="button">Malo</a>
                                                        </td>
                                                    <?php } ?>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
										<div class="form-group col-lg-12">
                                            <label for="tutoria_observacion" class="control-label">Observacion</label>
											<input type="text" name="tutoria_observacion" value="<?php echo $tut->tutoria_observacion; ?>" class="form-control" placeholder="Ingrese Obervacion" data-error="Este campo es obligatorio" required>
											<div class="help-block with-errors"></div>
										</div>

										<br>


								</div>

                <div class="tab-pane fade" id="Derivacion">
                  <div class="form-group">
                      <label>Derivado a: </label>
                      <div class="form-group col-lg-12">

                      <div class="form-group col-lg-3">
                        <label class="checkbox">
                            <input type="checkbox" name="tutoria_piscologia" id="tutoria_piscologia" value="1">Psicología
                        </label>
                      </div>
                      <div class="form-group col-lg-3">
                                              <?php $fecha=date("Y-m-d") ?>
                                              <label for="tutoria_fecha" class="control-label">Fecha y Hora de Cita</label>
                                              <input type="datetime-local" min="<?php echo $fecha ?>T22:22" max="2050-11-20T21:25" name="tutoria_piscologia_fecha" value="<?php echo $tut->tutoria_piscologia_fecha; ?>" class="form-control" placeholder="Ingrese Fecha" data-error="La fecha no puede ser hoy o antes de hoy" >
  											<div class="help-block with-errors"></div>
                      </div>
                    </div>

                    <div class="form-group col-lg-12">

                    <div class="form-group col-lg-3">
                      <label class="checkbox">
                          <input type="checkbox" name="tutoria_social" id="tutoria_social" value="1">Bienestar Social
                      </label>
                    </div>
                    <div class="form-group col-lg-3">
                                            <?php $fecha=date("Y-m-d") ?>
                                            <label for="tutoria_fecha" class="control-label">Fecha y Hora de Cita</label>
                                            <input type="datetime-local" min="<?php echo $fecha ?>T22:22" max="2050-11-20T21:25" name="tutoria_social_fecha" value="<?php echo $tut->tutoria_social_fecha; ?>" class="form-control" placeholder="Ingrese Fecha" data-error="La fecha no puede ser hoy o antes de hoy" >
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>

                  <div class="form-group col-lg-12">

                  <div class="form-group col-lg-3">
                    <label class="checkbox">
                        <input type="checkbox" name="tutoria_medico" id="tutoria_medico" value="1">Atención Médica
                    </label>
                  </div>
                  <div class="form-group col-lg-3">
                                          <?php $fecha=date("Y-m-d") ?>
                                          <label for="tutoria_fecha" class="control-label">Fecha y Hora de Cita</label>
                                          <input type="datetime-local" min="<?php echo $fecha ?>T00:00" max="2050-11-20T21:25" name="tutoria_medico_fecha" value="<?php echo $tut->tutoria_medico_fecha; ?>" class="form-control" placeholder="Ingrese Fecha" data-error="La fecha no puede ser hoy o antes de hoy" >
                    <div class="help-block with-errors"></div>
                  </div>
                </div>



                  </div>
                  <!--
                  <div class="form-group col-lg-8" >
                      <label>Asunto</label>
                      <select name= "tutoria_asunto" id="tutoria_asunto" class="selectpicker col-lg-3" data-live-search="true" >
                              <option value="" >---ASUNTO---</option>
                              <option value="Academico" >ACADEMICO</option>
                              <option value="Personal" >PERSONAL</option>
                              <option value="Familiar" >FAMILIAR</option>
                              <option value="Otro" >OTRO</option>
                      </select>
                  </div>
                -->
                </div>

                            </div>
                            <div class="col-lg-12">
                              <button type="submit" class="btn btn-default ">Registrar</button>
                              <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                            </form>
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
