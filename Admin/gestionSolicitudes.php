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
                            Control de recintos alertados por jugadores
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
                                    if ($accion == "rechazar"){ ?>
                                    La solicitud <strong>"x"</strong> ha sido eliminada exitosamente.
                                    <?php } ?>



                                </div>
                            <?php
                            

                        }
                        ?>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="index.php">Inicio</a>
                            </li>
                            <li>
                                <i class="fa fa-futbol-o"></i> <a href="gestionRecintos.php">Recintos</a>
                            </li>
                            <li>
                                <i class="fa fa-edit"></i> <a href="agregarRecinto.php">Nuevo recinto</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-exclamation-circle"></i> Solicitudes
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                

                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Listado de solicitudes
                        </h3>
                        <p class="help-block">En el siguiente listado se muestran los recintos que han sido notificados por los usuarios de MatchDay. 
                            Puedes aprobar una solicitud pulsando el botón 
                            <button type="button" class="btn btn-xs btn-success" action="">Aprobar <i class="fa fa-check fa-1x"></i></button>
                            o de lo contrario, puedes rechazar una solicitud pulsando el botón 
                            <button type="button" class="btn btn-xs btn-danger" action="">Rechazar <i class="fa fa-times"></i></button>.

                        </p>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr id="color-encabezado">
                                        <th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>Superficie</th>
                                        <th>Dirección</th>
                                        <th>Precio</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include_once('../TO/Solicitud.php');
                                        include_once('../Logica/controlSolicitudes.php');
                                        $controlSolicitud = controlSolicitudes::obtenerInstancia();
                                        $solicitudes = $controlSolicitud->obtenerSolicitudes();
                                        if ($solicitudes == null){
                                            ?>
                                             <td colspan="5">No hay solicitudes<td>
                                            <?php
                                        } else {
                                        foreach ($solicitudes as $key) {
                                        ?>
                                    <tr>
                                        <td id="color-nombres"><?php echo $key->getNombre();?></td>
                                        <td><?php echo $key->getTipo();?></td>
                                        <td><?php echo $key->getSuperficie();?></td>
                                        <td><?php echo $key->getDireccion();?></td>
                                        <td><?php echo $key->getPrecio();?></td>
                                        <td align="center"><a href="procesarNuevoRecinto.php?idSolicitud=<?php echo $key->getIdSolicitud();?>">
                                            <button type="button" class="btn btn-sm btn-success" action="">Aprobar <i class="fa fa-check fa-1x"></i></button></a>
                                        </td>
                                        <td align="center"><a href="procesarSolicitud.php?idSolicitud=<?php echo $key->getIdSolicitud();?>">
                                            <button type="button" class="btn btn-sm btn-danger" action="">Rechazar <i class="fa fa-times fa-1x"></i></button></a>
                                        </td>
                                    </tr>
                                        <?php
                                        }
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
