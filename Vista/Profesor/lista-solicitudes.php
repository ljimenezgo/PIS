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
                            Alumnos que quieren su tutoría
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Apellidos y Nombres</th>
                                            <th>DNI</th>
                                            <th>Ver</th>
                                            <th>Desmatricular</th>
                                            
											
										
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($this->model->Solicitudes() as $r): ?>
                                        <tr class="odd gradeX">
											<td><?php echo $r->persona_apellido1; ?> <?php echo $r->persona_apellido2; ?> <?php echo $r->persona_nombres; ?></td>
											<td><?php echo $r->persona_dni; ?></td>
											<td class="center"><a href="?c=alumno&a=Perfil&persona_id=<?php echo $r->persona_id; ?>">Ver</a></td>
											<td class="center"><a href="../Vista/Accion.php?c=profesor&a=matricular&persona_id=<?php echo $r->persona_id; ?>&persona_tutor=<?php echo $_SESSION['persona_id'] ?>">Matricular</a></td>
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
