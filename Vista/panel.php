<?php
require_once '../Modelo/database.php';
?>
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

<?php
if($_SESSION['rol']==1){
?>

                <a class="navbar-brand" href="bienvenida.php.">Tutoria</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
				<?php
					if($_SESSION['persona_colaborador']==1){
				?>
				<li class="dropdown">
					<?php
						$pdo = Conectar::conexion();
						$sql = $pdo->prepare("SELECT SUM(IF(DATEDIFF(prestamo.prestamo_fecha_a_devolver, prestamo.prestamo_fecha_entrega) < 0,1,0)) FROM prestamo WHERE prestamo_estado = 0 ");
						$sql->execute();
						$num_rows = $sql->fetchColumn();
					?>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
						<span class="badge bg-important"><?php echo $num_rows; ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> Tiene  <?php echo $num_rows; ?> prestamos retrasados
                                    <span class="pull-right text-muted small"><a href="../Vista/Accion.php?c=prestamo&a=lista">VER</a></span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>

                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
				<?php
					}
				?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php
							echo "<i>" . $_SESSION['nombre_persona']."</i>";
						?>
						<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="../Vista/Accion.php?c=contrasena&a=CambiarContrasena"><i class="fa fa-gear fa-fw"></i> Cambiar Contraseña</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Docentes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../Vista/Accion.php?c=profesor&a=Nuevo">Registro de Docentes</a>
                                </li>
                                <li>
                                    <a href="../Vista/Accion.php?c=profesor">Lista de Docentes</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<!-- /Alumnos -->
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Alumnos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../Vista/Accion.php?c=alumno&a=Nuevo">Registro de Alumnos</a>
                                </li>
                                <li>
                                    <a href="../Vista/Accion.php?c=alumno">Lista de Alumnos</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<!-- /Alumnos -->
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Administrador<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../Vista/Accion.php?c=administrador&a=Nuevo">Registro de Personal</a>
                                </li>
                                <li>
                                    <a href="../Vista/Accion.php?c=administrador">Lista de Personal</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<!-- /Relaciones públicas y dirección -->
						<li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Malla Curricular<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../Vista/Accion.php?c=malla">Lista</a>
                                </li>
								<li>
                                    <a href="../Vista/Accion.php?c=malla&a=Nuevo">Subir Nuevo</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

						<li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Matriculas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../Vista/Accion.php?c=matricula&a=Nuevo">Agregar</a>
                                </li>
								<li>
                                    <a href="../Vista/Accion.php?c=matricula">Gestionar</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<!--
						<li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Notas<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="../Vista/Accion.php?c=notas&a=Nuevo">Agregar Notas</a>
                                </li>
                                 <li>
                                    <a href="../Vista/Accion.php?c=notas&a=estadistico">Datos Estadisticos</a>
                                </li>
                            </ul>
						-->
                            <!-- /.nav-second-level -->
                        </li>
						<!-- /Usuarios -->
						<?php
							if($_SESSION['persona_colaborador']==1){
						?>
						<li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i>Préstamo<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="../Vista/Accion.php?c=prestamo&a=Nuevo">Agregar Prestamo</a>
                                </li>
                                 <li>
                                    <a href="../Vista/Accion.php?c=prestamo&a=lista">Pendiente</a>
                                </li>
								<li>
                                    <a href="../Vista/Accion.php?c=prestamo&a=historial">Historial</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

<?php
}}
if($_SESSION['rol']==2){
?>

                <a class="navbar-brand" href="bienvenida.php">Tutoria</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <?php
                        $pdo = Conectar::conexion();
                        $idd = $_SESSION['persona_id'];
                        $sql = $pdo->prepare("SELECT * FROM tutoria WHERE tutoria_alumno = $idd && tutoria_estado=0  ");
                        $sql->execute();
                        $row = $sql->fetch(PDO::FETCH_BOTH);
                        $num_rows = $sql->fetchColumn();
                    ?>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-comment fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        <span class="badge bg-important"><?php echo $num_rows; ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    Cita con su tutor el <?php echo $row['tutoria_fecha'] ?>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>

                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
			<?php
					if($_SESSION['persona_colaborador']==1){
				?>
				<li class="dropdown">
					<?php
						$pdo = Conectar::conexion();
						$sql = $pdo->prepare("SELECT SUM(IF(DATEDIFF(prestamo.prestamo_fecha_a_devolver, prestamo.prestamo_fecha_entrega) < 0,1,0)) FROM prestamo WHERE prestamo_estado = 0 ");
						$sql->execute();
						$num_rows = $sql->fetchColumn();
					?>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
						<span class="badge bg-important"><?php echo $num_rows; ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> Tiene  <?php echo $num_rows; ?> prestamos retrasados
                                    <span class="pull-right text-muted small"><a href="../Vista/Accion.php?c=prestamo&a=lista">VER</a></span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>

                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
				<?php
					}
				?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php
							echo "<i>" . $_SESSION['nombre_persona']."</i>";
						?>
						<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="../Vista/Accion.php?c=alumno&a=Perfil&persona_id=<?php echo $_SESSION['persona_id']; ?>"><i class="fa fa-user fa-fw"></i> Perfil</a>
                        </li>
                        <li><a href="../Vista/Accion.php?c=contrasena&a=CambiarContrasena"><i class="fa fa-gear fa-fw"></i> Cambiar Contraseña</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
						<li>
                            <a href="../Vista/Accion.php?c=alumno&a=Perfil&persona_id=<?php echo $_SESSION['persona_id']; ?>"><i class="fa fa-wrench fa-fw"></i> Perfil</a>
                        </li>
						<li>
                            <a href="../Vista/Accion.php?c=malla"><i class="fa fa-wrench fa-fw"></i> Malla Curricular</a>
						</li>
						<li>
                            <a href="../Vista/Accion.php?c=matricula"><i class="fa fa-wrench fa-fw"></i> Matriculas</a>
						</li>
                        <li>
                            <a href="../Vista/Accion.php?c=alumno"><i class="fa fa-wrench fa-fw"></i> Tutoría</a>
                        </li>
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Biblioteca<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../Vista/Accion.php?c=tesis">Lista de Tesis</a>
                                </li>
                                <li>
                                    <a href="../Vista/Accion.php?c=libro">Lista de Libros</a>
                                </li>
                            </ul>

                            <!-- /.nav-second-level -->
                        </li>
						<!-- /Relaciones públicas y dirección -->

					<?php
							if($_SESSION['persona_colaborador']==1){
						?>
						<li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i>Préstamo<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="../Vista/Accion.php?c=prestamo&a=Nuevo">Agregar Prestamo</a>
                                </li>
                                 <li>
                                    <a href="../Vista/Accion.php?c=prestamo&a=lista">Pendiente</a>
                                </li>
								<li>
                                    <a href="../Vista/Accion.php?c=prestamo&a=historial">Historial</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

<?php
}}
if($_SESSION['rol']==3){
?>

                <a class="navbar-brand" href="bienvenida.php">Tutoria</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
			<?php
					if($_SESSION['persona_colaborador']==1){
				?>
				<li class="dropdown">
					<?php
						$pdo = Conectar::conexion();
						$sql = $pdo->prepare("SELECT SUM(IF(DATEDIFF(prestamo.prestamo_fecha_a_devolver, prestamo.prestamo_fecha_entrega) < 0,1,0)) FROM prestamo WHERE prestamo_estado = 0 ");
						$sql->execute();
						$num_rows = $sql->fetchColumn();
					?>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
						<span class="badge bg-important"><?php echo $num_rows; ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> Tiene  <?php echo $num_rows; ?> prestamos retrasados
                                    <span class="pull-right text-muted small"><a href="../Vista/Accion.php?c=prestamo&a=lista">VER</a></span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>

                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
				<?php
					}
				?>

                <li class="dropdown">
                    <?php
                        $pdo = Conectar::conexion();
                        $sesioniniciada = $_SESSION['persona_id'];
                        $sql = $pdo->prepare("SELECT count(*) FROM persona WHERE persona_solicitar = $sesioniniciada ");
                        $sql->execute();
                        $num_rows = $sql->fetchColumn();
                    ?>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        <span class="badge bg-important"><?php echo $num_rows; ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> Tiene  <?php echo $num_rows; ?> solicitudes
                                    <span class="pull-right text-muted small"><a href="../Vista/Accion.php?c=profesor&a=Solicitudes">VER</a></span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>

                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php
							echo "<i>" . $_SESSION['nombre_persona']."</i>";
						?>
						<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="../Vista/Accion.php?c=contrasena&a=CambiarContrasena"><i class="fa fa-gear fa-fw"></i> Cambiar Contraseña</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
						<!-- /Alumnos -->
						<li>
                            <a href="../Vista/Accion.php?c=alumno"><i class="fa fa-wrench fa-fw"></i> Alumnos</a>
                        </li>

						<!-- /Relaciones públicas y dirección -->
						<li>
                            <a href="../Vista/Accion.php?c=malla"><i class="fa fa-wrench fa-fw"></i> Malla Curricular</a>
						</li>
						<li>
                            <a href="../Vista/Accion.php?c=profesor&a=Tutor"><i class="fa fa-wrench fa-fw"></i> Lista de Alumnos</a>
						</li>
                        <li>
                            <a href="../Vista/Accion.php?c=tutoria&a=ListaCitas"><i class="fa fa-wrench fa-fw"></i> Citas Tutoria</a>
                        </li>
                        <li>
                            <a href="../Vista/Accion.php?c=tutoria&a=ListaCitas"><i class="fa fa-wrench fa-fw"></i> Asesoría Academica</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Biblioteca<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../Vista/Accion.php?c=tesis">Lista de Tesis</a>
                                </li>
                                <li>
                                    <a href="../Vista/Accion.php?c=libro">Lista de Libros</a>
                                </li>
                            </ul>

                            <!-- /.nav-second-level -->
                        </li>
						<!-- /Malla Curricular -->
						<?php
							if($_SESSION['persona_colaborador']==1){
						?>
						<li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i>Préstamo<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="../Vista/Accion.php?c=prestamo&a=Nuevo">Agregar Prestamo</a>
                                </li>
                                 <li>
                                    <a href="../Vista/Accion.php?c=prestamo&a=lista">Pendiente</a>
                                </li>
								<li>
                                    <a href="../Vista/Accion.php?c=prestamo&a=historial">Historial</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
		<!-- /.Barra Profesor -->

<?php
}}
if($_SESSION['rol']==4){
?>

                <a class="navbar-brand" href="bienvenida.php">Biblioteca</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
					<?php
						$pdo = Conectar::conexion();
						$sql = $pdo->prepare("SELECT SUM(IF(DATEDIFF(prestamo.prestamo_fecha_a_devolver, prestamo.prestamo_fecha_entrega) < 0,1,0)) FROM prestamo WHERE prestamo_estado = 0 ");
						$sql->execute();
						$num_rows = $sql->fetchColumn();
					?>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
						<span class="badge bg-important"><?php echo $num_rows; ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> Tiene  <?php echo $num_rows; ?> prestamos retrasados
                                    <span class="pull-right text-muted small"><a href="../Vista/Accion.php?c=prestamo&a=lista">VER</a></span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>

                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
				<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php
							echo "<i>" . $_SESSION['nombre_persona']."</i>";
						?>
						<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="../Vista/Accion.php?c=contrasena&a=CambiarContrasena"><i class="fa fa-gear fa-fw"></i> Cambiar Contraseña</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

						<!-- /Alumnos -->
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Libros<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../Vista/Accion.php?c=libro&a=Nuevo">Registro de Libros</a>
                                </li>
                                <li>
                                    <a href="../Vista/Accion.php?c=libro">Lista de Libros</a>
                                </li>
                            </ul>

                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Tesis<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../Vista/Accion.php?c=tesis&a=Nuevo">Registro de Tesis</a>
                                </li>
                                <li>
                                    <a href="../Vista/Accion.php?c=tesis">Lista de Tesis</a>
                                </li>
                            </ul>

                            <!-- /.nav-second-level -->
                        </li>


						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Informes de Trabajo<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../Vista/Accion.php?c=trabajo&a=Nuevo">Registro de Informes</a>
                                </li>
                                <li>
                                    <a href="../Vista/Accion.php?c=trabajo">Lista de Informes</a>
                                </li>
                            </ul>

                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i>Préstamo<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="../Vista/Accion.php?c=prestamo&a=Nuevo">Agregar Prestamo</a>
                                </li>
                                 <li>
                                    <a href="../Vista/Accion.php?c=prestamo&a=lista">Pendiente</a>
                                </li>
								<li>
                                    <a href="../Vista/Accion.php?c=prestamo&a=historial">Historial</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<!-- /Colaborador -->
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Colaboradores<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../Vista/Accion.php?c=colaborador&a=Nuevo">Asignar Colaborador</a>
                                </li>
                                <li>
                                    <a href="../Vista/Accion.php?c=colaborador">Lista de Personal</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>



<?php
}
if($_SESSION['rol']==5){
?>

                <a class="navbar-brand" href="bienvenida.php">Biblioteca</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
					<?php
						$pdo = Conectar::conexion();
						$sql = $pdo->prepare("SELECT SUM(IF(DATEDIFF(prestamo.prestamo_fecha_a_devolver, prestamo.prestamo_fecha_entrega) < 0,1,0)) FROM prestamo WHERE prestamo_estado = 0 ");
						$sql->execute();
						$num_rows = $sql->fetchColumn();
					?>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
						<span class="badge bg-important"><?php echo $num_rows; ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> Tiene  <?php echo $num_rows; ?> prestamos retrasados
                                    <span class="pull-right text-muted small"><a href="../Vista/Accion.php?c=prestamo&a=lista">VER</a></span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>

                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
				<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php
							echo "<i>" . $_SESSION['nombre_persona']."</i>";
						?>
						<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="../Vista/Accion.php?c=contrasena&a=CambiarContrasena"><i class="fa fa-gear fa-fw"></i> Cambiar Contraseña</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">


						<li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i>Préstamo<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="../Vista/Accion.php?c=prestamo&a=Nuevo">Agregar Prestamo</a>
                                </li>
                                 <li>
                                    <a href="../Vista/Accion.php?c=prestamo&a=lista">Pendiente</a>
                                </li>
								<li>
                                    <a href="../Vista/Accion.php?c=prestamo&a=historial">Historial</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<!-- /Colaborador -->




<?php
//Si la sesion es para Psicología
}if($_SESSION['rol']==8 || $_SESSION['rol']==7 || $_SESSION['rol']==9){
?>
                <?php if($_SESSION['rol']==8){ ?>
                <a class="navbar-brand" href="bienvenida.php">PSICOLOGIA</a>
                <?php } ?>
                <?php if($_SESSION['rol']==7){ ?>
                <a class="navbar-brand" href="bienvenida.php">BIENESTAR SOCIAL</a>
                <?php } ?>
                <?php if($_SESSION['rol']==9){ ?>
                <a class="navbar-brand" href="bienvenida.php">MEDICO</a>
                <?php } ?>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php
                            echo "<i>" . $_SESSION['nombre_persona']."</i>";
                        ?>
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="../Vista/Accion.php?c=contrasena&a=CambiarContrasena"><i class="fa fa-gear fa-fw"></i> Cambiar Contraseña</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="../Vista/Accion.php?c=tutoria&a=ListarAlumnosDerivadoPsicologia"><i class="fa fa-wrench fa-fw"></i> Alumnos derivados</a>
                        </li>
<?php
}
?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.Barra Desplegable Izquierda -->
        </nav>
		<!-- /.Barra Profesor -->
