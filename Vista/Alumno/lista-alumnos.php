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
                            Lista
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <?php 
                                foreach($this->model->SesionActual() as $rr):
                                if($rr->persona_solicitar==0 AND $rr->persona_tutor==0 AND $rr->persona_alumnos <20){          
                                ?>
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Apellidos y Nombres</th>
                                            <?php   if($_SESSION['rol']==2){ ?>
                                            <th>DNI</th>
                                            <?php
                                                }if($_SESSION['rol']!=2){
                                            ?>
                                            <th>CUI</th>
                                            <?php
                                                }
                                            ?>
                                            <th>Telefono</th>
                                            <th>Email</th>
                                            
                                            <?php
                                                if($_SESSION['rol']==1){
                                            ?>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                            <?php
                                                }
                                            ?>
                                            <th>Ver</th>
											<?php
                                                if($_SESSION['rol']==3){
                                            ?>
                                            <th>Matricular</th>
                                            <?php
                                                }
                                            ?>
                                            <?php
                                                if($_SESSION['rol']==2){
                                            ?>
                                            <th>Solicitar</th>
                                            <?php
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if($_SESSION['rol']==1){
										foreach($this->model->Listar() as $r): ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $r->persona_apellido1; ?> <?php echo $r->persona_apellido2; ?> <?php echo $r->persona_nombres; ?></td>
                                            <td><?php echo $r->persona_cui; ?></td>
                                            <td><?php echo $r->persona_telefono; ?></td>
                                            <td><?php echo $r->persona_email; ?></td>
                                            
                                            <td class="center"><a href="?c=alumno&a=Crud&persona_id=<?php echo $r->persona_id; ?>">Editar</a></td>
                                            <td class="center"><a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=alumno&a=Eliminar&persona_id=<?php echo $r->persona_id; ?>">Eliminar</a></td>
                                            <td class="center"><a href="?c=alumno&a=Perfil&persona_id=<?php echo $r->persona_id; ?>">Ver</a></td>
											
                                        </tr>                                        
                                    <?php endforeach;}
									
										if($_SESSION['rol']==3){
									    
											foreach($this->model->ListarTuto() as $r): ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $r->persona_apellido1; ?> <?php echo $r->persona_apellido2; ?> <?php echo $r->persona_nombres; ?></td>
                                            <td><?php echo $r->persona_cui; ?></td>
                                            <td><?php echo $r->persona_telefono; ?></td>
                                            <td><?php echo $r->persona_email; ?></td>
                                            
                                            <td class="center"><a href="?c=alumno&a=Perfil&persona_id=<?php echo $r->persona_id; ?>">Ver</a></td>
											
                                            <td class="center"><a href="../Vista/Accion.php?c=profesor&a=matricular&persona_id=<?php echo $r->persona_id; ?>&persona_tutor=<?php echo $_SESSION['persona_id'] ?>">Matricular</a></td>
                                            
                                        </tr>                                        
										<?php endforeach; }	


                                        if($_SESSION['rol']==2){
                                            
                                            foreach($this->model->ListarProfesoresDisponibles() as $r): ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $r->persona_apellido1; ?> <?php echo $r->persona_apellido2; ?> <?php echo $r->persona_nombres; ?></td>
                                            <td><?php echo $r->persona_dni; ?></td>
                                            <td><?php echo $r->persona_telefono; ?></td>
                                            <td><?php echo $r->persona_email; ?></td>
                                            
                                            <td class="center"><a href="?c=alumno&a=Perfil&persona_id=<?php echo $r->persona_id; ?>">Ver</a></td>
                                            
                                            <td class="center"><a href="../Vista/Accion.php?c=profesor&a=solicitar&persona_solicitar=<?php echo $r->persona_id; ?>&persona_id=<?php echo $_SESSION['persona_id'] ?>">Solicitar</a></td>
                                            
                                        </tr>                                        
                                        <?php endforeach; }?>

                                    </tbody>
                                </table>
                                <?php }elseif($rr->persona_solicitar!=0 AND $rr->persona_tutor==0 AND $rr->persona_tipo_id==2) {?>
                                    <p>Usted ya envió una solicitud de tutoría.</p>
                                    <p>Haga clic <a href="../Vista/Accion.php?c=profesor&a=cancelarSolicitudTutor&persona_id=<?php echo $_SESSION['persona_id'] ?>">aqui</a> si desea cancelarla</p>
                                <?php }elseif($rr->persona_tutor!=0 AND $rr->persona_tipo_id==2){
                                    ?>
                                     <p>Usted ya tiene tutor</p>   
                                <?php    
                                } elseif ($rr->persona_alumnos >=20 AND $rr->persona_tipo_id==3 ){
                                ?>
                                     <p>Ya superó el limite de inscripciones</p>   
                                <?php 
                                }
                                endforeach;    
                                ?>

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