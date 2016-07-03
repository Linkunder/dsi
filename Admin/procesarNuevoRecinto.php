<?php

include_once('../TO/Recinto.php');
include_once('../Logica/controlRecintos.php');

include_once('../TO/Solicitud.php');
include_once('../Logica/controlSolicitudes.php');

if (isset($_GET['idSolicitud'])){	// Agregar el recinto que el usuario notificó
	$idSolicitud = $_GET['idSolicitud'];
	$controlSolicitud = controlSolicitudes::obtenerInstancia();
	$solicitud = $controlSolicitud->leerSolicitud($idSolicitud);
	foreach ($solicitud as $key ) {
		$nombre = $key->getNombre();
		$tipo = $key->getTipo();
		$superficie = $key->getSuperficie();
		$precio = $key->getPrecio();
		$direccion = $key->getDireccion();
		$horario = $key->getHorario();
		$canchas = $key->getCantidadCanchas();
		$telefono = $key->getTelefono();
	}
	$controlSolicitud->eliminarSolicitud($idSolicitud);
} else {							// Agregar recinto que el admin agrego por formulario.
	$nombre = $_POST['nombre'];
	$tipo = $_POST['tipo'];
	$superficie = $_POST['superficie'];
	$precio = $_POST['precio'];
	$direccion = $_POST['direccion'];
	$horario = $_POST['horario'];
	$canchas = $_POST['canchas'];
	$telefono = $_POST['telefono'];
}
	// Nuevo Recinto
	$recinto = new Recinto();
	$recinto->setNombre($nombre);
	$recinto->setTipo($tipo);
	$recinto->setSuperficie($superficie);
	$recinto->setPrecio($precio);
	$recinto->setDireccion($direccion);
	$recinto->setHorario($horario);
	$recinto->setCantidadCanchas($canchas);
	$recinto->setTelefono($telefono);

	$controlRecinto = controlRecintos::obtenerInstancia();
	$controlRecinto->crearRecinto($recinto);




header("Location:gestionRecintos.php?accion=agregar");



?>