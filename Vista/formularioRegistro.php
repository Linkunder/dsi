<!DOCTYPE html>
<html lang="en">
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
            <li class="scroll active"><a href="#home">Inicio</a></li>
            <li class="scroll"><a href="#services">¿Quienes somos?</a></li> 
            <li class="scroll"><a href="#about-us">Canchas</a></li>
            <ul class="nav pull-right">
              <li class="dropdown" id="menuLogin">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Ingresar</a>
                <div class="dropdown-menu" style="padding:2em;">
                  <form class="form" id="formLogin" action="inicioJugador.php" method="post">
                    <label class="design-label">¿TIENES CUENTA?</label>
                    <input name="username" id="username" type="text" placeholder="Nickname o mail"> 
                    <input name="password" id="password" type="password" placeholder="Password"><br>
                    <button type="submit" class="design-button">INICIAR SESION</button>
                  </form>
                   <form class="form" id="formLogin" action="formularioRegistro.php" method="post">
                    <li role="separator" class="divider"></li>
                    <label class="design-label">¿ERES NUEVO EN MATCH DAY?</label>
                    <button type="submit" class="design-button">REGISTRATE</button>
                  </form>
                </div>
              </li>
            </ul>
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->

  </header><!--/#home-->


<!-- Aqui empieza la pagina -->


    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center">
            <h2>Únete a MatchDay</h2>
            <p>En MatchDay, podrás agendar tus partidos, comentar tus canchas favoritas y agendar un tercer tiempo con tus amigos.</p>
            <h4>Paso 1: Completa el siguiente formulario</h4>
          </div>
        </div>
          <div class="row">
            <div class="col-sm-12">
              <form  method="post" action="nuevoUsuario.php" class="design-form" >

                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <input type="text" name="nombre" class="form-control" placeholder="Nombre" required="required">
                    </div>
                  </div>
                

                  <div class="col-sm-3">
                    <div class="form-group">
                      <input type="text" name="apellido" class="form-control" placeholder="Apellido" required="required">
                    </div>
                  </div>
                  </div>

                  <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="nickname" class="form-control" placeholder="Nickname" required="required">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="date" name="fecha" class="form-control" placeholder="Fecha de nacimiento" required="required">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="mail" name="mail" class="form-control" placeholder="Email" required="required">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="number" name="telefono" class="form-control" placeholder="Telefono" >
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="sexo" class="form-control" placeholder="Sexo" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6  ">

                    <form enctype="multipart/form-data">
                      <div class="form-group">
                          <input name="foto" id="file-1" type="file" class="file" multiple=true data-preview-file-type="any">
                        <button type="submit" class="btn-submit">Siguiente</button>
                      </div>
                    </form>


                    </div>
                </div>

             
              </form>   

            </div>
          </div>
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

</body>
</html>