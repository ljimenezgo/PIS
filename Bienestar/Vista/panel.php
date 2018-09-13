<?php
if($_SESSION['rol']==1){
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
                <a class="navbar-brand" href="bienvenida.php.">Bienestar Social</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
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
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> R. P. y Dirección<span class="fa arrow"></span></a>
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
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Notas<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="../Vista/Accion.php?c=notas&a=Nuevo">Agregar Notas</a>
                                </li>
                                 <li>
                                    <a href="../Vista/Accion.php?c=notas&a=estadistico">Datos Estadisticos</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<!-- /Usuarios -->
						
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.Barra Desplegable Izquierda -->
        </nav>
		<!-- /.Barra Direccion -->

<?php
}
if($_SESSION['rol']==2){
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
                <a class="navbar-brand" href="bienvenida.php">Bienestar Social</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
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
											
						
						<!-- /Relaciones públicas y dirección -->                       
						<li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Malla Curricular<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="Accion.php?c=malla&a=Listar">Lista</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<!-- /Malla Curricular -->		
					
						
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.Barra Desplegable Izquierda -->
        </nav>
		<!-- /.Barra Alumno -->
<?php
}
if($_SESSION['rol']==3){
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
                <a class="navbar-brand" href="bienvenida.php">Bienestar Social</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
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
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Malla Curricular<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="Accion.php?c=malla&a=Listar">Lista</a>
                                </li>
								

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<!-- /Malla Curricular -->		
					
						
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.Barra Desplegable Izquierda -->
        </nav>
		<!-- /.Barra Profesor -->

<?php
}
?>
