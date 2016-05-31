<!DOCTYPE html>
<html lang="en">
<?php
session_start();


/////Usuario de prueba//////

$_SESSION['user']="Carrasco";
$_SESSION['idUsuario']="1";
///////////////////////////////

//Comprobamos que el usuario registrado siempre vea el header jugador
    if(isset($_SESSION['user'])){
        include('headerJugador.php');
    }else{
        include('header.php'); 
    }
        
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
<div class="row">
<div id="contact-us" class="parallax">
  <div class="container">
    <div class="row">
      <div class="heading-a text-center">
          <h2>Busca el lugar ideal para tu tercer tiempo<h2>
        </div>

        <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <!--div class="input-group"-->
          <form action="tercerTiempo.php" method="get">
              <input type="text" class="form-control" placeholder="Ingresa lo que buscas para tu tercer tiempo..." name="search"/>
            <!--Aqui como se "recarga" debemos seguir manteniendo la "seleccion de cancha"-->
              <div class="row">
                 <div class="col-md-6 col-md-offset-4">
                <div class="div-btn-a">
                <button class="btn-busqueda" type="submit">Buscar</button>  
                </div>
                </div>
              </div>          
            </form>
          <!--/div--><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
      </div>
      <hr/>
      <?php
      $search = '';
      $cont = 0;
      if (isset($_GET['search'])) {
        $search = $_GET['search'];
      }
      if ($search!=''){ 
        ?>
        <h3>Resultados: </h3>
      </div>
      <section id="portfolio" >
        <div class="container-fluid">
          <div class="row">
            <?php }
            foreach ($vectorLocales as $key) {
              $nombre = $key->getNombre();
              $pos = strripos($nombre, $search);
              $descripcion = $key->getDescripcion();
              $pos2 = strripos($descripcion, $search);
              $idLocal = $key->getIdLocal();
              if ($pos !== false  && $pos2 !== false)  { 
                ?>
              <div class="col-sm-3">
                <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="100ms">
                  <div class="folio-image">
                    <img class="img-responsive" src="images/locales/<?php echo  $key->getRutaFoto(); ?>" alt="">
                  </div>
                  <div class="overlay">
                    <div class="overlay-content">
                      <div class="overlay-text">
                        <div class="folio-info">
                          <h3><?php echo $nombre?></h3>
                          <p>En <?php echo $key->getDireccion();?></p>
                      </div>
                      <div class="folio-overview">
                        <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="detalleLocal.php?id_local=<?php echo $idLocal ?>"><i class="fa fa-info"></i></a></span>
                       
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php 
                $cont++;
                } 
               }
            ?>
      
          </div>
        </div>
        <div id="portfolio-single-wrap">
          <div id="portfolio-single">
          </div>
        </div><!-- /#portfolio-single-wrap -->
      </section><!--/#portfolio-->




    </div><!-- /row -->
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

  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="js/jquery.inview.min.js"></script>
  <script type="text/javascript" src="js/wow.min.js"></script>
  <script type="text/javascript" src="js/mousescroll.js"></script>
  <script type="text/javascript" src="js/smoothscroll.js"></script>
  <script type="text/javascript" src="js/jquery.countTo.js"></script>
  <script type="text/javascript" src="js/lightbox.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>

  <script src="js/fileinput.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquerypp.custom.js"></script>
    <script type="text/javascript" src="js/jquery.elastislide.js"></script>
</body>
</html>