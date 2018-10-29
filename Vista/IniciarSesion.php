<?php
	if(isset($_POST['submit']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
	}
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
    <link href="plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="plugins/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

	<!-- Timeline CSS -->
    <link href="plugins/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="plugins/dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- DataTables CSS -->
    <link href="plugins/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

	<!-- Morris Charts CSS -->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet">

	<!-- DataTables Responsive CSS -->
    <link href="plugins/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="plugins/estilo.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading center">
                        <h3 class="panel-title center"><center>Escuela Profesional de Ingeniería de Sistemas</center></h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="username" type="text" id="username" placeholder="Usuario" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="password" type="password" id="password" placeholder="Password" required>
                                </div>

                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="submit" value="Acceder" class="btn btn-primary btn-block btn-flat">
                            </fieldset>
							<?php
								include("Controlador/validarLogin_controlador.php");
								?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include("scripts.php"); ?>

</body>

</html>
