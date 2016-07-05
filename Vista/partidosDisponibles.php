<?php 



$_SESSION['idRecinto']=NULL;


if(isset($_GET["jugar"]) ){
    $jugar=$_GET["jugar"];
    }else{
      $jugar=0;
    }

//Comprobamos que el usuario registrado siempre vea el header jugador
    $sesion= session_start();
    if(isset($_SESSION['user'])){
        include('headerJugador.php');
    }else{
        include('header.php'); 
    }

// 1. Listar partidos estado = agendado pendiente.
include_once('../TO/Partido.php');
include_once('../Logica/controlPartidos.php');

include_once('../TO/Equipo.php');
include_once('../Logica/controlEquipos.php');

include_once('../TO/Recinto.php');
include_once('../Logica/controlRecintos.php');

include_once('../TO/Usuario.php');
include_once('../Logica/controlUsuarios.php');

$controlPartido = controlPartidos::obtenerInstancia();
$controlEquipo = controlEquipos::obtenerInstancia();
$controlRecinto = controlRecintos::obtenerInstancia();
$controlUsuario = controlUsuarios::obtenerInstancia();


$partidosDisponibles = $controlPartido->obtenerPartidosDisponibles();


include_once('../TO/ListaSolicitudes.php');
include_once('../Logica/controlListaSolicitudes.php');

$controlSolicitudes = controlListaSolicitudes::obtenerInstancia();



?>

<!-- Portfolio section start -->
<!--link rel="stylesheet" type="text/css" href="css/bootstrap.css" /-->
<link href="css/profile.css" rel="stylesheet">



<div class="section secondary-section" id="contact-us">

    <?php
if(isset($_GET["accion"])){
  $accion = $_GET["accion"];  
  ?>
  <div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <?php
    if ($accion == "vestibulo"){ ?>
   <strong>Error! </strong>No puedes enviar más de una solicitud para este partido.
   <?php } 
   ?>


    


 </div>
<?php
}
?>
    <div class="container">
        <div class="title">
            <h2>Partidos de MatchDay</h2>
            <h4>¿Quieres jugar un partido? En MatchDay, hay <?php echo count($partidosDisponibles)?> partidos disponibles para ti.</h4>
        </div>
        <div id="single-project">
            <?php
            $cont = 0;
            foreach ($partidosDisponibles as $key) {
            ?>
            <div id="slidingDiv<?php echo $cont?>" class="toggleDiv row-fluid single-project">
                <div class="span6"> 
                    <style>
                        .Flexible-container {
                            position: relative;
                            padding-bottom: 56.25%;
                            padding-top: 80px;
                            height: 0;
                                  /* overflow: hidden; */
                        }
                                
                        .Flexible-container iframe,   
                        .Flexible-container object,  
                        .Flexible-container embed {
                            position: absolute;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                        }
                    </style>
                        <div class="Flexible-container">
                            <?php
                            // Nombre recinto
                            $idRecinto = $key->getIdRecinto();
                            $recinto = $controlRecinto->leerRecinto($idRecinto);
                            foreach ($recinto as $keyRecinto) {
                            ?>
                            <iframe
                                  width="600"   height="500"  frameborder="5" style="border:0"  maptype="satellite"
                                  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDR2WyVnnd9GsSTKys5OEkowPu41kMpEUs
                                    &q=Chile + Chillan + <?php echo $keyRecinto->getDireccion();?>" allowfullscreen>
                            </iframe>
                            <br>
                        </div>
                </div>
                <div class="span6">
                    <div class="project-description">
                        <div class="project-title clearfix">
                            <h3>
                                Datos del partido
                            </h3>
                            <span class="show_hide close">
                                <i class="icon-cancel"></i> 
                            </span>
                        </div>
                        <div class="project-info">
                            <div>
                                <span>Cancha</span><?php echo $keyRecinto->getNombre();?>
                            </div>
                            <div>
                                <span>Fecha</span><?php echo $key->getFecha();?>
                            </div>
                            <div>
                                <span>Hora</span><?php echo $key->getHora();?>
                            </div>
                            <?php
                            // Jugadores
                            $idPartido = $key->getIdPartido();
                            //$_SESSION["idPartido"] = $idPartido;
                            $jugadoresPartido = $controlEquipo->obtenerJugadoresPartido($idPartido);
                            echo "Partido: ".$idPartido;
                            ?>
                            <div>
                                <span>Jugadores</span>
                            </div>
                            <ul>
                            <?php
                            foreach ($jugadoresPartido as $keyEquipo) {
                                $idJugador = $keyEquipo->getIdUsuario();
                                $jugador = $controlUsuario->leerUsuario($idJugador);
                                foreach ($jugador as $keyJugador) {
                                    ?>
                                    <li>
                                    <?php
                                    echo $keyJugador->getNickname();
                                    ?>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                            </ul>
                            <br/>
                            <center><a href="enviarSolicitud.php?idPartido=<?php echo $idPartido?> ">
                                <button class="btn-busqueda">
                                    Solicitar unirse
                                </button> 
                            </a>
                            </center>
                            <?php
                            }  // fin for Recinto  
                            ?>
                        </div>
                    </div>    
                </div>
            </div> <!-- Fin slidingDiv -->
            <?php
            $cont++;
            }
            ?>


            <ul id="portfolio-grid" class="thumbnails row">
                <?php
                $cont = 0;
                foreach ($partidosDisponibles as $key) {   // foreach recintos
                    $idRecinto = $key->getIdRecinto();
                    $recinto = $controlRecinto->leerRecinto($idRecinto);
                    foreach ($recinto as $keyRecinto) {
                    ?>
                <li class="span4 mix web">
                <div class="thumbnail">
                    <img src="images/recintos/<?php echo $keyRecinto->getRutaFotografia();?>" height='640' width='400' alt="project 1">
                    <a href="#single-project" class="more show_hide" rel="#slidingDiv<?php echo $cont?>">
                        <i class="icon-plus"></i>
                    </a>
                    <h3> <?php echo $keyRecinto->getNombre(); ?> </h3>
                    <p>Dia del partido: <?php echo $key->getFecha()?></p>
                    <div class="mask"></div>
                </div>
                </li>
                <?php 
                    $cont++;
                }
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<!-- Portfolio section end -->



<footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="container text-center">
        <div class="footer-logo">
          <a href="index.html"><img class="img-responsive" src="images/logo.png" alt=""></a>
        </div>
        <div class="social-icons">
          <ul>
            <li><a class="envelope" href="#"><i class="fa fa-envelope"></i></a></li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li> 
            <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a class="tumblr" href="#"><i class="fa fa-tumblr-square"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <p>&copy; 2016 Oxygen Theme.</p>
          </div>
          <div class="col-sm-6">
            <p class="pull-right">Crafted by <a href="http://designscrazed.org/">Allie</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>  




        <!-- ScrollUp button end -->
        <!-- Include javascript -->
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.mixitup.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="js/jquery.cslider.js"></script>
        <script type="text/javascript" src="js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="js/jquery.inview.js"></script>

        <!-- css3-mediaqueries.js for IE8 or older -->
        <!--[if lt IE 9]>
            <script src="js/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="js/app.js"></script>



        <script src="http://maps.googleapis.com/maps/api/js"></script>
        <script>
        function initialize() {
          var mapProp = {
            center:new google.maps.LatLng(-36.602459, -72.077014),
            zoom:14,
            mapTypeId:google.maps.MapTypeId.ROADMAP
          };
          var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }


        google.maps.event.addDomListener(window, 'load', initialize);
        google.maps.event.addDomListener(
            window,
            'load',
            function () {
                 //1000 milliseconds == 1 second,
                 //play with this til find a happy minimum delay amount
                window.setTimeout(initialize, 1000);
            }
        );
        </script>
        <script type="text/javascript">
            $(function () {
                $(".demo1").bootstrapNews({
                    newsPerPage: 1,
                    autoplay: true,
                    pauseOnHover:true,
                    direction: 'up',
                    newsTickerInterval: 4000,
                    onToDo: function () {
                        //console.log(this);
                    }
                });
            });
        </script>


    </body>
</html>



