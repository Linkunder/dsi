<?php 
session_start();
//PARA EFECTOS DE PRUEBA
 //No se ha conectado
$_SESSION['idRecinto']=NULL;


if(isset($_GET["jugar"]) ){
    $jugar=$_GET["jugar"];
    }else{
      $jugar=0;
    }

//Comprobamos que el usuario registrado siempre vea el header jugador
    if(isset($_SESSION['user'])){
        include('headerJugador.php');
    }else{
        include('header.php'); 
    }
        

include_once('../TO/Recinto.php');
include_once('../Logica/controlRecintos.php');

$jefeRecinto = controlRecintos::obtenerInstancia();
$vectorRecintos=$jefeRecinto->obtenerRecintos();

?>

<!-- Aqui empieza la pagina -->
<div class="row">
  <div id="contact-us" class="parallax">
    <div class="container">
      <div class="row">
        <div class="heading-a text-center">
          <?php if($jugar==1){  ?>
          <h2>Elige la cancha para el partido<h2>
          <?php    }else {         ?>
          <h2>Busca tu cancha ideal</h2>
          <?php           }?>
        </div>
      </div>


      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <!--div class="input-group"-->
          <form action="recintos.php" method="get">
              <input type="text" class="form-control" placeholder="Busca tu cancha..." name="search"/>
            <!--Aqui como se "recarga" debemos seguir manteniendo la "seleccion de cancha"-->
            <?php if($jugar==1){?>
              <input  name="jugar" class="hide" value="1"/>
              <?php } ?>
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
                        foreach ($vectorRecintos as $key) {
                          $nombre = $key->getNombre();
                          $pos = strripos($nombre, $search);
                          $tipo = $key -> getTipo();
                          $pos2 = strripos($tipo, $search);
                          $superficie = $key->getSuperficie();
                          $pos3 = strripos($superficie, $search);
                          $idRecinto = $key->getIdRecinto();
                          if ($pos !== false  ||   $pos2!==false  || $pos3!==false )  { ?>
            <div class="col-sm-3">
              <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="folio-image">
                  <img class="img-responsive" src="images/recintos/<?php echo  $key->getRutaFotografia(); ?>" alt="">
                </div>
                <div class="overlay">
                  <div class="overlay-content">
                    <div class="overlay-text">
                      <div class="folio-info">
                          <h3><?php echo $nombre?></h3>
                          <p>Cancha de <?php echo $tipo?></p>
                      </div>
                      <div class="folio-overview">
                        <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="detalleRecinto.php?id_recinto=<?php echo $idRecinto ?>" ><i class="fa fa-info"></i></a></span>
                        <!--Aqui boton que aparecera solo al haber entrado via "jugar"-->
                        <?php 
                        $_SESSION["idRecinto"]=$idRecinto;
                              if($jugar==1){ ?>
                       <button class="btn-busqueda" href="#" data-toggle="modal" data-target="#modal-1" >Jugar Aqui</button> 
                        <?php } ?>
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
        <div id="portfolio-single-wrap">
          <div id="portfolio-single">
          </div>
        </div><!-- /#portfolio-single-wrap -->
      </section><!--/#portfolio-->




    
  </div>
</div>





  <div class="container">
    <div class="modal fade" id="modal-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title">Define la hora, fecha y cantidad de jugadores</h3>
           </div>
           <div class="modal-body">

            <form  method="post" action="cancha.php" class="design-form" >
       
              <div class="container">  
        <div class="row">
        <div class='col-sm-8 center'>
            <div class="form-group">
              <label for="fecha">Fecha del partido</label>
                    <input type="date" name="fecha" placeholder="Fecha del partido" class="form-control partido" required="required">

            </div>
        </div>
    </div>
  

      <div class="row">
      <div class="col-sm-8">

      <div class="form-group">
                <label for="hora">Hora</label>
                    <input type="time" name="hora" placeholder="Hora" class="form-control partido" required="required" min="09:00:00" max="23:00:00">
      </div>

      </div>
      </div>
            <div class="row">
      <div class="col-sm-8">

      <div class="form-group">
                <label for="jugadores">Numero de jugadores</label>
                    <input type="int" name="cantidad"  class="form-control partido" required="required" title="Solo puede ingresar hasta 22 jugadores" pattern="^[0|1]\d{1}$|[0-9]|2+[0|1|2]">

                     <input  name="idRecinto" class="hide" value="<?php echo $_SESSION['idRecinto'];?>"/>

      </div>

      </div>
      </div>
                 <div class="row">
      <div class="col-sm-8">

      <div class="form-group">
                <label for="color">Color</label>
                    <input type="text" name="color"  class="form-control partido" required="required">
      </div>

      </div>
      </div>
              <div class="row">
                  <div class="col-sm-8">

          
                      <div class="form-group">
  
                        <button type="submit" class="btn-submit" >Siguiente</button>

                      </div>
                


                    </div>

              </form>   
              </div>
           </div>

           <div class="modal-footer">
       
           </div>
        </div>
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