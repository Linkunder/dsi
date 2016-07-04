<?php
	include_once('controlPuntuacion.php');

	$idUsuario = $_POST["idUsuario"];
	$idRecinto = $_POST["idRecinto"];
	$puntuacion = $_POST["puntuacion"];
	$nombre = $_POST["nombreRecinto"];

	$jefePuntuacion= controlPuntuacion::obtenerInstancia();

	$jefePuntuacion->crearPuntuacion($idUsuario,$idRecinto,$puntuacion);

	header("Location: ../Vista/recintos.php?search=$nombre&nuevo=2");

?>