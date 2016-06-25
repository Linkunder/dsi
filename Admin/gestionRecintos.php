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
                    <li class="active">
                        <a href="gestionRecintos.php"><i class="fa fa-fw fa-futbol-o"></i> Recintos</a>
                    </li>
                    <li>
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
                                <i class="fa fa-futbol-o"></i> Recintos
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <a href="agregarRecinto.php"><button class="btn btn-md btn-success">Agregar nuevo recinto <i class="fa fa-plus-circle fa-1x"></i></button></a>
                

                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Listado de recintos
                        </h3>
                        <p class="help-block">Puedes encontrar información detallada de cada recinto del listado pulsando el botón <button type="button" class="btn btn-xs btn-warning" action="">Editar <i class="fa fa-pencil fa-1x"></i></button></p>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr id="color-encabezado">
                                        <th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>Superficie</th>
                                        <th>Dirección</th>
                                        <th>Precio</th>
                                        <th>Estado</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include_once('../TO/Recinto.php');
                                        include_once('../Logica/controlRecintos.php');
                                        $jefeRecinto = controlRecintos::obtenerInstancia();
                                        $recintos = $jefeRecinto->obtenerRecintos();
                                        foreach ($recintos as $key) {
                                        ?>
                                    <tr>
                                        <td id="color-nombres"><?php echo $key->getNombre();?></td>
                                        <td><?php echo $key->getTipo();?></td>
                                        <td><?php echo $key->getSuperficie();?></td>
                                        <td><?php echo $key->getDireccion();?></td>
                                        <td><?php echo $key->getPrecio();?></td>
                                        <?php
                                            $estado = $key->getIdEstado();
                                            if ($estado == 2) { // Sujeto a cambios.
                                            ?>
                                        <td>No disponible </td>
                                        <td> <a href="habilitarRecinto.php?idRecinto=<?php echo $key->getIdRecinto();?>">
                                            <button type="button" class="btn btn-sm btn-success">Habilitar <i class="fa fa-arrow-circle-up fa-1x"></i></button>
                                            </a>
                                        </td>
                                        <?php
                                        } else {
                                            ?>
                                            <td>Disponible</td>
                                            <?php
                                            ?>
                                            <td> <a href="inhabilitarRecinto.php?idRecinto=<?php echo $key->getIdRecinto();?>">
                                                <button type="button" class="btn btn-sm btn-danger">Deshabilitar <i class="fa fa-arrow-circle-down fa-1x"></i></button>
                                            </a>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                        <td><a href="editarRecinto.php?idRecinto=<?php echo $key->getIdRecinto();?>"><button type="button" class="btn btn-sm btn-warning" action="">Editar <i class="fa fa-pencil fa-1x"></i></button></a></td>
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
