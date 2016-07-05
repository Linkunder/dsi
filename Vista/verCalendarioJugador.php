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

  <!--link rel="stylesheet" type="text/css" href="css/bootstrap.css" /-->
  <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/pluton.css" />
  <link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
  <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
  <link rel="stylesheet" type="text/css" href="css/animate.css" />
  <!--CARUSEL
  <link rel="stylesheet" type="text/css" href="css/demo.css" />
  <link rel="stylesheet" type="text/css" href="css/elastislide.css" />
  <link rel="stylesheet" type="text/css" href="css/custom.css" />
  <script src="js/modernizr.custom.17475.js"></script>
  -->

    <!--Para subir la imagen-->
  <link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->
  
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="images/soccer.ico">


</head><!--/head-->

    <?php
        $full_name = $_SERVER['PHP_SELF'];
        $name_array = explode('/',$full_name);
        $count = count($name_array);
        $page_name = $name_array[$count-1];
    ?>

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
            <ul class="nav pull-left">
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user ?> <i class="fa fa-user"></i>
                <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="perfil.php">Mi Perfil</a></li>
                  <hr>
                  <li><a href="contactos2.php">Contactos</a></li>
                  <hr>
                  <li><a href="notificarRecinto.php">Notificar recinto</a></li>
                  <hr>
                   <li><a href="../Logica/controlSesion.php?tipo=salir">Cerrar Sesion</a></li>
                   <li></li>
                </ul>
              </li>
            </ul>
            <ul class="nav pull-left">
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Partidos <i class="fa fa-flag" aria-hidden="true"></i>
                <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <?php
                  include_once('../TO/Partido.php');
                  include_once('../Logica/controlPartidos.php');

                  $controlPartido = controlPartidos::obtenerInstancia();
                  $partidosCapitan = $controlPartido->contarPartidosCapitan($idUsuario);


                  ?>
                  <li><a href="partidosPendientes.php">Partidos pendientes: <?php echo $partidosCapitan?></a></li>
                  <hr/>
                  
                  
                  <?php
                  include_once('../TO/Partido.php');
                  include_once('../Logica/controlPartidos.php');

                  $controlPartido = controlPartidos::obtenerInstancia();
                  $partidosDisponibles = $controlPartido->contarPartidosDisponibles();



                  ?>
                  <li><a href="partidosDisponibles.php">Partidos MatchDay: <?php echo $partidosDisponibles?></a></li>
                  
                </ul>
              </li>
            </ul>
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->


  </div>
  </header><!-- /Fin Header -->

      <!--Calendario-->
<link href='css/fullcalendar.css' rel='stylesheet' />
<link href='css/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='js/moment.min.js'></script>
<script src='js/jquery.min.js'></script>
<script src='js/fullcalendar.min.js'></script>


<?php 

  include_once('../TO/Partido.php');
  include_once('../Logica/controlPartidos.php');

  $jefePartido = controlPartidos::obtenerInstancia();

  $idUsuario =  $_GET["idUsuario"];
  $vectorPartidos= $jefePartido->obtenerPartidosJugadorJS($idUsuario);
?>
<script>
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
            editable: false,
            eventLimit: true, // allow "more" link when too many events
            // Partidos
             


            events: [
            <?php foreach ($vectorPartidos as $key ) {
            ?>
                {
                    title: '<?php echo $key->getIdPartido()?>',
                    url: '<?php echo "verPartido.php?idPartido=".$key->getIdPartido()?>',
                    start: '<?php echo $key->getFecha()."T".$key->getHora();?>',
                },
                <?php }?>
            ]





        });


    
    });

</script>

<link href="css/profile.css" rel="stylesheet">
<div class="row">
  <div id="contact-us" class="parallax">

<style>


  #calendar1 {
    max-width: 800px;
    margin: 0 auto;
  }

</style>
<br/>
  <div id='calendar1' ></div>

  </div>
</div>

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

  <!--script type="text/javascript" src="js/jquery.js"></script-->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

  <script type="text/javascript" src="js/jquery.inview.min.js"></script>
  <script type="text/javascript" src="js/wow.min.js"></script>
  <script type="text/javascript" src="js/mousescroll.js"></script>
  <script type="text/javascript" src="js/smoothscroll.js"></script>
  <script type="text/javascript" src="js/jquery.countTo.js"></script>
  <script type="text/javascript" src="js/lightbox.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>

  <script src="js/fileinput.min.js" type="text/javascript"></script>

</body>
</html>