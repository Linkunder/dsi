<?php
include_once('controlPartidos.php');
include_once('../TO/Partido.php');
include_once('../TO/Equipo.php');
include_once('../LOGICA/controlEquipos.php');
include_once('../TO/Recinto.php');
include_once('../LOGICA/controlRecintos.php');
include_once('../TO/Equipo.php');
include_once('../LOGICA/controlEquipos.php');
include_once('../TO/Usuario.php');
include_once('../LOGICA/controlUsuarios.php');
include_once('../TO/TercerTiempo.php');
include_once('../LOGICA/controlTercerTiempo.php');
include_once('../TO/Local.php');
include_once('../LOGICA/controlLocales.php');

$jefePartido = controlPartidos::obtenerInstancia();
$jefeRecinto = controlRecintos::obtenerInstancia();
$jefeEquipo = controlEquipos::obtenerInstancia();
$jefeUsuario = controlUsuarios::obtenerInstancia();
$jefeTercer = controlTercerTiempo::obtenerInstancia();
$jefeLocal = controlLocales::obtenerInstancia();

$idPartido = $_GET["idPartido"];




$vectorPartido = $jefePartido->leerPartido($idPartido);
			foreach ($vectorPartido as $Partido) {
				$dia = $Partido->getFecha();
				$newFecha = date("d-m-Y", strtotime($dia));
				$hora = $Partido->getHora();
				$cuotaTotal = $Partido->getCuota()*$cantidad;
				$participantes = $cantidad;
				$cuotaPersonal = $Partido->getCuota();
			}


$vectorEquipo = $jefeEquipo->obtenerJugadores($idPartido);


$to = "partidomatchday@gmail.com";
foreach ($vectorEquipo as $Jugador) {
					$aux = $to;
					$to = $aux.", ".$Jugador->getEmail();
					
				}	
//foreach para rellenar el campo con los correos de los jugadores
//$query = "SELECT correo FROM jugador WHERE id_jugador IN (SELECT id_jugador FROM equipo where id_partido in (SELECT id_partido FROM partido))";
//echo $query;
//foreach ($query as $key) {
//$to .= ", ".$key;
//}

$dir = $direccionRecinto;
//rellenar con la direccion
$nombre = $nombreJugador;
//rellenar con nombre jugador
$fecha = $newFecha;
//fecha partido
//se mantiene el que copie
//hora partido
$monto = $cuotaTotal;
//precio original cancha
$cant = $cantidad;
//cantidad de jugadores
$pagoporpersona = $cuotaPersonal;
//monto/cancha

$subject = "Invitacion MatchDay";
//se debe obtener el asunto, Partido de: X deporte
$tercertiempo = $nombreLugar;
//recibir existencia de 3er tiempo
$direcciontercertiempo = $direcciontercertiempo;
//direccion tercer tiempo


$message = "<html>";
$message .= "<head>";
$message .= "<title>HTML email</title>";
$message .= "</head>";
$message .= "<body>";
$message .= '<div style="height:auto; width:auto;"><img src="" alt="Website Change Request" /></div>';
$message .= '<div style="height:auto; width:auto;"><img src="http://maps.googleapis.com/maps/api/staticmap?center='. $dir . '&zoom=14&scale=false&size=600x300&maptype=roadmap&format=png&visual_refresh=true&markers=size:small%7Ccolor:0xff0000%7Clabel:%7C'.$dir.'" alt="Website Change Request" /></div>';
$message .= "<p>El jugador " .$nombre.  ", Ha cancelado el partido.</p>";
$message .= "<table>";
$message .= "<tr>";
$message .= "<td>Direccion:</td>";
$message .= "<td>".$dir."</td>";
$message .= "</tr>";
$message .= "<tr>";
$message .= "<td>Fecha:</td>";
$message .= "<td>".$fecha."</td>";
$message .= "</tr>";
$message .= "<tr>";
$message .= "<td>Hora: :</td>";
$message .= "<td>".$hora."</td>";
$message .= "</tr>";
$message .= "<tr>";
$message .= "<td>Monto total a pagar:</td>";
$message .= "<td>".$monto."</td>";
$message .= "</tr>";
$message .= "<tr>";
$message .= "<td>Monto a Pagar por persona:</td>";
$message .= "<td>".$pagoporpersona."</td>";
$message .= "</tr>";
$message .= "</table>";

if($existenciaTercerTiempo!=0){
$message .= "<p>Tambien ha cancelado un evento post partido!</p>";
	$message .= "Este tercer tiempo sera en: " .$tercertiempo. " mapa de referencia:";
$message .= '<div style="height:auto; width:auto;"><img src="http://maps.googleapis.com/maps/api/staticmap?center='. $direcciontercertiempo . ',Chillan&zoom=14&scale=false&size=600x300&maptype=roadmap&format=png&visual_refresh=true&markers=size:small%7Ccolor:0xff0000%7Clabel:%7C'.$direcciontercertiempo.' Chillan, Chile" alt="Website Change Request" /></div>';
}
$message .= "<center><b><p>© 2016 DSI., MatchDay.</p></b></center>";
$message .= "</body>";
$message .= "</html>";



// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <partidomatchday@gmail.com>' . "\r\n"; //
$headers .= 'Cc: partidomatchday@gmail.com' . "\r\n"; // 

mail($to,$subject,$message,$headers);
 //Email response
 
  
?>
<?php




$cancelar=$jefePartido->eliminarPartido($idPartido);
$s=0;
if($cancelar){
	$s++;
}

if($s==1){



}

header("Location:../Vista/partidosGestionados.php?s=$s");

?>