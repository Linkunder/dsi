<!DOCTYPE html>
<html lang="en">
<?php
session_start();


/////Usuario de prueba//////

$_SESSION['user']="Carrasco";
$_SESSION['idUsuario']="1";
///////////////////////////////

?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>MatchDay | A jugar!</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet"> 
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/lightbox.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">


  <link rel="stylesheet" type="text/css" href="css/demo.css" />
  <link rel="stylesheet" type="text/css" href="css/elastislide.css" />
  <link rel="stylesheet" type="text/css" href="css/custom.css" />




    <!--Para subir la imagen-->

  <link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->
  
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="images/soccer.ico">


  <script src="js/modernizr.custom.17475.js"></script>
</head><!--/head-->

<body>

  <!-- Inicio Header -->

  <header id="home">
    <div class="main-nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">
            <h1><img class="img-responsive" src="images/logo.png" alt="logo"></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">                 
            <li class="scroll active"><a href="inicio.php">Inicio</a></li>
            <li class="scroll"><a href="quienesSomos.php">¿Quienes somos?</a></li> 
            <li class="scroll"><a href="recintos.php">Canchas</a></li>
            <li class="scroll"><a href="recintos.php?jugar=1">Jugar</a></li> <!--Jugar = 1 para entrar a buscar recintos en el mismo reutilizando-->
            <li class="scroll"><a href="comentar.php">Comentar</a></li>
            <ul class="nav pull-left">
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user']?><i class="icon-cog"></i>
                <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="perfil.php">Mi Perfil</a></li>
                  <hr></hr>
                  <li><a href="contactos2.php">Contactos</a></li>
                  <hr></hr>
                  <li><a href="notificarRecinto.php">Notificar recinto</a></li>
                  <hr></hr>
                   <li><a href="../../LOGICA/salirJugador.php">Cerrar Sesion</a></li>
                   <li></li>
                </ul>
              </li>
            </ul>
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->


  </div>
  </header><!-- /Fin Header -->

<!--Variables -->
<?php

$idPartido= $_SESSION["idPartido"];
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

$jefeEquipo = controlEquipos::obtenerInstancia();
$jefeUsuarios = controlUsuarios::obtenerInstancia();
$jefeRecintos = controlRecintos::obtenerInstancia();

$vectorUsuarios = $jefeUsuarios->leerUsuario($idUsuario);
$vectorRecintos = $jefeRecintos->leerRecinto($idRecinto);


?>



<!---->



<!-- Aqui empieza la pagina -->
<div id="contact-nosotros" class="parallax">
  <div class="container">
    <div class="row">
      <h2>Resumen del partido</h2>
      <div class="col-md-4">
        <h4>Información</h4>
        <table>
          <tr>
            <td>Organizador:&nbsp;</td>
            <?php
            foreach ($vectorUsuarios as $key ) {
            ?>
            <td><?php echo $key->getNombre()." ".$key->getApellido();?></td>
            <?php
            }
            ?>
          </tr>
          <tr>
            <td>Jugadores:&nbsp;</td>
            <td><?php echo $cantidad;?></td>
          </tr>
          <tr>
            <td>Fecha:&nbsp;</td>
            <td><?php echo $fecha;?></td>
          </tr>
          <tr>
            <td>Hora:&nbsp;</td>
            <td><?php echo $hora;?></td>
          </tr>
        </table>
      </div>
      <div class="col-md-4">
        <?php
            foreach ($vectorRecintos as $key ) {
            ?>
            <h4>Cancha: <?php echo $key->getNombre();?></h4>
            <div class="folio-image">
                  <img class="img-responsive" src="images/recintos/<?php echo  $key->getRutaFotografia(); ?>" alt="">
                </div>
           
      </div>
      <div class="col-md-4">
        <h4>¿Cómo llegar?</h4>
        <iframe
          width="100%" height="400px" frameborder="5" style="border:0"  maptype="satellite"
          src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDR2WyVnnd9GsSTKys5OEkowPu41kMpEUs
          &q=Chile  + Chillan + <?php echo $key->getDireccion();?>" allowfullscreen>
  </iframe>
   <?php
            }
            ?>
      </div>
     

    </div>


    <div class="row">
      <div class="container demo-1">
        <div class="heading-a text-center">
            <h2>Jugadores</h2>
          </div>

        <?php
        /* Aqui debo capturar el id del partido que se jugara */
        $vectorEquipo = $jefeEquipo->obtenerJugadores($idPartido);
       ?>
  <div class="main">
      <ul id="carousel" class="elastislide-list">
       <?php
       foreach ($vectorEquipo as $key) {
        ?>
        <!-- Deben ser imagenes chicas .. al subirlas se podrian redimensionar. -->
        <li>
            <table>
              <tr>
                <td><img src="images/usuarios/<?php echo $key->getRutaFotografia(); ?>" alt="image01" /></td>
              </tr>
              <tr>
                <td><h4 id="detalle-jugador"><?php echo $key->getNombre()." ".$key->getApellido();?></h4></td>
              </tr>
             
              
            </table>
          <!--a href="#"><img src="images/usuarios/<?php echo $key->getRutaFotografia(); ?>" alt="image01" /></a> -->
        </li>
        <?php
        }
        ?>
      </ul> <!-- End Elastislide Carousel -->
    </div>

    
    </div>

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