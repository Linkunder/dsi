<?php

include_once('../TO/Recinto.php');
include_once('../Logica/controlRecintos.php');

$jefeRecinto = controlRecintos::obtenerInstancia();
$idRecinto = $_GET['id_recinto'];
?>

<div id="single-portfolio">
	<div id="portfolio-details" class="container">
		<a class="close-folio-item" href="#"><i class="fa fa-times"></i></a>
<?php 
    $vectorRecintos=$jefeRecinto->leerRecinto($idRecinto);
    foreach ($vectorRecintos as $key ) { ?>
<div class="row">
<div class="col-sm-6">
   <iframe
    width="100%" height="400px" frameborder="5" style="border:0"  maptype="satellite"
    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDR2WyVnnd9GsSTKys5OEkowPu41kMpEUs
    &q=Chile  + Chillan + <?php echo $key->getDireccion();?>" allowfullscreen>
  </iframe>
</div>
<div class="col-sm-6">
  <div class="project-details">
    
        
        <h3>Cancha <?php echo $key->getNombre(); ?></h3>
        <p><span>Tipo de cancha: </span><?php echo $key->getTipo(); ?></p>
        <p><span>Superficie: </span><?php echo $key->getSuperficie(); ?></p>
        <p><span>Precio: </span><?php echo $key->getPrecio(); ?></p>
        <p><span>Dirección: </span><?php echo $key->getDireccion(); ?></p>
        <p><span>Horario: </span><?php echo $key->getHorario(); ?></p>
        <p><span>Canchas: </span><?php echo $key->getCantidadCanchas(); ?></p>
        <p><span>Teléfono: </span><?php echo $key->getTelefono(); ?></p>
        <?php 
    }
    ?>
  </div>
</div>
</div>


</div>
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
