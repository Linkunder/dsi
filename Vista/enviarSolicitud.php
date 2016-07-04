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
$idUsuario = $_SESSION['idUsuario'];


$vectorUsuario=$jefeUsuario->leerUsuario($idUsuario);
foreach($vectorUsuario as $Jugador){    
	$nombreJugador= $Jugador->getNombre()." ".$Jugador->getApellido();
}

//partido
$partidoSeleccionado = $jefePartido->leerPartido($idPartido);
foreach ($partidoSeleccionado as $key) {
	$idRecinto = $key->getIdRecinto();
	$fecha = $key->getFecha();
	$hora = $key->getHora();
	$cuota = $key->getCuota();
	$idCapitan = $key->getIdUsuario();
}


// Informacion del recinto.
$recintoPartido = $jefeRecinto->leerRecinto($idRecinto);
foreach ($recintoPartido as $recinto) {
	$nombreRecinto = $recinto->getNombre();
}

// Informacion del capitan
$capitan = $jefeUsuario->leerUsuario($idCapitan);
foreach ($capitan as $cap) {
	$correoCapitan = $cap->getEmail();
}







$to = "partidomatchday@gmail.com,".$correoCapitan;


//foreach para rellenar el campo con los correos de los jugadores
//$query = "SELECT correo FROM jugador WHERE id_jugador IN (SELECT id_jugador FROM equipo where id_partido in (SELECT id_partido FROM partido))";
//echo $query;
//foreach ($query as $key) {
//$to .= ", ".$key;
//}


$subject = "Solicitud jugador partido";


$message = "<html>";
$message .= "<head>";
$message .= "<title>HTML email</title>";
$message .= "</head>";
$message .= "<body>";
$message .= '<div style="height:auto; width:auto;"><img src="" alt="Website Change Request" /></div>';
$message .= "<p>El jugador " .$nombreJugador.  " te ha enviado una solicitud para unirse a un partido que organizaste.</p>";
$message .= "<table>";
$message .= "<tr>";
$message .= "<td>Cancha:</td>";
$message .= "<td>".$nombreRecinto."</td>";
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
$message .= "<td>Monto a Pagar por persona:</td>";
$message .= "<td>".$cuota."</td>";
$message .= "</tr>";
$message .= "</table>";
$message .= "<p>Para aceptar la solicitud de " .$nombreJugador.  " haz click aqui.</p>";


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

