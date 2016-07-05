<?php include('header.php'); ?>

<!-- Aqui empieza la pagina -->



<div id="contact-us-inicio" class="parallax">
<?php
  
  if(isset($_GET["inicio"])){
    $inicio=$_GET["inicio"];
    if($inicio=="fallido"){


    ?>
    <div class="container">
  <div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error</strong> No has podido iniciar sesión, vuelve a intentarlo
  </div>
</div>
  <?php 
    }if($inicio =="falloAdmin"){?>

    <div class="container">
  <div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error</strong> Debes loguearte como administrador para ingresar a esta seccion
  </div>
</div>

    <?php } ?>
  <?php 
    if($inicio =="falloJugador"){?>

    <div class="container">
  <div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error</strong> Debes loguearte como Jugador para ingresar a esta seccion
  </div>
  </div>
  <?php
        }

    if($inicio =="salir"){?>

    <div class="container">
  <div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Listo!</strong> Te has deconectado del sistema.
  </div>
</div>
<?php
      }
    }
  ?>

<?php
if(isset($_GET["accion"])){
  $accion = $_GET["accion"];  
  ?>
  <div class="container">
  <div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <?php
    if ($accion == "empezar"){ ?>
   <strong>Listo! </strong>Ya puedes iniciar sesión en MatchDay.
   <?php } 
   ?>
 </div>
 </div>
<?php
}
?>




  <div class="container">
    <div class="row">
      <div class="heading-a text-center">
        <h1>MatchDay</h1>
        <h2>Sitio en construcción</h2>
      </div>
      <br/> <br/> <br/> <br/> <br/>
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