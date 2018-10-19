<?php include("restriccion.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php
include("head.php"); ?>

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
                            Libros pendientes de devolver
                        </div>
						
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Tipo</th>
                                            <th>Prestado a</th>
                                            <th>Fecha Entrega</th>
                                            <th>Fecha Devolución</th>
                                            <th>Estado</th>
                                            <th>Accion</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($this->model->Listar() as $r): ?>
                                        <tr class="odd gradeX">
										<?php
											$hoy = date("Y-m-d");
											if($hoy > $r->prestamo_fecha_a_devolver){
										?>
                                            <td bgcolor="red"><?php echo $r->libro_nombre; ?></td>
                                            <td bgcolor="red"><?php echo $r->prestamo_tipo; ?></td>
                                            <td bgcolor="red"><?php echo $r->persona_nombres; ?></td>
                                            <td bgcolor="red"><?php echo $r->prestamo_fecha_entrega; ?></td>
                                            <td bgcolor="red"><?php echo $r->prestamo_fecha_a_devolver; ?></td>
                                            <td bgcolor="red">ATRASADO</td>
                                            <td bgcolor="red" class="center"><a onclick="javascript:return confirm('¿Seguro de devolvieron este libro?');" href="?c=prestamo&a=Eliminar&prestamo_id=<?php echo $r->prestamo_id; ?>&prestamo_fecha_devolucion=<?php echo $hoy; ?>&persona_id=<?php echo $r->persona_id; ?>&tiempo=1&prestamo_libro_id=<?php echo $r->prestamo_libro_id; ?>">Devuelto</a></td>
										<?php
											}else{
										?>
											<td><?php echo $r->libro_nombre; ?></td>
											<td><?php echo $r->prestamo_tipo; ?></td>
                                            <td><?php echo $r->persona_nombres; ?></td>
                                            <td><?php echo $r->prestamo_fecha_entrega; ?></td>
                                            <td><?php echo $r->prestamo_fecha_a_devolver; ?></td>
                                            <td bgcolor="green">EN ESPERA</td>
                                            <td class="center"><a onclick="javascript:return confirm('¿Seguro de devolvieron este libro?');" href="?c=prestamo&a=Eliminar&prestamo_id=<?php echo $r->prestamo_id; ?>&prestamo_fecha_devolucion=<?php echo $hoy; ?>&persona_id=<?php echo $r->persona_id; ?>&prestamo_libro_id=<?php echo $r->prestamo_libro_id; ?>&tiempo=0">Devuelto</a></td>
										
										<?php
											}
										?>
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