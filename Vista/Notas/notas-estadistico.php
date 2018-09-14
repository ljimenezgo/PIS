<?php   
        include("restriccion.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bienestar Social</title>

    <!-- Bootstrap Core CSS -->
    <link href="../plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../plugins/dist/css/bootstrap-select.css">

    <!-- MetisMenu CSS -->
    <link href="../plugins/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../plugins/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../plugins/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../plugins/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../plugins/morrisjs/morris.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../plugins/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <style type="text/css">
${demo.css}
        </style>
        <script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Estadistico Notas-Alumnos'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Estadistico',
            data: [
                <?php 
                $quinto=0;
                foreach($this->model->Notas_quinto()  as $r):
                $quinto+=1;  
                endforeach; ?> 
                                <?php 
                $tercio=0;
                foreach($this->model->Notas_tercio()  as $r):
                $tercio+=1;  
                endforeach; ?> 
                                <?php 
                $regular=0;
                foreach($this->model->Notas_regular()  as $r):
                $regular+=1;  
                endforeach; ?> 
                                <?php 
                $bajo=0;
                foreach($this->model->Notas_bajo()  as $r):
                $bajo+=1;  
                endforeach; ?> 
                                <?php 
                $deserto=0;
                foreach($this->model->Notas_deserto()  as $r):
                $deserto+=1;  
                endforeach; ?> 

                    ['Quinto',   <?php echo $quinto;?>],
                    ['Tercio',     <?php echo $tercio;?>],
                    ['Regular',    <?php echo $regular;?>],
                    ['Bajo',     <?php echo $bajo;?>],
                    ['Desertores',  <?php echo $deserto;?>]
                
            ]
        }]
    });
});


        </script>
</head>

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
                            Notas Alumno
                            <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#Formulario" data-toggle="tab">Quinto</a>
                                </li>
                                <li><a href="#Tercio" data-toggle="tab">Tercio</a>
                                </li>
                                 <li><a href="#Regular" data-toggle="tab">Regular</a>
                                </li>
                                 <li><a href="#Bajo" data-toggle="tab">Bajo</a>
                                </li>
                                 <li><a href="#Deserto" data-toggle="tab">Deserto</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="Formulario">
                                    
                                    <div class="dataTable_wrapper">
                                 <h2 align="center">Quinto</h2>
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
                                <div class="tab-pane fade" id="Tercio">
                                   
                                <div class="dataTable_wrapper">
                                 <h2 align="center">Tercio</h2>
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

                                                                <div class="tab-pane fade" id="Regular">
                                   
                                <div class="dataTable_wrapper">
                                 <h2 align="center">Regular</h2>
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


                                                                <div class="tab-pane fade" id="Bajo">
                                   
                                <div class="dataTable_wrapper">
                                 <h2 align="center">Bajo</h2>
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



                                                                <div class="tab-pane fade" id="Deserto">
                                   
                                <div class="dataTable_wrapper">
                                 <h2 align="center">Deserto</h2>
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