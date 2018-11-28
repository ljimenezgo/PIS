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
                            Alumnos registrados en tutoría para el docente
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Apellidos y Nombres</th>
                                            <th>CUI</th>
                                            <th>Email</th>
                                            <th style="text-align: center">Ver</th>
											<th style="text-align: center">Editar</th>
                                            <th style="text-align: center">Tutoría</th>
                                            <!--<th style="text-align: center">Ficha Personal</th>-->
                                            <th style="text-align: center">Quitar</th>



                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($this->model->ListarAlumnos($_SESSION['persona_id']) as $r): ?>
                                        <tr class="odd gradeX">
											<td><?php echo $r->persona_apellido1; ?> <?php echo $r->persona_apellido2; ?> <?php echo $r->persona_nombres; ?></td>
											<td><?php echo $r->persona_cui; ?></td>
											<td><?php echo $r->persona_email; ?></td>
                      <td style="text-align: center"><a href="?c=alumno&a=Perfil&persona_id=<?php echo $r->persona_id; ?>">Ver</a></td>
                    <!--  <td style="text-align: center"><a href="?c=alumnoCurso&a=ListaCursosDeAlumno&alumno==<?php #echo $r->persona_id; ?>">Seguimiento</a></td>-->
											<td style="text-align: center"><a href="?c=alumno&a=Crud&persona_id=<?php echo $r->persona_id; ?>">Editar</a></td>
											<?php if($r->persona_citado_tutoria == 0){ ?>
                                            <td style="text-align: center"><a href="../Vista/Accion.php?c=tutoria&a=Citar&id_alumno=<?php echo $r->persona_id; ?>&id_docente=<?php echo $_SESSION['persona_id'] ?>">Citar</a></td>
                                            <?php }else{ ?>
                                            <td style="text-align: center"><a href="../Vista/Accion.php?c=tutoria&a=cancelar&id_alumno=<?php echo $r->persona_id; ?>&id_docente=<?php echo $_SESSION['persona_id'] ?>">Cancelar Cita</a> | <a href="../Vista/Accion.php?c=tutoria&a=ver&id_alumno=<?php echo $r->persona_id; ?>&id_docente=<?php echo $_SESSION['persona_id'] ?>">Ver</a></td>
											<?php } ?>
											<!--<td style="text-align: center"><a href="../Vista/Accion.php?c=tutoria&a=Nuevo&id_alumno=<?php echo $r->persona_id; ?>&id_docente=<?php echo $_SESSION['persona_id'] ?>">Llenar</a></td>-->
                                            <!--<td style="text-align: center"><a href="../Vista/Accion.php?c=tutoria&a=Nuevo&id_alumno=<?php echo $r->persona_id; ?>&id_docente=<?php echo $_SESSION['persona_id'] ?>">Llenar</a></td>-->
											<td style="text-align: center"><a href="../Vista/Accion.php?c=profesor&a=desmatricular&persona_id=<?php echo $r->persona_id; ?>&persona_tutor=<?php echo $_SESSION['persona_id'] ?>">Quitar</a></td>
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
