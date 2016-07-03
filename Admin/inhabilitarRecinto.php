<?php

include_once('../TO/Recinto.php');
include_once('../Logica/controlRecintos.php');

$idRecinto = $_GET['idRecinto'];
$controlRecintos = controlRecintos::obtenerInstancia();

$controlRecintos->inhabilitarRecinto($idRecinto);

header("Location:gestionRecintos.php?accion=inhabilitar"); 

?>
