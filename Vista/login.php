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

    <title>Sistema de Asistencias</title>

    <!-- Bootstrap Core CSS -->
    <link href="plugins/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="plugins/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="plugins/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="plugins/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>


<body style="background-color:#dfdfdf;">

	    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading center">
                        <h3 class="panel-title center"><center>Sistema de Asistencias</center></h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="username" type="text" id="username" placeholder="Usuario">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="password" type="password" id="password" placeholder="Password">
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


 <!-- jQuery -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="plugins/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="plugins/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="plugins/dist/js/sb-admin-2.js"></script>

 </body>
</html>


 