<?php

include_once('../TO/Solicitud.php');
include_once('../Logica/controlSolicitudes.php');

$_SESSION['idUsuario']="1";
// Recibir datos formulario notificarsolicitud.php
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$superficie = $_POST['superficie'];
$precio = $_POST['precio'];
$direccion = $_POST['direccion'];
$horario = $_POST['horario'];
$canchas = $_POST['canchas'];
$telefono = $_POST['telefono'];
$idUsuario = $_SESSION['idUsuario'];
echo $nombre." ";
echo $tipo." ";
echo $superficie." ";
echo $precio." ";
echo $direccion." ";
echo $canchas." ";
echo $telefono." ";
echo "usuario ".$idUsuario." ";

// Nueva solicitud
$solicitud = new Solicitud();
$solicitud->setNombre($nombre);
$solicitud->setTipo($tipo);
$solicitud->setSuperficie($superficie);
$solicitud->setPrecio($precio);
$solicitud->setDireccion($direccion);
$solicitud->setHorario($horario);
$solicitud->setCantidadCanchas($canchas);
$solicitud->setTelefono($telefono);
$solicitud->setIdUsuario($idUsuario);

$controlSolicitud = controlSolicitudes::obtenerInstancia();
$controlSolicitud->crearSolicitud($solicitud);


header("Location:inicioJugador.php");



?>