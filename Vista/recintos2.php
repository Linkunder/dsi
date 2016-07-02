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
        <!-- Portfolio section start -->
        <!--link rel="stylesheet" type="text/css" href="css/bootstrap.css" /-->
        <div class="section secondary-section" id="contact-us">
            <div class="container">
                <div class="title">
                    <?php 
                    if($jugar==1){  
                    ?>
                    <h2>Elige la cancha para el partido<h2>
                    <?php    
                    } else {
                    ?>
                    <h2>Busca tu cancha ideal</h2>
                    <?php           
                    }?>
                </div>

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form action="recintos2.php" method="get">
                            <input type="text" class="form-control" placeholder="Busca tu cancha..." name="search"/>
                            <!--Aqui como se "recarga" debemos seguir manteniendo la "seleccion de cancha"-->
                            <?php 
                            if($jugar==1){
                            ?>
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
                    </div><!-- /.col-lg-6 -->
                </div>


                <?php
                    $search = '';
                    $cont = 0;
                    if (isset($_GET['search'])) {
                      $search = $_GET['search'];
                    }
                    if ($search!=''){  // if search

                        // AHORA VIENEN LOS RESULTADOS
                        ?>
                <h3>Resultados</h3>

                <ul class="nav nav-pills">
                    <li class="filter" data-filter="photo"></li>
                    <li class="filter" data-filter="identity"></li>
                </ul>
                <div id="single-project">
                    <?php
                    } // fin if search
                    foreach ($vectorRecintos as $key) {   // foreach recintos
                        if($key->getIdEstado() == 1){
                        $nombre = $key->getNombre();
                        $pos = strripos($nombre, $search);
                        $tipo = $key -> getTipo();
                        $pos2 = strripos($tipo, $search);
                        $superficie = $key->getSuperficie();
                        $pos3 = strripos($superficie, $search);
                        $idRecinto = $key->getIdRecinto();
                        if ($pos !== false  ||   $pos2!==false  || $pos3!==false )  {  // if filtro dentro de foreach recintos
                            
                    ?>



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
                                <iframe
                                  width="600"   height="500"  frameborder="5" style="border:0"  maptype="satellite"
                                  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDR2WyVnnd9GsSTKys5OEkowPu41kMpEUs
                                    &q=Chile + Chillan + <?php echo $key->getDireccion();?>" allowfullscreen>
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
                                        <span>Precio</span><?php echo $key->getPrecio();?>
                                    </div>
                                    <div>
                                        <span>Telefono</span><?php echo $key->getTelefono();?>
                                    </div>
                                    <div>
                                        <span>Direccion</span><?php echo $key->getDireccion();?>
                                    </div>
                                    <div>
                                        <span>Horario</span><?php echo $key->getHorario();?>
                                    </div>
                                    <div>
                                        <span>Superficie</span><?php echo $key->getSuperficie();?>
                                    </div>
                                    
                                    <br/>
                                    <?php 
                                    $_SESSION["idRecinto"]=$idRecinto;
                                    //if($jugar==1){ ?>
                                    <center>
                                        <button class="btn-busqueda" href="#" data-toggle="modal" data-target="#modal-1" >
                                            Jugar Aqui
                                        </button> 
                                    </center>
                                    <?//php } ?>
                                </div>

                                <p></p> <!--puede ir algo mas escrito aqui -->
                            </div>

                        </div>
                    </div> <!-- Fin Sliding Div-->

                    <?php 
                    $cont++;
                    }
                }  // fin if filtro dentro de foreach
            } // fin foreach recintos
            ?>

            <!-- COMENTARIOS -->















            <!-- / FIN COMENTARIOS -->


            <ul id="portfolio-grid" class="thumbnails row">
                <?php
                $cont = 0;
                foreach ($vectorRecintos as $key) {   // foreach recintos
                    $nombre = $key->getNombre();
                    $pos = strripos($nombre, $search);
                    $tipo = $key -> getTipo();
                    $pos2 = strripos($tipo, $search);
                    $superficie = $key->getSuperficie();
                    $pos3 = strripos($superficie, $search);
                    $idRecinto = $key->getIdRecinto();
                    if ($pos !== false  ||   $pos2!==false  || $pos3!==false )  {  // if filtro dentro de foreach recintos            
                    ?>
                <li class="span4 mix web">
                <div class="thumbnail">
                    <img src="images/recintos/<?php echo $key->getRutaFotografia();?>" height='640' width='400' alt="project 1">
                    <a href="#single-project" class="more show_hide" rel="#slidingDiv<?php echo $cont?>">
                        <i class="icon-plus"></i>
                    </a>
                    <h3> <?php echo "$nombre" ?> </h3>
                    <p>Cancha de <?php echo $key->getTipo(); ?></p>
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
</div>
        <!-- Portfolio section end -->


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
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label class="label-partido" for="fecha">Fecha del partido</label>
                                        <input type="date" name="fecha" placeholder="Fecha del partido" class="form-control partido" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label class="label-partido" for="hora">Hora</label>
                                        <input type="time" name="hora" placeholder="Hora" class="form-control partido" required="required" min="09:00:00" max="23:00:00">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label class="label-partido" for="jugadores">Numero de jugadores</label>
                                        <input type="int" name="cantidad"  class="form-control partido" required="required" title="Solo puede ingresar hasta 22 jugadores" pattern="^[0|1]\d{1}$|[0-9]|2+[0|1|2]">
                                        <input  name="idRecinto" class="hide" value="<?php echo $_SESSION['idRecinto'];?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label class="label-partido" for="color">Color</label>
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
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>


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



    
        <!-- ScrollUp button end -->
        <!-- Include javascript -->
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.mixitup.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="js/jquery.cslider.js"></script>
        <script type="text/javascript" src="js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="js/jquery.inview.js"></script>

        <!-- css3-mediaqueries.js for IE8 or older -->
        <!--[if lt IE 9]>
            <script src="js/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="js/app.js"></script>



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


    </body>
</html>