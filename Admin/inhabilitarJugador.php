<?php

include_once('../TO/Usuario.php');
include_once('../Logica/controlUsuarios.php');

$idJugador = $_GET['idJugador'];
$controlJugador = controlUsuarios::obtenerInstancia();

$controlJugador->inhabilitarJugador($idJugador);

header("Location:gestionJugadores.php?accion=inhabilitar"); 

?>
