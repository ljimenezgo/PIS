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
                            Tesis Registradas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Nombre</th>
                                            <th>Autor</th>
                                            <th>Tipo</th>
                                            <?php if($_SESSION['rol']==4){ ?>
                                            <th style="text-align: center" >Editar</th>
                                            <th style="text-align: center" >Eliminar</th>
                                            <?php } ?>
                                            <th style="text-align: center" >Ver</th>
											
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
                                    if($_SESSION['rol']==4){
                                        foreach($this->model->ListarTesis() as $r): ?>
                                        <tr class="odd gradeX">
											<?php if($r->libro_cantidad_disponible!=0){ ?>
                                            <td><?php echo $r->libro_codigo; ?></td>
                                            <td><?php echo $r->libro_nombre; ?></td>
                                            <td><?php echo $r->libro_autor; ?></td>
											<?php if($r->libro_tipo == 1){ ?>
												<td>Virtual</td>
											<?php }else{ ?>
											    <td>Fisico</td>
											<?php } ?>
                                            <td style="text-align: center" class="center"><a href="?c=tesis&a=Crud&tesis_id=<?php echo $r->libro_id; ?>"><span class="glyphicon glyphicon-pencil"></a></td>
                                            <td style="text-align: center" class="center"><a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=tesis&a=Eliminar&tesis_id=<?php echo $r->libro_id; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                                            <td style="text-align: center" class="center"><a href="?c=tesis&a=Perfil&tesis_id=<?php echo $r->libro_id; ?>"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                            <?php }else{ ?>
											<td bgcolor="red"><?php echo $r->libro_codigo; ?></td>
                                            <td bgcolor="red"><?php echo $r->libro_nombre; ?></td>
                                            <td bgcolor="red"><?php echo $r->libro_autor; ?></td>
                                            <td bgcolor="red"><?php echo $r->libro_cantidad_disponible; ?></td>
                                            <td style="text-align: center" bgcolor="red" class="center"><a href="?c=tesis&a=Crud&tesis_id=<?php echo $r->libro_id; ?>"><span class="glyphicon glyphicon-pencil"></a></td>
                                            <td style="text-align: center" bgcolor="red" class="center"><a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=tesis&a=Eliminar&tesis_id=<?php echo $r->libro_id; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                                            <td style="text-align: center" bgcolor="red" class="center"><a href="?c=tesis&a=Perfil&tesis_id=<?php echo $r->libro_id; ?>"><span class="glyphicon glyphicon-eye-open"></span></a></td>
											<?php } ?>
                                        </tr>                                        
                                    <?php endforeach; 
                                    }else{
                                        foreach($this->model->ListarTesisVirtual() as $r): ?>
                                        <tr class="odd gradeX">
                                            <?php if($r->libro_cantidad_disponible!=0 or $r->libro_tipo==1){ ?>
                                            <td><?php echo $r->libro_codigo; ?></td>
                                            <td><?php echo $r->libro_nombre; ?></td>
                                            <td><?php echo $r->libro_autor; ?></td>
                                            <?php if($r->libro_tipo == 1){ ?>
												<td style="text-align: center">Virtual</td>
											     <?php }else{ ?>
											    <td style="text-align: center">Fisico</td>
											<?php } ?>
                                            
                                            <td style="text-align: center" class="center"><a href="?c=tesis&a=Perfil&tesis_id=<?php echo $r->libro_id; ?>"><span class="glyphicon glyphicon-eye-open"></span></a></td>
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