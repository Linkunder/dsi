<?php 

include('header.php'); 

include_once('../TO/Recinto.php');
include_once('../Logica/controlRecintos.php');


$jefeRecinto = controlRecintos::obtenerInstancia();
$vectorRecintos=$jefeRecinto->obtenerRecintos();


?>

<div class="section secondary-section " id="portafolio">
  <div class="container">
    <div class = "busqueda">
      <form class="form-wrapper cf" action="recintosBETA2.php" method="get">
        <input type="text" placeholder="Busca tu cancha..." name="search" required>
        <button type="submit">Buscar</button>
      </form>
      </div>

      <?php
      $search = '';
      $cont = 0;
      if (isset($_GET['search'])) {
        $search = $_GET['search'];
      }
      if ($search!=''){
        ?>

        <h3>Resultados</h3>
        <ul class="nav nav-pills">
          <li class="filter" data-filter="photo"></li>
          <li class="filter" data-filter="identity"></li>
        </ul>
        <div id="single-project">

          <?php }
          foreach ($vectorRecintos as $key) {
            $nombre = $key->getNombre();
            $pos = strripos($nombre, $search);
            if ($pos !== false )  { ?>
            <!-- Start details for portfolio project 1 -->
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
                <iframe width="600"   height="500"  frameborder="5" style="border:0"  
                maptype="satellite"
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDR2WyVnnd9GsSTKys5OEkowPu41kMpEUs&q=Chile + Chillan ?>" allowfullscreen>
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
                  <span>Nombre</span><?php echo $key->getNombre();?></div>
                </div>
                <p></p> <!--puede ir algo mas escrito aqui -->
              </div>
            </div>

            <br><br /><br ><br />

          </div>
          <!-- End details for portafolio project 1 -->
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
          if ($pos !== false ) { ?>
          <li class="span4 mix web">
            <div class="thumbnail">
              <img src="images/recintos/<?php echo $key->getImagen();?>" height='640' width='400' alt="project 1">
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