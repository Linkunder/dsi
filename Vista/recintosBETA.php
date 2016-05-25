<?php 

include('header.php'); 

include_once('../TO/Recinto.php');
include_once('../Logica/controlRecintos.php');


$jefeRecinto = controlRecintos::obtenerInstancia();
$vectorRecintos=$jefeRecinto->obtenerRecintos();


?>

<!-- Aqui empieza la pagina -->
<div class="row">
  <div id="contact-us" class="parallax-special">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-4">
          <h1 class="titulo-center">Busca tu cancha</h1>
        </div>
      </div>

      <div class = "busqueda">
        <form class="form-wrapper cf" action="recintosBETA.php" method="get">
          <input type="text" placeholder="Busca tu cancha..." name="search" required>
          <button type="submit">Buscar</button>
        </form>
      </div>
      <!-- Sigo en el container-->
      <?php
      $search = '';
      $cont = 0;
      if (isset($_GET['search'])) {
        $search = $_GET['search'];
      }
      if ($search!=''){
        ?>

        <h3>Resultados</h3>

      <hr/>


      <ul class="nav nav-pills">
                <li class="filter" data-filter="photo"></li>
                <li class="filter" data-filter="identity"></li>
      </ul>
      <div id="single-project">

        <?php } 
                foreach ($vectorRecintos as $key) {
                    $nombre = $key->getNombre();
                    $pos = strripos($nombre, $search);

                     if ($pos !== false)  { ?>




      
       <h3> <?php echo $nombre ?></h3>

            </div>



                         


          <?php $cont++;
          } 
      }
      ?>

    <ul id="portfolio-grid" class="thumbnails row">
      <?php
      $cont = 0;
      foreach ($vectorRecintos as $key) {
        $nombre = $key->getNombre();
        $pos = strripos($nombre, $search);
        if ($pos !== false ) { 
          ?>
        <li class="span4 mix web">
          <div class="thumbnail">
            <h3> <?php echo "$nombre" ?> </h3>
            <div class="mask"></div>
          </div>
          </li>
          <?php $cont++;
        }
      }
      ?>
    </ul>



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