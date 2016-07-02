<!DOCTYPE html>
<html lang="en">
<?php
    
  if(!isset($sesion)){
    session_start();
  }
   
    if($_SESSION["sesion"]!="jugador") {
      header("Location:../Vista/inicio.php?inicio=falloJugador"); 
    }

/////Usuario de prueba//////

    $user= $_SESSION['user'];
    $idUsuario= $_SESSION['idUsuario'];
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
            <li class="<?php echo ($page_name=='inicioJugador.php')?'active':'';?>"><a href="inicioJugador.php">Inicio</a></li>
            <li class="<?php echo ($page_name=='recintos.php')?'active':'';?>"><a href="recintos.php">Canchas</a></li>
            <li class="<?php echo ($page_name=='recintos.php?jugar=1')?'active':'';?>"><a href="recintos.php?jugar=1">Jugar</a></li> <!--Jugar = 1 para entrar a buscar recintos en el mismo reutilizando-->
            <li class="<?php echo ($page_name=='comentar.php')?'active':'';?>"><a href="comentar.php">Comentar</a></li>
            <ul class="nav pull-left">
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user ?><i class="icon-cog"></i>
                <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="perfil.php">Mi Perfil</a></li>
                  <hr></hr>
                  <li><a href="contactos2.php">Contactos</a></li>
                  <hr></hr>
                  <li><a href="notificarRecinto.php">Notificar recinto</a></li>
                  <hr></hr>
                   <li><a href="../Logica/controlSesion.php?tipo=salir">Cerrar Sesion</a></li>
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

<?php
include_once('../TO/Usuario.php');
include_once('../Logica/controlUsuarios.php');

include_once('../TO/ListaContactos.php');
include_once('../Logica/controlContactos.php');

$jefeUsuario = controlUsuarios::obtenerInstancia();
$vectorUsuarios=$jefeUsuario->obtenerUsuarios();

$jefeContacto = controlContactos::obtenerInstancia();

?>

<!-- Aqui empieza la pagina -->
<div class="row">
  <div id="contact-us" class="parallax">
<div class="container demo-1">
  <div class="heading-a text-center">
    <h2>Mis contactos</h2>
  </div>

  <?php
  /* Aqui debo capturar el id del jugador que este en la sesion. */
  $idUsuario = 1;
  $vectorContactos = $jefeContacto->leerContactosUsuario($idUsuario);
 ?>
  <div class="main">
      <ul id="carousel" class="elastislide-list">
       <?php
       foreach ($vectorContactos as $key) {
        ?>
        <!-- Deben ser imagenes chicas .. al subirlas se podrian redimensionar. -->
        <li>
            <table>
              <tr>
                <td><img class="resize" src="images/usuarios/<?php echo $key->getRutaFotografia(); ?>" alt="image01" /></td>
              </tr>
              <tr>
                <td><h4 id="detalle-jugador"><?php echo $key->getNombre()." ".$key->getApellido();?></h4></td>
              </tr>
              <tr>
                <td><h6 id="detalle-jugador"><?php echo $key->getNickname();?></h6></td>
              </tr>
              
            </table>
          <!--a href="#"><img src="images/usuarios/<?php echo $key->getRutaFotografia(); ?>" alt="image01" /></a> -->
        </li>
        <?php
        }
        ?>
      </ul> <!-- End Elastislide Carousel -->
        <div class="col-sm-6">
          <button class="btn-submit" href="#" data-toggle="modal" data-target="#modal-1" >Añadir contacto </button> 
        </div>
    </div>

    
    </div>

  </div>  
</div>

  <div class="container">
    
    <div class="modal fade" id="modal-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title">Búsqueda de jugadores</h3>
           </div>
           <div class="modal-body">


            <form action="busquedaJugador.php" method="get">
              <input type="text" class="form-control partido" placeholder="Ingresa un nickname..." name="search"/>
              <div class="row">
                 <div class="col-md-6 col-md-offset-4">
                <div class="div-btn-a">
                <button class="btn-busqueda" type="submit">Buscar</button>  
                </div>
                </div>
              </div>          
            </form>
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
              <hr/>
              <?php }
                        foreach ($vectorUsuarios as $key) {
                          $nickname= $key->getNickname();
                          $pos = strripos($nickname, $search);
                          $nombre = $key->getNombre();
                          $apellido = $key->getApellido();
                          $idUsuario = $key->getIdUsuario();
                          if ($pos !== false ){ ?><div class="col-sm-6">
              <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="folio-image">
                  <img class="img-responsive" src="images/usuarios/<?php echo  $key->getRutaFotografia(); ?>" alt="">
                </div>
                <div class="overlay">
                  <div class="overlay-content">
                    <div class="overlay-text">
                      <div class="folio-info">
                          <h3>Añadir a <?php echo $nickname?></h3>
                          <p><?php echo $nombre?> <?php echo $apellido?></p>
                      </div>
                      <div class="folio-overview">
                     

                         <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="agregarContacto.php?id_contacto=<?php echo $idUsuario ?>" ><i class="fa fa-plus"></i></a></span>
                       
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

           <div class="modal-footer">
       
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