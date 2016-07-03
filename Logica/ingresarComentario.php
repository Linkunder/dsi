<?php

include_once('controlComentarios.php');
include_once('../TO/Comentario.php');

	$idUsuario = $_POST["idUsuario"];
	$contenido = $_POST["contenido"];
	$idRecinto = $_POST["idRecinto"];
	$nombre    = $_POST["nombre"];

	$jefeComentario = controlComentarios::obtenerInstancia();
	$nuevoComentario = new Comentario();

	$fechaCompleta = getdate();
    $fecha="".$fechaCompleta["year"]."-".$fechaCompleta["mon"]."-".$fechaCompleta["mday"].""; 

    $nuevoComentario->setIdUsuario($idUsuario);
    $nuevoComentario->setContenido($contenido);
    $nuevoComentario->setIdRecinto($idRecinto);
    $nuevoComentario->setFecha($fecha);

    $jefeComentario->crearComentario($nuevoComentario);

    header("Location: ../Vista/recintos.php?search=$nombre&nuevo=1");


?>