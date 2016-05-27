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
            <li class="scroll"><a href="#" data-toggle="modal" data-target="#modal-1">Jugar</a></li>
            <li class="scroll"><a href="comentar.php">Comentar</a></li>
            <ul class="nav pull-left">
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Nombre<i class="icon-cog"></i>
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

  <div class="container">
          <script src="eonasdan.github.io/bootstrap-datetimepicker/js/prettify-1.0.min.js"></script>
        <script src="eonasdan.github.io/bootstrap-datetimepicker/js/base.js"></script>

    <div class="modal fade" id="modal-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title">Empecemos a organizar tu partido</h3>
            <h4 class="modal-title">Paso 1: Define el lugar, hora, número de jugadores y el recinto deportivo</h4>
           </div>
           <div class="modal-body">

            <form  method="post" action="nuevoUsuario.php" class="design-form" >

   
          
  <div class="container">  
  <div class="row">
        <div class='col-sm-6 center'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });

        </script>
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

              </form>   
            
           </div>

           <div class="modal-footer">
            <a href="" class="btn btn-default" data-dismiss="modal">Close</a>
            <a href="" class="btn btn-primary">Download</a>
           </div>
        </div>
      </div>
    </div>
  </div>
  </header><!-- /Fin Header -->