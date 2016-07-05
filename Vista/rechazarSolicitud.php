<?php

include_once('../TO/Usuario.php');
include_once('../Logica/controlUsuarios.php');

include_once('../TO/ListaSolicitudes.php');
include_once('../Logica/controlListaSolicitudes.php');

$idSolicitud = $_GET['idSolicitud'];
$controlSolicitudes = controlListaSolicitudes::obtenerInstancia();

$controlSolicitudes->eliminarSolicitud($idSolicitud);

header("Location:partidosPendientes.php?accion=eliminar"); 

?>
