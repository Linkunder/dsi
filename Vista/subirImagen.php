<?php 
if(isset($_GET['idUsuario'])){
  include('headerJugador.php');
}else{
  include('header.php');
}

?>



<!-- Aqui empieza la pagina -->


<?php
include_once('../TO/Usuario.php');
include_once('../Logica/controlUsuarios.php');

$jefeUsuario = controlUsuarios::obtenerInstancia();
$vectorUsuarios = $jefeUsuario->obtenerUsuarios();
$ultimoUsuario = end($vectorUsuarios);

?>


<div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center">
            <h2>Ya casi terminas</h2>
            <h4>Paso 2: Sube una foto de perfil</h4>
          </div>
        </div>

          <div class="row">
            <div class="col-sm-12 ">
              <form  method="post" action="upload.php" class="design-form" enctype="multipart/form-data" >


                <!-- Subir imagen -->
                <div class="row">
                  <div class="col-sm-12">
                      <!--<input type="file" name="fileToUpload" id="fileToUpload" size = "50" maxlengtg="50" autofocus required> -->
                       <input name="fileToUpload" id="fileToUpload"  class="file" type="file" multiple data-min-file-count="1">
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