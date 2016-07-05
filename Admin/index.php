<?php include('header.php') ?>

<!---Calendario-->



            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
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
                            Match Day <small>Estadísticas</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-home"></i> Inicio
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <?php
                            include_once('../TO/Solicitud.php');
                            include_once('../Logica/controlSolicitudes.php');
                            $controlSolicitud= controlSolicitudes::obtenerInstancia();
                            $numeroSolicitudes = $controlSolicitud->contarSolicitudes();
                            if ($numeroSolicitudes > 1){

                        ?>
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-flag"></i>  Tienes <a href="gestionSolicitudes.php" class="alert-link"><strong><?php echo $numeroSolicitudes?></strong> notificaciones  </a>  de nuevos recintos!
                        </div>
                        <?php
                            } else {
                                if ($numeroSolicitudes = 1){
                                    ?>
                                    <div class="alert alert-info alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <i class="fa fa-flag"></i>  Tienes <a href="gestionSolicitudes.php" class="alert-link"><strong><?php echo $numeroSolicitudes?></strong> notificación  </a>  de un nuevo recinto!
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-futbol-o fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php
                                        include_once('../TO/Recinto.php');
                                        include_once('../Logica/controlRecintos.php');
                                        $jefeRecinto = controlRecintos::obtenerInstancia();
                                        $numeroRecintos = $jefeRecinto->contarRecintos();
                                        ?>

                                        <div class="huge"><?php echo $numeroRecintos?></div>
                                        <div>Recintos</div>
                                    </div>
                                </div>
                            </div>
                            <a href="gestionRecintos.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php
                                        include_once('../TO/Usuario.php');
                                        include_once('../Logica/controlUsuarios.php');
                                        $jefeUsuario = controlUsuarios::obtenerInstancia();
                                        $numeroUsuarios = $jefeUsuario->contarJugadores();
                                        ?>

                                        <div class="huge"><?php echo $numeroUsuarios?></div>
                                        <div>Jugadores</div>
                                    </div>
                                </div>
                            </div>
                            <a href="gestionJugadores.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-exclamation-circle fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php
                                        include_once('../TO/Partido.php');
                                        include_once('../Logica/controlPartidos.php');
                                        $jefePartido = controlPartidos::obtenerInstancia();
                                        $numeroPartidos = $jefePartido->contarPartidos();
                                        ?>

                                        <div class="huge"><?php echo $numeroPartidos?></div>
                                        <div>Partidos</div>
                                    </div>
                                </div>
                            </div>
                            <a href="reportes.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php
                                        include_once('../TO/Comentario.php');
                                        include_once('../Logica/controlComentarios.php');
                                        $jefeComentario = controlComentarios::obtenerInstancia();
                                        $numeroComentarios = $jefeComentario->contarComentarios();
                                        ?>

                                        <div class="huge"><?php echo $numeroComentarios ?></div>
                                        <div>Comentarios</div>
                                    </div>
                                </div>
                            </div>
                            <a href="gestionComentarios.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
  <!--Calendario-->
<?php $vectorPartidos=$jefePartido->obtenerPartidosJS(); 
$json_array = json_encode($vectorPartidos);
echo $json_array;
?>
<script>
var jsona = <?php echo $json_array ?>;
  

    $(document).ready(function() {

        var hoy = new Date();
        var dd = hoy.getDate();
        var mm = hoy.getMonth()+1; //hoy es 0!
        var yyyy = hoy.getFullYear();
        

            if(dd<10) {
                dd='0'+dd
            } 

            if(mm<10) {
                mm='0'+mm
            } 

            hoy = mm+'-'+dd+'-'+yyyy;

      
        $('#calendar1').fullCalendar({

            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },

            defaultDate: hoy,
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                
               
               
                {
                    title: jsona[0]['title'],
                    url: 'http://google.com/',
                    start: '2016-07-10',
                }
            ]
        });
        
    });

</script>
<style>


    #calendar1 {
        max-width: 800px;
        margin: 0 auto;
    }

</style>
    <hr>
    <div id='calendar1'></div>



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
