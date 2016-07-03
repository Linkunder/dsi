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
                    <li>
                        <a href="gestionJugadores.php"><i class="fa fa-fw fa-users"></i> Jugadores</a>
                    </li>
                    <li class="active">
                        <a href="gestionComentarios.php"><i class="fa fa-fw fa-comments"></i> Comentarios</a>
                    </li>
                    <li><hr/>
                        <a href="../Logica/controlSesion.php?tipo=salir"><i class="fa fa-sign-out"></i> Cerrar sesión</a>
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
                            Control de comentarios
                        </h1>

                        <?php
                        if(isset($_GET["accion"])){
                            $accion = $_GET["accion"];  
                            ?>
                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>


                                    <?php
                                    if ($accion == "eliminar"){ ?>
                                    El comentario <strong>"x"</strong> ha sido eliminado exitosamente.
                                    <?php } ?>




                                </div>
                            <?php
                            

                        }
                        ?>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="index.php">Inicio</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-comments"></i> Comentarios
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
      

                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Listado de comentarios
                        </h3>
                        <p class="help-block">
                            Si deseas eliminar un comentario inadecuado, pulsa el botón
                            <button type="button" class="btn btn-xs btn-danger">Eliminar <i class="fa fa-trash"></i></button>, y 
                            será eliminado de inmediato, con una sanción automática para el autor del comentario.
                        </p>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr id="color-encabezado">
                                        <th>Recinto</th>
                                        <th>Asunto</th>
                                        <th>Comentario</th>
                                        <th>Jugador</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include_once('../TO/Comentario.php');
                                        include_once('../Logica/controlComentarios.php');
                                        $controlComentario = controlComentarios::obtenerInstancia();
                                        $comentarios = $controlComentario->leerComentarios();
                                        if ($comentarios == null){
                                            ?>
                                            <td colspan="6">No hay comentarios<td>
                                            <?php
                                        } else {
                                        foreach ($comentarios as $key) {
                                        ?>
                                    <tr>
                                        <td id="color-nombres">
                                            <?php 
                                            $idRecinto = $key->getIdRecinto();
                                            include_once('../TO/Recinto.php');
                                            include_once('../Logica/controlRecintos.php');
                                            $controlRecinto = controlRecintos::obtenerInstancia();
                                            $recinto = $controlRecinto->leerRecinto($idRecinto);
                                            foreach ($recinto as $keyRecinto) {
                                                echo $keyRecinto->getNombre();
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $key->getAsunto();?></td>
                                        <td><?php echo $key->getContenido();?></td>
                                        <td>
                                            <?php 
                                            $idJugador = $key->getIdUsuario();
                                            include_once('../TO/Usuario.php');
                                            include_once('../Logica/controlUsuarios.php');
                                            $controlUsuario = controlUsuarios::obtenerInstancia();
                                            $jugador = $controlUsuario->leerUsuario($idJugador);
                                            foreach ($jugador as $keyJugador) {
                                                echo $keyJugador->getNombre()." ".$keyJugador->getApellido();
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $key->getFecha();?></td>
                                        <td align="center">
                                            <a href="eliminarComentario.php?idComentario=<?php echo $key->getIdComentario();?>">
                                                <button type="button" class="btn btn-sm btn-danger">Eliminar 
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                </a>
                                        </td>
                                    </tr>
                                        <?php
                                        } // Fin foreach
                                        } // Fin else
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
