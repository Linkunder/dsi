<?php

include_once('../TO/Local.php');
include_once('../Logica/controlLocales.php');

$jefeLocales = controlLocales::obtenerInstancia();
$idLocal = $_GET['id_local'];



?>

<div id="single-portfolio">
    <div id="portfolio-details" class="container">
        <a class="close-folio-item" href="#"><i class="fa fa-times"></i></a>
        <?php 
        $vectorLocales=$jefeLocales->leerLocal($idLocal);
        foreach ($vectorLocales as $key ) { ?>
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
                    <h3><?php echo $key->getNombre(); ?></h3>
                    <p><span>Descripción: </span></p>
                    <p><span>Dirección: </span><?php echo $key->getDireccion(); ?></p>
                    <button class="btn-busqueda" href="#" data-toggle="modal" data-target="#modal-1" >Ir aquí</button> 
                    <?php 
                }
                ?>
                </div>
            </div>
     
        </div>
    </div>
</div>





<div class="container">
    <div class="modal fade" id="modal-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Define la hora del encuentro</h3>
                </div>
                <div class="modal-body">
                    <form  method="post" action="resumenPartido.php" class="design-form" >

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="hora">Hora</label>
                                    <input type="time" name="hora" placeholder="Hora" class="form-control partido" required="required" min="09:00:00" max="23:00:00">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input type="text" name="descripcion"  class="form-control partido" required="required">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button type="submit" class="btn-submit">Siguiente</button>
                                </div>
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
