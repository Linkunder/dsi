<?php include('header.php') ?>


            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-home"></i> Inicio</a>
                    </li>
                    <li>
                        <a href="reportes.php"><i class="fa fa-fw fa-bar-chart-o"></i> Reportes</a>
                    </li>
                    <li>
                        <a href="gestionRecintos.php"><i class="fa fa-fw fa-futbol-o"></i> Recintos</a>
                    </li>
                    <li class="active">
                        <a href="gestionJugadores.php"><i class="fa fa-fw fa-users"></i> Jugadores</a>
                    </li>
                    <li>
                        <a href="gestionComentarios.php"><i class="fa fa-fw fa-comments"></i> Comentarios</a>
                    </li>
                    <li><hr/>
                        <a href="cerrarSesion.php"><i class="fa fa-sign-out"></i> Cerrar sesión</a>
                    </li>    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Control de recintos
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="index.php">Inicio</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-users"></i> Jugadores
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row --> 

                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Listado de jugadores
                        </h3>
                        <p class="help-block">Puedes encontrar información detallada de cada jugador del listado pulsando el botón 
                            <button type="button" class="btn btn-xs btn-info" action="">Seleccionar <i class="fa fa-info-circle"></i></button>.
                        </p>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr id="color-encabezado">
                                        <th>Nombre</th>
                                        <th>Nickname</th>
                                        <th>Mail</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include_once('../TO/Usuario.php');
                                        include_once('../Logica/controlUsuarios.php');
                                        $controlUsuario = controlUsuarios::obtenerInstancia();
                                        $jugadores = $controlUsuario->obtenerUsuarios(); // Trae hasta el admin. Corregir.
                                        foreach ($jugadores as $key) {
                                        ?>
                                    <tr>
                                        <td id="color-nombres"><?php echo $key->getNombre()." ".$key->getApellido() ;?></td>
                                        <td><?php echo $key->getNickname();?></td>
                                        <td><?php echo $key->getEmail();?></td>
                                        <?php
                                            $estado = $key->getIdEstado();
                                            if ($estado == 2) { // Sujeto a cambios.
                                            ?>
                                        <td>No disponible </td>
                                        <td> <a href="habilitarJugador.php?idJugador=<?php echo $key->getIdUsuario();?>">
                                            <button type="button" class="btn btn-sm btn-success">Habilitar <i class="fa fa-arrow-circle-up fa-1x"></i></button>
                                            </a>
                                        </td>
                                        <?php
                                        } else {
                                            ?>
                                            <td>Disponible</td>
                                            <?php
                                            ?>
                                            <td> <a href="inhabilitarJugador.php?idJugador=<?php echo $key->getIdUsuario();?>">
                                                <button type="button" class="btn btn-sm btn-danger">Deshabilitar <i class="fa fa-arrow-circle-down fa-1x"></i></button>
                                            </a>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                        <td>
                                            <a href="detalleJugador.php?idJugador=<?php echo $key->getIdUsuario();?>">
                                                <button type="button" class="btn btn-sm btn-info" action="">Seleccionar <i class="fa fa-info-circle"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                        <?php
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php include('footer.php') ?>
