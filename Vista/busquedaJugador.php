<?php include('header.php'); 

include_once('../TO/Usuario.php');
include_once('../Logica/controlUsuarios.php');

$jefeUsuario = controlUsuarios::obtenerInstancia();
$vectorUsuarios=$jefeUsuario->obtenerUsuarios();

?>

<!-- Aqui empieza la pagina -->
<div class="row">
  <div id="contact-us" class="parallax">
    <div class="container">
      <div class="row">
        <div class="heading-a text-center">
          <h2>Busqueda de jugadores</h2>
        </div>
      </div>

      <!--
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Busca tu recinto deportivo...">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="button">Buscar!</button>
            </span>
          </div>
        </div>
      </div>
      <hr/> -->

      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <!--div class="input-group"-->
            <form action="busquedaJugador.php" method="get">
              <input type="text" class="form-control" placeholder="Ingresa un nickname..." name="search"/>
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
        <div class="container">
          <div class="row">
          </div> 
        </div>
       
        <div class="container-fluid">

          <div class="row">
             <?php }
                        foreach ($vectorUsuarios as $key) {
                          $nickname= $key->getNickname();
                          $pos = strripos($nickname, $search);
                          $nombre = $key->getNombre();
                          $apellido = $key->getApellido();
                          $idUsuario = $key->getIdUsuario();
                          if ($pos !== false ){ ?>
            <div class="col-sm-3">
              <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="folio-image">
                  <img class="img-responsive" src="images/usuarios/<?php echo  $key->getRutaFotografia(); ?>" alt="">
                </div>
                <div class="overlay">
                  <div class="overlay-content">
                    <div class="overlay-text">
                      <div class="folio-info">
                          <h3><?php echo $nickname?></h3>
                          <p><?php echo $nombre?> <?php echo $apellido?></p>
                      </div>
                      <div class="folio-overview">
                        <!--


                         <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="detalleRecinto.php?id_recinto=<?php echo $idRecinto ?>" ><i class="fa fa-info"></i></a></span>
                        <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="detalleRecinto.php?id_recinto=<?php echo $idRecinto ?>" ><i class="fa fa-info"></i></a></span>
                     
                          -->
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

            <!--
            <div class="col-sm-3">
              <div class="folio-item wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="400ms">
                <div class="folio-image">
                  <img class="img-responsive" src="images/portfolio/2.jpg" alt="">
                </div>
                <div class="overlay">
                  <div class="overlay-content">
                    <div class="overlay-text">
                      <div class="folio-info">
                        <h3>Time Hours</h3>
                        <p>Design, Photography</p>
                      </div>
                      <div class="folio-overview">
                        <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                        <span class="folio-expand"><a href="images/portfolio/portfolio-details.jpg" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          -->
      
          </div>
        </div>
        <div id="portfolio-single-wrap">
          <div id="portfolio-single">
          </div>
        </div><!-- /#portfolio-single-wrap -->
      </section><!--/#portfolio-->




    
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