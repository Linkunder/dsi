<?php 

include('header.php');
include_once('../TO/Recinto.php');
include_once('../Logica/controlRecintos.php');

$jefeRecinto = controlRecintos::obtenerInstancia();

?>

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
                            Gestión de recintos
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="index.php">Inicio</a>
                            </li>
                            <li>
                                <i class="fa fa-futbol-o"></i> <a href="gestionRecintos.php">Recintos</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Nuevo recinto
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="procesarNuevoRecinto.php" method="post">
                            <div class="table-responsive">
                                <table class="table table-form">
                                    <tr>
                                        <th>Nombre: </th>
                                        <td><input class="form-control" name="nombre" id="nombre" value=""></td>
                                    </tr>
                                    <tr>
                                        <th>Tipo: </th>
                                        <td>
                                        <select class="form-control" name="tipo" id="tipo" value="">
                                            <option>Baby-fútbol</option>
                                            <option>Futbolito</option>
                                        </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Superficie: </th>
                                        <td>
                                            <select class="form-control" name="superficie" id="superficie" value="">
                                            <option>Pasto sintético</option>
                                            <option>Cerámica</option>
                                            <option>Tierra</option>
                                            <option>Cemento</option>
                                            <option>Piso flotante</option>
                                            <option>Piso sintético poliuretano</option>
                                        </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Precio: </th>
                                        <td><input class="form-control" name="precio" id="precio" value=""></td>
                                    </tr>
                                    <tr>
                                        <th>Dirección: </th>
                                        <td><input class="form-control" name="direccion" id="direccion" value=""></td>
                                    </tr>
                                    <tr>
                                        <th>Horario: </th>
                                        <td><input class="form-control" name="horario" id="horario" value=""></td>
                                    </tr>
                                    <tr>
                                        <th>Canchas: </th>
                                        <td><input class="form-control" name="canchas" id="canchas" value=""></td>
                                    </tr>
                                    <tr>
                                        <th>Telefono: </th>
                                        <td><input class="form-control" name="telefono" id="telefono" value=""></td>
                                    </tr>
                                </table>
                            </div>
                            
                            <div class="col-lg-4">
                                 <button type="submit" class="btn btn-lg btn-primary">Aceptar <i class="fa fa-check fa-1x"></i></button>
                            </div>
                            <div class="col-lg-4">
                                <button type="reset" class="btn btn-lg btn-warning">Reiniciar <i class="fa fa-eraser fa-1x"></i></button>
                            </div>
                            



                        </form>
                        <div class="col-lg-4">
                                <a href="gestionRecintos.php"><button class="btn btn-lg btn-danger">Volver <i class="fa fa-arrow-left fa-1x"></i></button></a>
                            </div>

                    </div>


                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include('footer.php') ?>
