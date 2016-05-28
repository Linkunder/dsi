<?php
	session_start();
	include_once('../TO/Partido.php');
	include_once('../Logica/controlPartidos.php');




$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$cuota = "100";
$idEstado = "1";
$idRecinto = "1";

$nuevoPartido = new Partido();
$nuevoPartido->setFecha($fecha);
$nuevoPartido->setHora($hora);
$nuevoPartido->setCuota($cuota);
$nuevoPartido->setIdEstado("1");
$nuevoPartido->setIdRecinto("1");

$jefePartido = controlPartidos::obtenerInstancia();
$jefePartido->crearPartido($nuevoPartido);

echo "<script type='text/javascript'>alert('Partido agregado!');</script>";



?>