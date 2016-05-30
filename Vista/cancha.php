

<?php 
session_start();
include_once('../TO/Usuario.php');
include_once('../Logica/controlUsuarios.php');
include_once('../TO/Partido.php');
include_once('../Logica/controlPartidos.php');
include_once('../TO/ListaContactos.php');
include_once('../Logica/controlContactos.php');
include_once('../TO/Recinto.php');
include_once('../Logica/controlRecintos.php');
require_once('../Logica/JSON.php');

$jefeUsuarios = controlUsuarios::obtenerInstancia();
$jefeContactos = controlContactos::obtenerInstancia();

$jefeRecintos = controlRecintos::obtenerInstancia();
$vectorRecintos = $jefeRecintos->leerRecinto($_SESSION['idRecinto']);
//Con este vector tendria los contactos a mostrar en la seleccion de jugadores
$vectorContactos = $jefeContactos->leerContactosUsuario($_SESSION['idUsuario']);

//Toda la informacion de partida la vamos a manejar via variable de session desde aqui, similiar a lo que hace un "carrito de compras jaja"

$_SESSION['fecha'] = $_POST['fecha'];
$_SESSION['hora'] = $_POST['hora'];
$_SESSION['cantidad'] = $_POST['cantidad'];
$_SESSION['color']  = $_POST['color'];
include('headerJugador.php'); 
$json = new Services_JSON();
 ?> 

  <style>
  .draggable { 
    width: 80px; height: 70px; padding:; float: left; float: ; margin: 0 10px 10px 0; font-size: 0.9em; color: white; text-align: center;
    background-color: transparent;
    border-radius: 0.3em;
  }
  .ui-widget-header p{color: black; text-align: center; margin-top: 25px; margin-right: 25px;}, .ui-widget-content p { margin-top: 25px; margin-right: 25px; color: white; text-align: center; }
  #snaptarget { height: 520px; width: 400px; float: right; color: black; text-align: center;
    background-image: url("images/cancha.jpg");
    background-size: 100%;
    padding: 0;
    margin: 0; 
    

      }
  .arreglo {
    left: 10px;
    top: 20px;
    z-index: 1;
}
.stroke {
-webkit-text-fill-color: white;
-webkit-text-stroke: 0.7px black;
font-size: 15px;
}
  </style>


  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script>
$(function(){

    $('#filter').keyup(function () {  
       
        // create a pattern to match against, in this one
        // we're only matching words which start with the 
        // value in #filter, case-insensitive

        var pattern = new RegExp('^' + this.value.replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1"), 'i');
        
        // hide all h4's within div.media, then filter
        $('div.media1 div.jugador div.draggable ').hide().filter(function() {
    
            // only return h4's which match our pattern
            return !!$(this).text().match(pattern);
    
        }).show(); // show h4's which matched the pattern

    });
});//]]> 

  var arrayJugador = new Array();
  var maximo = 2;
  maximo = <?php echo $_SESSION["cantidad"]?>

  $(function(){
     $( "#sig" ).click(function() {
      });


    $( "#draggable" ).draggable({ snap: true 
    });

    $("#snaptarget").data("numsoltar",0);//variable que guarda el num de jugadores
    $("#snaptarget").data("max",maximo);
    $("#snaptarget").droppable({
      drop: function( event, ui ) { //Aqui entra
      if (!ui.draggable.data("jugador")){
         ui.draggable.data("jugador", true);
         var elem = $(this);
         var elem1 = $(this);
         
         elem.data("numsoltar", elem.data("numsoltar") + 1);
         elem.html("" + elem.data("numsoltar") + " jugadores elegidos");
         var idjugador= ui.draggable.data("id");  
         arrayJugador[elem.data("numsoltar")-1]=(ui.draggable.data("id"));

         //alert(""+ arrayJugador+""); NO BORRAR SIRVE PARA DEBUGGEAR 
         if(elem.data("numsoltar")==maximo-1){
         
          $("#sig").click();
         }
      }

   },
   out: function( event, ui ) { //Aqui sale
      if (ui.draggable.data("jugador")){
         ui.draggable.data("jugador", false);
         var elem = $(this);
         var elem1 = $(this);
         var arrAux= new Array();
         for (var i = 0; i < arrayJugador.length-1; i++) {
           if(ui.draggable.data("id")!=arrayJugador[i]){
              arrAux[i]= arrayJugador[i];
           }else{
            arrAux[i]=arrayJugador[i+1];
           }


         };
         arrayJugador=arrAux;
         elem.data("numsoltar", elem.data("numsoltar") - 1);
         elem1.html("" + ui.draggable.data("id") + " Jugador Salio");

      }
   }

});

   
   <?php 
   foreach ($vectorContactos as $Contacto) { ?>
    $( "#draggable<?php echo $Contacto->getIdUsuario();?>" ).draggable({ 
      snap: ".ui-widget-header",
      create: function(event, $Contacto){}
      });
    $("#draggable<?php echo $Contacto->getIdUsuario();?>").data("jugador",false);
    $("#draggable<?php echo $Contacto->getIdUsuario();?>").data("id","<?php echo $Contacto->getIdUsuario();?>");

      <?php } ?> 
      });
  
  function setValue(){
    //arv= arrayJugador.join(","); //Funciona
    var jObject={};
    for(i in arrayJugador){
      jObject[i] = arrayJugador[i];
    }

    jObject=JSON.stringify(jObject);
      $.ajax({
          type:'post',
          cache:false,
          url:"nuevoPartido.php",
          data:{jObject:jObject}
    });
    }


  </script>

<!-- Aqui empieza la pagina -->
<div class="row">
  <div id="contact-us" class="parallax">
    <div class="container">

	<div class="row">
	      <div class="heading-a text-center">
        <h2>Elige a los jugadores</h2>
        <p>Mueve tus jugadores al terreno de juego.</p>
<?php  foreach ($vectorRecintos as $key ) {?>
        <p>Recinto: <?php echo $key->getNombre()?></p>
        <?php }?>
      </div>
       
		<div class="col-md-6"><!-- Jugadores y buscador-->
		<p>Contactos:</p>
    <div class="com-md-6">
    <input type="text" class="form-control" id="filter" name="filter" placeholder="Buscar Jugador...">
    </div>
		<!--<img id="draggable1" class="img-responsive center ui-widget-content arreglo draggable" src="images/usuarios/cris.jpg" width="60" alt="hola" > -->
<script src="js/jquery.ui.touch-punch.min.js"></script>
<?php

foreach ($vectorContactos as $Contacto) {
      #un IF AQUI para ver el ESTADO de los USUARIOS
?>
<div class="media1">
<div class="jugador">
    <div id="draggable<?php echo $Contacto->getIdUsuario();?>" class="ui-widget-content arreglo draggable"><p class="hide"><?php echo $Contacto->getNombre();?></p>
    <img  class="img-responsive center" src="images/usuarios/<?php echo $Contacto->getRutaFotografia();?>" width="80"/>
    <p class="stroke" ><strong><?php echo $Contacto->getNombre();?></strong></p> 
    </div>
    </div>
    </div>
<?php

}
?>


		</div>
    <button href="#" data-toggle="modal" data-target="#modal-1" class="hide" id="sig"></button>
		<div class="col-md-6" ><!--cancha-->
		<div id="snaptarget" class="ui-widget-header arreglo">

     </div>
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

 



  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.inview.min.js"></script>
  <script type="text/javascript" src="js/wow.min.js"></script>
  <script type="text/javascript" src="js/mousescroll.js"></script>
  <script type="text/javascript" src="js/smoothscroll.js"></script>
  <script type="text/javascript" src="js/jquery.countTo.js"></script>
  <script type="text/javascript" src="js/lightbox.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>

  <script src="js/fileinput.min.js" type="text/javascript"></script>


  <div class="container">
    
    <div class="modal fade" id="modal-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title">Todo listo, solo un paso mas!</h3>
           </div>
           <div class="modal-body">

            <form  method="post" action="resumenPartido.php" class="design-form" > <!-- Falta definir  la accion -->
       
              <div class="container">  
  
    
              <div class="row">
                  <div class="col-sm-8">

          
                      <div class="form-group">
                        <h2 class="center">¿Deseas agendar un tercer tiempo?<h2>
                       
                        <button class="btn-submit" type="submit" onClick="setValue()" formaction="tercerTiempo.php">Si</button>
                       
                        <button type="submit" class="btn-submit" onClick="setValue()" >No</button>
                        
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
</body>

</html>