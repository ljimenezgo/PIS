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
                            Notas Alumnos
                             <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                        </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <div class="tab-content">
                                
                                 <div class="dataTable_wrapper">
                                 <h2>Quinto</h2>
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Apellidos y Nombres</th>
                                            <th>CUI</th>
                                            <th>Semestre</th>
                                            <th>Notas</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($this->model->Notas_quinto() as $r): ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $r->persona_apellido1; ?> <?php echo $r->persona_apellido2; ?> <?php echo $r->persona_nombres; ?></td>
                                             <td><?php echo $r->persona_id; ?></td>
                                            <td><?php echo $r->nota_promedio_semestre; ?></td>
                                            <td><?php echo $r->nota_promedio_nota; ?></td>
                                        </tr>                                        
                                    <?php endforeach; ?>    
                                    </tbody>
                                </table>
                                
                            </div>
                            <!-- /.table-responsive -->

                        
                                
                        </div>
                         </div>
                        <!-- /.panel-body -->
                             <div class="panel-body">
                            <div class="tab-content">
                                 <div class="dataTable_wrapper">
                                 <h2>Tercio</h2>
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Apellidos y Nombres</th>
                                            <th>CUI</th>
                                            <th>Semestre</th>
                                            <th>Notas</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($this->model->Notas_tercio() as $r): ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $r->persona_apellido1; ?> <?php echo $r->persona_apellido2; ?> <?php echo $r->persona_nombres; ?></td>
                                             <td><?php echo $r->persona_id; ?></td>
                                            <td><?php echo $r->nota_promedio_semestre; ?></td>
                                            <td><?php echo $r->nota_promedio_nota; ?></td>
                                        </tr>                                        
                                    <?php endforeach; ?>    
                                    </tbody>
                                </table>
                                
                            </div>
                            <!-- /.table-responsive -->

                        
                                
                        </div>
                         </div>
                        <!-- /.panel-body -->

                        <div class="panel-body">
                            <div class="tab-content">
                            <h2>Regular</h2>
                                 <div class="dataTable_wrapper">
                                 
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Apellidos y Nombres</th>
                                            <th>CUI</th>
                                            <th>Semestre</th>
                                            <th>Notas</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($this->model->Notas_regular() as $r): ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $r->persona_apellido1; ?> <?php echo $r->persona_apellido2; ?> <?php echo $r->persona_nombres; ?></td>
                                             <td><?php echo $r->persona_id; ?></td>
                                            <td><?php echo $r->nota_promedio_semestre; ?></td>
                                            <td><?php echo $r->nota_promedio_nota; ?></td>
                                        </tr>                                        
                                    <?php endforeach; ?>    
                                    </tbody>
                                </table>
                                
                            </div>
                            <!-- /.table-responsive -->

                        
                                
                        </div>
                         </div>
                        <!-- /.panel-body -->

                        <div class="panel-body">
                            <div class="tab-content">
                                 <div class="dataTable_wrapper">
                                 <h2>Bajo</h2>
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Apellidos y Nombres</th>
                                            <th>CUI</th>
                                            <th>Semestre</th>
                                            <th>Notas</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($this->model->Notas_bajo() as $r): ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $r->persona_apellido1; ?> <?php echo $r->persona_apellido2; ?> <?php echo $r->persona_nombres; ?></td>
                                             <td><?php echo $r->persona_id; ?></td>
                                            <td><?php echo $r->nota_promedio_semestre; ?></td>
                                            <td><?php echo $r->nota_promedio_nota; ?></td>
                                        </tr>                                        
                                    <?php endforeach; ?>    
                                    </tbody>
                                </table>
                                
                            </div>
                            <!-- /.table-responsive -->

                        
                                
                        </div>
                         </div>
                        <!-- /.panel-body -->

                        <div class="panel-body">
                            <div class="tab-content">
                                 <div class="dataTable_wrapper">
                                 <h2>Deserto</h2>
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Apellidos y Nombres</th>
                                            <th>CUI</th>
                                            <th>Semestre</th>
                                            <th>Notas</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($this->model->Notas_deserto() as $r): ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $r->persona_apellido1; ?> <?php echo $r->persona_apellido2; ?> <?php echo $r->persona_nombres; ?></td>
                                             <td><?php echo $r->persona_id; ?></td>
                                            <td><?php echo $r->nota_promedio_semestre; ?></td>
                                            <td><?php echo $r->nota_promedio_nota; ?></td>
                                        </tr>                                        
                                    <?php endforeach; ?>    
                                    </tbody>
                                </table>
                                
                            </div>
                            <!-- /.table-responsive -->

                        
                                
                        </div>
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