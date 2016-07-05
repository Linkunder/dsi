<?php

include_once('../TO/Usuario.php');
include_once('../Logica/controlUsuarios.php');

include_once('../TO/ListaSolicitudes.php');
include_once('../Logica/controlListaSolicitudes.php');

include_once('../TO/Partido.php');
include_once('../Logica/controlPartidos.php');

include_once('../TO/Equipo.php');
include_once('../Logica/controlEquipos.php');

$idSolicitud = $_GET['idSolicitud'];
$controlSolicitudes = controlListaSolicitudes::obtenerInstancia();

// Primero, traer los datos de la solicitud (Partido y Usuario)
$solicitud = $controlSolicitudes->leerSolicitud($idSolicitud);

foreach ($solicitud as $key) {
	$idPartido = $key->getIdPartido();
	$idUsuario = $key->getIdUsuario();
}

// Ahora necesitamos agregar al usuario al partido asociado. 

$controlEquipo = controlEquipos::obtenerInstancia();
$controlPartido = controlPartidos::obtenerInstancia();

$datosEquipo = $controlEquipo->obtenerJugadoresPartido($idPartido);
foreach ($datosEquipo as $key) {
	$color = $key->getColor();
}


$controlEquipo->agregarJugador($color, $idUsuario,$idPartido); // Agregar tupla a la tabla equipo.




$controlSolicitudes->eliminarSolicitud($idSolicitud);

header("Location:partidosPendientes.php?accion=aceptar"); 

?>
