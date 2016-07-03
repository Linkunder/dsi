<?php



include_once('../TO/Solicitud.php');
include_once('../Logica/controlSolicitudes.php');


$idSolicitud = $_GET['idSolicitud'];
$controlSolicitud = controlSolicitudes::obtenerInstancia();
$controlSolicitud->eliminarSolicitud($idSolicitud);




header("Location:gestionSolicitudes.php?accion=rechazar");



?>