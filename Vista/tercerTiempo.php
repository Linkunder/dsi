<!DOCTYPE html>
<html lang="en">
<?php
    
include('headerJugador.php'); 

   
    if($_SESSION["sesion"]!="jugador") {
      header("Location:../Vista/inicio.php?inicio=falloJugador"); 
    }

/////Usuario de prueba//////

    $user= $_SESSION['user'];
    $idUsuario= $_SESSION['idUsuario'];
///////////////////////////////

?>

<!--Variables -->
<?php


// Información que viene del partido.;
$idUsuario= $_SESSION['idUsuario'];
$idRecinto= $_SESSION['idRecinto']; //Recinto seleccionado
$cantidad = $_SESSION['cantidad']; //Cantidad de jugadores seleccionados
$fecha =    $_SESSION['fecha'];
$hora =     $_SESSION['hora'];



include_once('../TO/Usuario.php');
include_once('../Logica/controlUsuarios.php');

include_once('../TO/Equipo.php');
include_once('../Logica/controlEquipos.php');

include_once('../TO/Recinto.php');
include_once('../Logica/controlRecintos.php');

include_once('../TO/Local.php');
include_once('../Logica/controlLocales.php');


include_once('../TO/Partido.php');
include_once('../Logica/controlPartidos.php');


$jefeEquipo = controlEquipos::obtenerInstancia();
$jefeUsuarios = controlUsuarios::obtenerInstancia();
$jefeRecintos = controlRecintos::obtenerInstancia();
$jefeLocales = controlLocales::obtenerInstancia();

$jefePartidos = controlPartidos::obtenerInstancia();  

$vectorUsuarios = $jefeUsuarios->leerUsuario($idUsuario);
$vectorRecintos = $jefeRecintos->leerRecinto($idRecinto);


$vectorLocales = $jefeLocales->obtenerLocales();

$vectorPartidos = $jefePartidos->obtenerPartidos();
$idPartido = end($vectorPartidos)->getIdPartido();

?>



<!---->



<!-- Aqui empieza la pagina -->



        <!-- Portfolio section start -->
        <!--link rel="stylesheet" type="text/css" href="css/bootstrap.css" /-->
<div class="section secondary-section" id="contact-us">
  <div class="container">
    <div class="title">
      <h2>Busca el lugar ideal para tu tercer tiempo<h2>
    </div>

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <form action="tercerTiempo.php" method="get">
          <input type="text" class="form-control" placeholder="Busca tu lugar ideal ..." name="search"/>
          <div class="row">
            <div class="col-md-6 col-md-offset-4">
              <div class="div-btn-a">
                <button class="btn-busqueda" type="submit">Buscar</button>  
              </div>
            </div>
          </div>
        </form>
      </div><!-- /.col-lg-6 -->
    </div>


                <?php
                    $search = '';
                    $cont = 0;
                    if (isset($_GET['search'])) {
                      $search = $_GET['search'];
                    }
                    if ($search!=''){  // if search

                        // AHORA VIENEN LOS RESULTADOS
                        ?>
                <h3>Resultados</h3>

                <ul class="nav nav-pills">
                    <li class="filter" data-filter="photo"></li>
                    <li class="filter" data-filter="identity"></li>
                </ul>
                <div id="single-project">
                    <?php
                    } // fin if search
                    foreach ($vectorLocales as $key) {   // foreach recintos
                        $nombre = $key->getNombre();
                        $pos = strripos($nombre, $search);
                        $descripcion = $key -> getDescripcion();
                        $pos2 = strripos($descripcion, $search);
                        $idLocal = $key->getIdLocal();
                        if ($pos !== false  ||   $pos2!==false  )  {  // if filtro dentro de foreach recintos
                            
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
                                <iframe
                                  width="600"   height="500"  frameborder="5" style="border:0"  maptype="satellite"
                                  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDR2WyVnnd9GsSTKys5OEkowPu41kMpEUs
                                    &q=Chile + Chillan + <?php echo $key->getDireccion();?>" allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3> <?php echo $nombre ?></h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i> 
                                    </span>

                                </div>



                                <div class="project-info">
                                    <div>
                                        <span>Nombre   </span><?php echo $key->getNombre();?>
                                    </div>
                                    <div>
                                        <span>Descripción   </span><?php echo $key->getDescripcion();?>
                                    </div>
                                    <div>
                                        <span>Dirección   </span><?php echo $key->getDireccion();?>
                                    </div>

                                    
                                    <br/>
                                    <?php 
                                    $_SESSION["idLocal"]=$idLocal;?>
                                    <center>
                                        <button class="btn-busqueda" href="#" data-toggle="modal" data-target="#modal-1" >
                                            Ir Aqui
                                        </button> 
                                    </center>
                       
                                </div>

                                <p></p> <!--puede ir algo mas escrito aqui -->
                            </div>

                        </div>

                    </div> <!-- Fin Sliding Div-->

                    <?php 
                    $cont++;
                    
                }  // fin if filtro dentro de foreach
            } // fin foreach recintos
            ?>
            



            <ul id="portfolio-grid" class="thumbnails row">
                <?php
                $cont = 0;
                foreach ($vectorLocales as $key) {   
                        $nombre = $key->getNombre();
                        $pos = strripos($nombre, $search);
                        $descripcion = $key -> getDescripcion();
                        $pos2 = strripos($descripcion, $search);
                        $idLocal = $key->getIdLocal();
                        if ($pos !== false  ||   $pos2!==false  )  {  
                    ?>
                <li class="span4 mix web">
                <div class="thumbnail">
                    <img src="images/locales/<?php echo $key->getRutaFotografia();?>" height='640' width='400' alt="project 1">
                    <a href="#single-project" class="more show_hide" rel="#slidingDiv<?php echo $cont?>">
                        <i class="icon-plus"></i>
                    </a>
                    <h3> <?php echo "$nombre" ?> </h3>
                    <p><?php echo $key->getDescripcion(); ?></p>
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


<div class="container">
  <div class="modal fade" id="modal-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Define la información del encuentro</h3>
        </div>
        <div class="modal-body">
          <form  method="post" action="nuevoTercerTiempo.php" class="design-form" >
            <div class="container">  
              <div class="row">
                <div class="col-sm-8">
                  <div class="form-group">
                    <label class="label-partido" for="hora">Hora <i class="fa fa-clock-o" aria-hidden="true"></i></label>
                    <input type="time" name="hora" placeholder="Hora del encuentro" class="form-control partido" required="required">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <div class="form-group">
                    <label class="label-partido" for="descripcion">Comentarios adicionales <i class="fa fa-comments-o" aria-hidden="true"></i></label>
                    <input type="textarea" name="descripcion" placeholder="Aqui escribe comentarios acerca del encuentro (Ejemplo: Cuota personal)" 
                    class="form-control partido" required="required">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <div class="form-group">
                    <button type="submit" class="btn-submit" >Siguiente</button>
                  </div>
                </div>
              </div>
            </div>
          </form>   
        </div>
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>
















  



 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquerypp.custom.js"></script>
    <script type="text/javascript" src="js/jquery.elastislide.js"></script>
    <script type="text/javascript">
      
      $( '#carousel' ).elastislide();
      
    </script>


  
<!-- /Aqui termina la pagina -->



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