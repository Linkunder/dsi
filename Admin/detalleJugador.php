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
                        <a href="../Logica/controlSesion.php?tipo=salir"><i class="fa fa-sign-out"></i> Cerrar sesión</a>
                    </li>    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <link href="../Vista/css/profile.css" rel="stylesheet">

        <div id="page-wrapper">

            <div class="container-fluid">

                <?php
                include_once('../TO/Usuario.php');
                include_once('../Logica/controlUsuarios.php');
                $controlUsuario = controlUsuarios::obtenerInstancia();
                $idUsuario = $_GET['idJugador'];
                $usuario = $controlUsuario->leerUsuario($idUsuario);


                include_once('../TO/Equipo.php');
                include_once('../Logica/controlEquipos.php');
                $controlEquipo = controlEquipos::obtenerInstancia();

                include_once('../TO/Comentario.php');
                include_once('../Logica/controlComentarios.php');
                $controlComentario = controlComentarios::obtenerInstancia();



                foreach ($usuario as $key) {
                    
                


                ?>

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Información de usuarios
                            <a href="gestionJugadores.php">
                            <button class="btn btn-lg btn-primary"> Volver <i class="fa fa-arrow-left" aria-hidden="true"></i></button>
                            </a>
                        </h1>

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="index.php">Inicio</a>
                            </li>
                            <li >
                                <i class="fa fa-users"></i>  <a href="gestionJugadores.php">Jugadores</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user"></i> Jugador <?php echo $key->getNombre()." ".$key->getApellido();?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row --> 

                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">

                            <div class="col-sm-4">
                                <div class="profile-userpic">
                                    <img src="../Vista/images/usuarios/<?php echo $key->getRutaFotografia();?>" class="img-responsive" alt="">
                                </div>
                                <!-- SIDEBAR USER TITLE -->
                                <div class="profile-usertitle">
                                    <div class="profile-usertitle-name">
                                        <?php
                                        echo $key->getNombre()." ".$key->getApellido();
                                        ?>
                                    </div>
                                </div>
                                <!-- END SIDEBAR USER TITLE -->
                            </div>


                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" align="center"><strong>Datos de cuenta</strong></h3>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-striped table-hover">
                                            <tr>
                                                <th>Nickname: </th>
                                                <td><?php echo $key->getNickname();?></td>
                                            </tr>
                                            <tr>
                                                <th>Mail: </th>
                                                <td><?php echo $key->getEmail();?></td>
                                            </tr>
                                            <tr>
                                                <th>Fecha de nacimiento: </th>
                                                <td><?php echo $key->getFechaNacimiento();?></td>
                                            </tr>
                                            <tr>
                                                <th>Sexo: </th>
                                                <td><?php echo $key->getSexo();?></td>
                                            </tr>
                                            <tr>
                                                <th>Estado: </th>
                                                <td>
                                                    <?php
                                                    $estado = $key->getIdEstado();
                                                    if ($estado == 1){
                                                        echo "Habilitado";
                                                    } else {
                                                        echo "Inhabilitado";
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" align="center"><strong>Informe del jugador</strong></h3>                                    
                                    </div>
                                     <div class="panel-body">
                                        <div class="sample-chart-wrapper">
                                            <canvas id="pie-chart-sample4" ></canvas>
                                        </div>
                                        <?php
                                        $partidosJugador = $controlEquipo->contarPartidos($idUsuario);
                                        $comentariosJugador = $controlComentario->contarComentariosUsuario($idUsuario);
                                        ?>
                                        </hr>
                                        <table class="table table-striped table-hover">
                                            <tr>
                                                <th>Partidos: </th>
                                                <td><?php echo $partidosJugador?></td>
                                            </tr>
                                            <tr>
                                                <th>Comentarios: </th>
                                                <td><?php echo $comentariosJugador?></td>
                                            </tr>
                                        </table>

                                     </div>                                   
                                </div>
                            </div>


                            
                        </div>




                    </div>
                </div>
                <!-- /.row -->

            <?php
            }?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <script type="text/javascript" src="js/chartjs/chart.min.js"></script>
        <script type="text/javascript">
        var PieDoughnutChartSampleData4 = [
        {
            value: <?php echo $partidosJugador?>,
            color:"#f44336",
            highlight: "#ff8a80",
            label: "Partidos"
        },
        {
            value: <?php echo $comentariosJugador?>,
            color:"#2196f3",
            highlight: "#82b1ff",
            label: "Comentarios"
        }
        ]

        window.onload = function() {

            window.PieChartSample = new Chart(document.getElementById("pie-chart-sample4").getContext("2d")).Pie(PieDoughnutChartSampleData4,{
                responsive:true
            });

        };
    </script>


<?php include('footer.php') ?>
