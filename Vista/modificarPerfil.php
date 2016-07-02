<?php 

include('headerJugador.php'); 

include_once('../TO/Usuario.php');
include_once('../Logica/controlUsuarios.php');
$controlUsuario = controlUsuarios::obtenerInstancia();

// Prueba
$idUsuario = $_GET['idUsuario'];
$user = $controlUsuario->leerUsuario($idUsuario);

?>



<!-- Aqui empieza la pagina -->

<link href="css/profile.css" rel="stylesheet">
<div class="row">
  <div id="contact-us" class="parallax">

    <div class="container">
      <div class="row profile">
        <div class="col-md-4 ">
          <div class="profile-sidebar">
            <?php
            foreach ($user as $key) {?>
          <!-- SIDEBAR USERPIC -->
            <div class="profile-userpic">
              <img src="images/usuarios/<?php echo $key->getRutaFotografia();?>" class="img-responsive" alt="">
            </div>
            <!-- SIDEBAR USER TITLE -->
            <div class="profile-usertitle">
              <div class="profile-usertitle-name">
                <?php
                  echo $key->getNombre()." ".$key->getApellido();
                
                ?>
              </div>

            </div>
            <!-- END SIDEBAR USER TITLE -->
          </div>
          <!-- END SIDEBAR USERPIC -->
        </div>

        <div class="col-md-8 ">
          <div class="profile-sidebar col-offset-6 centered">
                  <form role="form" action="procesarPerfil.php" method="post">
                      <table class="table table-form">
                        <tr>
                          <th>Usuario: </th>
                          <th><input class="profile-form-control" readonly="readonly" name="idUsuario" id="idUsuario" value="<?php echo $key->getidUsuario();?>"></th>
                        </tr>
                        <tr>
                        <tr>
                          <th>Nickname: </th>
                          <th><input class="profile-form-control" name="nickname" id="nickname" value="<?php echo $key->getNickname();?>"></th>
                        </tr>
                        <tr>
                          <tr>
                          <th>Mail: </th>
                          <th><input class="profile-form-control" name="mail" id="mail" value="<?php echo $key->getEmail();?>"></th>
                        </tr>
                        <tr>
                          <tr>
                          <th>Telefono: </th>
                          <th><input class="profile-form-control" name="fono" id="fono" value="<?php echo $key->getTelefono();?>"></th>
                        </tr>
                        <tr>
                          <tr>
                          <th>Fecha de nacimiento: </th>
                          <th><input class="profile-form-control" readonly="readonly" value="<?php echo $key->getFechaNacimiento();?>"></th>
                        </tr>
                        <tr>
                          <tr>
                          <th>Sexo: </th>
                          <th><input class="profile-form-control"  readonly="readonly" value="<?php echo $key->getSexo();?>"></th>
                        </tr>
                        <tr>
                      </table>
                        <div class="col-md-4">
                        <button type="submit" class="btn btn-lg btn-primary">Actualizar <i class="fa fa-check fa-1x"></i></button>
                        </div>
                        <div class="col-md-4">
                        <button type="reset" class="btn btn-lg btn-warning">Reiniciar <i class="fa fa-eraser fa-1x"></i></button>
                        </div>
                    <?php
                    }
                    ?>
                  </form>
                  <div class="col-md-4">
                    <a href="perfil.php"><button class="btn btn-lg btn-danger">Volver <i class="fa fa-arrow-left fa-1x"></i></button></a>
                  </div>
                  <br/><br/>
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