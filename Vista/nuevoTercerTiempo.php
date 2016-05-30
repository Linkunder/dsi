<?php

session_start();

include_once('../TO/TercerTiempo.php');
include_once('../Logica/controlTercerTiempo.php');

include_once('../TO/Partido.php');
include_once('../Logica/controlPartidos.php');

$jefePartido = controlPartidos::obtenerInstancia();


$jefeTercerTiempo = controlTercerTiempo::obtenerInstancia(); 
$hora = $_POST['hora'];
$descripcion = $_POST['descripcion'];
$local = $_SESSION['idLocal'];
$nuevoTercerTiempo = new TercerTiempo();
$nuevoTercerTiempo->setHora($hora);
$nuevoTercerTiempo->setDescripcion($descripcion);
$nuevoTercerTiempo->setIdLocal($local);
$jefeTercerTiempo->crearTercerTiempo($nuevoTercerTiempo);

// Tengo que traer el idTercerTiempo que fue ingresado.
$vectorTercer = $jefeTercerTiempo->leerTercerosTiempos();
$idUltimoTercer = end($vectorTercer)->getIdTercerTiempo();

$idPartido= $_SESSION["idPartido"];

$jefePartido->actualizarInformacion($idPartido, $idUltimoTercer);

header("Location:resumenPartido.php");



?>