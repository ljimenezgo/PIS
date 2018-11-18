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
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Matricular a <?php echo $pvd->persona_nombres; ?> a sus cursos
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Nombre</th>
                                            <th style="text-align: center">Matricular</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
										  foreach($this->model->ListaCursos() as $curso): ?>
                                        <tr class="odd gradeX">
                                            
                                            <?php 
                                                $pdo = Conectar::conexion();
                                                $sql = $pdo->prepare("SELECT * FROM alumno_curso WHERE alumno_cursoc_alumno_id=$pvd->persona_id && alumno_curso_curso_id=$curso->curso_id");
                                                $sql->execute();
                                                $row = $sql->fetch(PDO::FETCH_BOTH);
                                                
                                            ?>
                                            <td><?php echo $curso->curso_codigo; ?></td>
                                            <td><?php echo $curso->curso_descripcion; ?></td>
                                            <?php if($row['alumno_curso_id']=="") { ?>
                                                <td style="text-align: center"><a class="btn btn-primary btn-sm" href="?c=alumnoCurso&a=Matricular&aa=<?php echo $pvd->persona_id; ?>&b=<?php echo $curso->curso_id; ?>" role="button">Matricular</a></td>
                                            <?php }else{ ?>
                                                <td style="text-align: center"><a class="btn btn-warning btn-sm" href="?c=alumnoCurso&a=DesmatricularCurso&aa=<?php echo $row['alumno_curso_id'] ?>&b=<?php echo $pvd->persona_id; ?>" role="button">Desmatricular</a></td>                                           
                                            <?php } ?>
                                        </tr>                                        
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Row 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default card-view">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">Multiple Select (Public methods)</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                        <p class="text-muted"> Use a <code>select multiple</code> as your input element.</p>
                                        <div class="row mt-40">
                                            <div class="col-sm-12">
                                                <select multiple id="public-methods" name="public-methods[]">
                                                    <?php 
                                                        #foreach($this->model->ListaCursos() as $curso): ?>
                                                    <option value="<?php #echo $curso->curso_descripcion; ?>"><?php #echo $curso->curso_descripcion; ?></option>
                                                    <?php #endforeach; ?>

                                                </select>
                                                <div class="button-box"> 
                                                    <a id="select-all" class="btn btn-danger btn-outline mr-10 mt-15" href="#">select all</a> 
                                                    <a id="deselect-all" class="btn btn-info btn-outline mr-10 mt-15" href="#">deselect all</a> 
                                                    <a id="add-option" class="btn btn-success btn-outline mr-10 mt-15" href="#">Add option</a> 
                                                    <a id="refresh" class="btn btn-warning btn-outline mr-10 mt-15" href="#">refresh</a> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    -->
                </div>
            </div>
        </div>
    </div>
<?php include("scripts.php"); ?>
</body>
</html>