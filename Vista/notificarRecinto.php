<?php 
include('header.php');
?>



<!-- Aqui empieza la pagina -->

  
 

    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center">
            <h2>Notifica un recinto</h2>
            <p>¿Tu recinto favorito no está en MatchDay? ¿Qué esperas? Notificanos tu cancha favorita para que todos los jugadores de MatchDay deseen hacer goles en ella.</p>
            <h4>Paso 1: Completa el siguiente formulario</h4>
          </div>
        </div>
          <div class="row">
            <div class="col-sm-12 col-sm-offset-3 centered">
              <form  method="post" action="procesarNotificacion.php" class="design-form col-sm-offset-3 centered" >

                <div class="row">
                  <div class="col-sm-6 col-sm-offset-3 centered">
                    <div class="form-group">
                      <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required="required">
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-sm-6 col-sm-offset-3 centered">
                    <div class="form-group">
                     <select class="form-control" name="tipo" id="tipo" value="">
                        <option>Baby-fútbol</option>
                        <option>Futbolito</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6 col-sm-offset-3 centered">
                    <div class="form-group">
                      <select class="form-control" name="superficie" id="superficie" value="">
                        <option>Pasto sintético</option>
                        <option>Cerámica</option>
                        <option>Tierra</option>
                        <option>Cemento</option>
                        <option>Piso flotante</option>
                        <option>Piso sintético poliuretano</option>
                      </select>
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-sm-6 col-sm-offset-3 centered">
                    <div class="form-group">
                      <input type="text" name="precio" id="precio" class="form-control" placeholder="Precio" required="required">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6 col-sm-offset-3 centered">
                    <div class="form-group">
                      <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono" >
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6 col-sm-offset-3 centered">
                    <div class="form-group">
                      <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección" >
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6 col-sm-offset-3 centered">
                    <div class="form-group">
                      <input type="text" name="horario" id="horario" class="form-control" placeholder="Horario" >
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6 col-sm-offset-3 centered">
                    <div class="form-group">
                      <input type="text" name="canchas" id="canchas" class="form-control" placeholder="Canchas" >
                    </div>
                  </div>
                </div>

                

                <div class="row">
                  <div class="col-sm-6 col-sm-offset-3 centered">
                  <button type="submit" class="btn-submit">Siguiente</button>
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