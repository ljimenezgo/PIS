<?php include("restriccion.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php include("head.php"); ?>

<body>

    <div id="wrapper">

        <?php include("panel.php"); ?>      
        <div id="page-wrapper">
            <!-- Title -->
                    <div class="row heading-bg">
                        <!-- Breadcrumb -->
                        <div class="col-lg-12">
                          <ol class="breadcrumb">
                            <li><a href="../Vista/bienvenida.php">Home</a></li>
                            <li><a href="../Vista/Accion.php?c=profesor&a=Tutor"><span>Lista de Alumnos</span></a></li>
                            <li><a href="../Vista/Accion.php?c=alumno&a=Perfil&persona_id=<?php echo $pvd->persona_id; ?>"><span>Peril</span></a></li>
                            <li class="active"><span>Cursos Matriculados</span></li>
                          </ol>
                        </div>
                        <!-- /Breadcrumb -->
                    </div>
                    <!-- /Title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Lista de cursos matriculados de  <?php echo $pvd->persona_nombres; ?>
                        </div>

                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <a class="btn btn-warning btn-sm" href="../Vista/Accion.php?c=alumnoCurso&a=ListaCursos&alumno=<?php echo $pvd->persona_id; ?>" role="button">Matricular a cursos</a>
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
                                          foreach($this->model->ListaCursos() as $curso): ?>
                                        <tr class="odd gradeX">
                                            
                                            <?php 
                                                $pdo = Conectar::conexion();
                                                $sql = $pdo->prepare("SELECT * FROM alumno_curso WHERE alumno_cursoc_alumno_id=$pvd->persona_id && alumno_curso_curso_id=$curso->curso_id");
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
                                                    <a class="btn btn-success btn-sm" href="?c=alumnoCurso&a=Bueno&aa=<?php echo $row['alumno_curso_id'] ?>&b=<?php echo $pvd->persona_id; ?>" role="button">Bien</a>
                                                    <a class="btn btn-warning btn-sm" href="?c=alumnoCurso&a=Regular&aa=<?php echo $row['alumno_curso_id'] ?>&b=<?php echo $pvd->persona_id; ?>" role="button">Regular</a>
                                                    <a class="btn btn-danger btn-sm" href="?c=alumnoCurso&a=Malo&aa=<?php echo $row['alumno_curso_id'] ?>&b=<?php echo $pvd->persona_id; ?>" role="button">Malo</a>
                                                </td>                                           
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