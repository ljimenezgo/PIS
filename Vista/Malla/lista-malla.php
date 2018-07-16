<?php include("restriccion.php"); ?>
<?php
$connect = mysqli_connect("localhost", "root", "", "bd_epcc");
$tab_query = "SELECT * FROM malla_curricular";
$tab_result = mysqli_query($connect, $tab_query);
$tab_menu = '';
$tab_content = '';
$i = 0;
while($row = mysqli_fetch_array($tab_result))
{
 if($i == 0)
 {
  $tab_menu .= '
   <li class="active"><a href="#'.$row["malla_curricular_id"].'" data-toggle="tab">'.$row["malla_curricular_dsc"].'</a></li>
  ';
  $tab_content .= '
   <div id="'.$row["malla_curricular_id"].'" class="tab-pane fade in active">
  ';
 }
 else
 {
  $tab_menu .= '
   <li><a href="#'.$row["malla_curricular_id"].'" data-toggle="tab">'.$row["malla_curricular_dsc"].'</a></li>
  ';
  $tab_content .= '
   <div id="'.$row["malla_curricular_id"].'" class="tab-pane fade">
  ';
 }
 
 $product_query = "SELECT * FROM curso WHERE curso_malla_id = '".$row["malla_curricular_id"]."'";
 $product_result = mysqli_query($connect, $product_query);
 $j=1;
 while($sub_row = mysqli_fetch_array($product_result))
 {
  $tab_content .= '
                                <table>
								        <tr>
											<td>('.$j.')_</td>
                                            <td>'.$sub_row["curso_codigo"].' </td>
											<td>-</td>
                                            <td>'.$sub_row["curso_descripcion"].' </td>
                                        </tr>
										<br>
                                </table>
  ';
  $j++;
 }
 $tab_content .= '<div style="clear:both"></div></div>';
 $i++;
}
?>
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
                            Malla Curricular
                        </div>
                        <!-- /.panel-heading -->
                        <div class="container">
							<br />
							<ul class="nav nav-tabs">
							<?php
								echo $tab_menu;
							?>
							</ul>
							<div class="tab-content">
							<br />
							<?php
								echo $tab_content;
							?>
							</div>
						</div>
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
