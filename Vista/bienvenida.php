<?php include("restriccion.php"); ?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<body>

    <div id="wrapper">
	<?php include("panel.php"); ?>		
<div class="container">
	<div class="row"><br><br><br><br><br><br><br>
        <div class="col-md-offset-1">
			<h4 style="border-bottom: 1px solid #c5c5c5;">
				<center>Bienvenido al panel <?php
							echo "<h4>" . $_SESSION['nombre_persona']."</h4>";
						?> </center>
			</h4>
		</div>
	</div>
</div>
	
    </div>
    <!-- /#wrapper -->
	<?php include("scripts.php"); ?>

</body>

</html>
