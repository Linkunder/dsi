<!DOCTYPE html>
<html lang="en">
<?php
//Aplicamos session_start() para las variables de sesion


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

    <!--Para subir la imagen-->

  <link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->
  
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="images/soccer.ico">
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
                  <li><a href="contactos.php">Contactos</a></li>
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