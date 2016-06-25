<?php

include_once('../TO/Usuario.php');
include_once('../Logica/controlUsuarios.php');

include_once('../TO/Comentario.php');
include_once('../Logica/controlComentarios.php');

$idComentario = $_GET['idComentario'];
$controlComentario = controlComentarios::obtenerInstancia();
$comentario = $controlComentario->leerComentario($idComentario);
foreach ($comentario as $keyComentario) {
	$idJugador = $keyComentario->getIdUsuario();
}
$controlJugador = controlUsuarios::obtenerInstancia();
$controlJugador->inhabilitarJugador($idJugador);

// Se inhabilitó el jugador, faltaria eliminar el comentario.

$controlComentario->eliminarComentario($idComentario);

header("Location:gestionComentarios.php"); 

?>
