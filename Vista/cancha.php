

<?php 

require_once('../Logica/JSON.php');
include('headerJugador.php'); 
$json = new Services_JSON();
 ?> 
   <!-- Nuevos Scripts-->
  <style>
  .draggable { 
    width: 80px; height: 70px; padding:; float: left; float: ; margin: 0 10px 10px 0; font-size: 0.9em; color: white; text-align: center;
    background-color: transparent;
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
  var arrayJugador = new Array();
  $(function(){
     
    $( "#draggable" ).draggable({ snap: true 
    });

    $("#snaptarget").data("numsoltar",0);//variable que guarda el num de jugadores
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

   

    $("#draggable1").draggable({ 
      snap: ".ui-widget-header",
      create: function(event, $Jugador1){}
      });
    $("#draggable1").data("jugador",false);
    $("#draggable1").data("id","1");

        $("#draggable2").draggable({ 
      snap: ".ui-widget-header",
      create: function(event, $Jugador1){}
      });
    $("#draggable2").data("jugador",false);
    $("#draggable2").data("id","1");

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
          url:"eleccionJugadores.php",
          data:{jObject:jObject},
          success:function(server){
            alert(server);
          }
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
      </div>
		<div class="col-md-6"><!-- Jugadores y buscador-->
		<p>Contactos:</p>
    
		<!--<img id="draggable1" class="img-responsive center ui-widget-content arreglo draggable" src="images/usuarios/cris.jpg" width="60" alt="hola" > -->
    <div id="draggable1" class="ui-widget-content arreglo draggable">
    <img  class="img-responsive center" src="images/usuarios/cris.jpg" width="80"/>
    <p class="stroke" ><strong>Cristiano Ronaldo</strong></p> 
    </div>

    		    <div id="draggable2" class="ui-widget-content arreglo draggable">
    <img  class="img-responsive center" src="images/usuarios/cris.jpg" width="80"/>
    <p class="stroke" ><strong>Cristiano Ronaldo</strong></p> 
    </div>


		</div>

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



</body>

</html>