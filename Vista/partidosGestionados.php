<?php 



$_SESSION['idRecinto']=NULL;


if(isset($_GET["jugar"]) ){
    $jugar=$_GET["jugar"];
    }else{
      $jugar=0;
    }

//Comprobamos que el usuario registrado siempre vea el header jugador
    $sesion= session_start();
    if(isset($_SESSION['user'])){
        include('headerJugador.php');
    }else{
        include('header.php'); 
    }

// 1. Listar partidos estado = agendado pendiente.
include_once('../TO/Partido.php');
include_once('../Logica/controlPartidos.php');

include_once('../TO/Equipo.php');
include_once('../Logica/controlEquipos.php');

include_once('../TO/Recinto.php');
include_once('../Logica/controlRecintos.php');

include_once('../TO/Usuario.php');
include_once('../Logica/controlUsuarios.php');



$controlPartido = controlPartidos::obtenerInstancia();
$controlEquipo = controlEquipos::obtenerInstancia();
$controlRecinto = controlRecintos::obtenerInstancia();
$controlUsuario = controlUsuarios::obtenerInstancia();


$partidosDisponibles = $controlPartido->obtenerPartidosCapitan2($_SESSION['idUsuario']);




?>

<!-- Portfolio section start -->
<!--link rel="stylesheet" type="text/css" href="css/bootstrap.css" /-->
<link href="css/profile.css" rel="stylesheet">

<div class="section secondary-section" id="contact-us">

<?php
if(isset($_GET["s"])){
  $accion = $_GET["s"];
  if ($accion == 0){ 
    ?>
    <div class="alert alert-error alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>error! </strong>No se ha cancelado el partido, no cumple con los requisitos minimos.
    </div>
    <?php
    } 
    if ($accion > 0) {
        ?>
        <div class="alert alert-info alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Listo! </strong>Se ha cancelado el partido.
    </div>
        <?php
    }
}
?>




    <div class="container">
        <div class="title">
            <h2>Tus Partidos</h2>
            <h4>Puedes ver y gestionar tus partidos.</h4>
        </div>
        <div id="single-project">
            <table class="table table-striped table-hover"> 
                <tr id="color-encabezado">
                    <th>Recinto</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                   
                </tr>
                    <?php
                    if($partidosDisponibles!=NULL){
                    foreach ($partidosDisponibles as $key) {
                        ?>
                <tr class="estilo-bloques">
<?php
                        // Aqui estoy recorriendo un partido, ahora la consulta es: ¿Tiene solicitudes?
                        // Obtengo el id
                        $idPartido = $key->getIdPartido();
                        // Busco solicitues
                        
                        // Si tiene solicitudes, muestro los datos del partido, si no, voy al siguiente partido disponible.
                     
                        
                        ?>
                        <td>
                            <?php 
                            // Hay que traer el nombre del recinto de este partido
                            $idRecinto = $key->getIdRecinto();
                            $nombreRecinto = $controlRecinto->obtenerNombre($idRecinto);
                            echo $nombreRecinto;
                            ?>
                        </td>
                        <td><?php echo $key->getFecha()?></td>
                        <td><?php echo $key->getHora()?></td>

                        
                       
  
                        <td></td>

                        <td align="center">
                            <a href="verPartido2.php?idPartido=<?php echo $idPartido?>">
                                <button class="btn btn-sm btn-success">Ver <i class="fa fa-check"></i></button>
                            </a>
                        </td>
                        <td align="center">
                            <a href="../Logica/eliminarPartido.php?idPartido=<?php echo $idPartido?>">
                                <button class="btn btn-sm btn-danger">Cancelar <i class="fa fa-times"></i></button>
                            </a>
                        </td>
                </tr>
                    <?php
                    
                    }?>
                       
              <?php  }else{ ?>

                <div class="alert alert-error alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>ups! </strong>No tienes partidos para gestionar, agenda uno 
    </div>

              <?php }




                    ?>


            </table>
        </div>
    </div>
</div>
<!-- Portfolio section end -->



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

