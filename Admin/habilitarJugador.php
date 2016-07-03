<?php

include_once('../TO/Usuario.php');
include_once('../Logica/controlUsuarios.php');

$idJugador = $_GET['idJugador'];
$controlJugador = controlUsuarios::obtenerInstancia();

$controlJugador->habilitarJugador($idJugador);

header("Location:gestionJugadores.php?accion=habilitar"); 

?>

