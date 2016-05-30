<?php

include_once('../TO/Partido.php');
include_once('../LOGICA/controlPartidos.php');
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


session_start();
$idPartido= $_SESSION["idPartido"];
$idUsuario= $_SESSION['idUsuario'];
$idRecinto= $_SESSION['idRecinto']; //Recinto seleccionado
$cantidad = $_SESSION['cantidad'];
$_SESSION['idTercer']=0;
$idTercer = $_SESSION['idTercer'];
$_SESSION["correoUsuario"]="cmorar@alumnos.ubiobio.cl";
$jefeUsuario = controlUsuarios::obtenerInstancia();
    $correo =  $_SESSION["correoUsuario"];
    $vectorUsuario=$jefeUsuario->leerUsuario($idUsuario);

    
    foreach($vectorUsuario as $Jugador){    
        $nombreJugador= $Jugador->getNombre();
    }


$recinto = $jefeRecinto->leerRecinto($idRecinto);
foreach ($recinto as $Recinto) {
	$imagenRecinto = $Recinto->getRutaFotografia();
	$nombreRecinto = $Recinto->getNombre();
	$direccionRecinto = $Recinto->getDireccion();
}

$idLocal=0;
$tercerTiempo = $jefeTercer->leerTercerTiempo($idTercer);
foreach ($tercerTiempo as $TercerTiempo) {
	$idLocal = $TercerTiempo->getIdLocal();
}

$existenciaTercerTiempo=0;
//partido
$partidoSeleccionado = $jefePartido->leerPartido($idPartido);
foreach ($partidoSeleccionado as $key) {
	$existenciaTercerTiempo=$key->getIdTercerTiempo();
}


$localTercerTiempo = $jefeLocal->leerLocal($idLocal);

if ($existenciaTercerTiempo != 0) { // Si es 0, no hay tercer tiempo 
foreach ($localTercerTiempo as $Local) {
	$nombreLugar = $Local->getNombre();
	$direcciontercertiempo = $Local -> getDireccion();
	$imagenLugar = $Local->getRutaFoto();
}
}

$vectorEquipo = $jefeEquipo->obtenerJugadores($idPartido);

$vectorPartido = $jefePartido->leerPartido($idPartido);
			foreach ($vectorPartido as $Partido) {
				$dia = $Partido->getFecha();
				$newFecha = date("d-m-Y", strtotime($dia));
				$hora = $Partido->getHora();
				$cuotaTotal = $Partido->getCuota()*$cantidad;
				$participantes = $cantidad;
				$cuotaPersonal = $Partido->getCuota();
			}





$to = "partidomatchday@gmail.com";
foreach ($vectorEquipo as $Jugador) {
					$to .= ", " .$Jugador -> getEmail();
					;
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
echo "$direcciontercertiempo";

$message = "<html>";
$message .= "<head>";
$message .= "<title>HTML email</title>";
$message .= "</head>";
$message .= "<body>";
$message .= '<div style="height:auto; width:auto;"><img src="" alt="Website Change Request" /></div>';
$message .= '<div style="height:auto; width:auto;"><img src="http://maps.googleapis.com/maps/api/staticmap?center='. $dir . '&zoom=14&scale=false&size=600x300&maptype=roadmap&format=png&visual_refresh=true&markers=size:small%7Ccolor:0xff0000%7Clabel:%7C'.$dir.'" alt="Website Change Request" /></div>';
$message .= "<p>El jugador " .$nombre.  ", te ha invitado a un partido.</p>";
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
if($tercertiempo!=NULL){
	$message .= "<p>Tambien se te ha invitado a un evento post partido!</p>";
	$message .= "Este tercer tiempo sera en: " .$tercertiempo. " mapa de referencia:";
	$message .= '<div style="height:auto; width:auto;"><img src="http://maps.googleapis.com/maps/api/staticmap?center='. $direcciontercertiempo . '&zoom=14&scale=false&size=600x300&maptype=roadmap&format=png&visual_refresh=true&markers=size:small%7Ccolor:0xff0000%7Clabel:%7C'.$direcciontercertiempo.'"" alt="Website Change Request" /></div>';
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
<META http-equiv="refresh" content="0;URL=index.php">
