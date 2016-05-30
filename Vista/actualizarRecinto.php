<?php

include_once('../TO/Recinto.php');
include_once('../Logica/controlRecintos.php');

$idRecinto = $_POST['id'];
$nombre = $_POST['nombre'];
$tipo= $_POST['tipo'];
$superficie= $_POST['superficie'];
$precio= $_POST['precio'];
$direccion= $_POST['direccion'];
$horario= $_POST['horario'];
$rutaFotografia= $_POST['ruta'];
$canchas= $_POST['canchas'];
$puntuacion = $_POST['puntuacion'];
$telefono= $_POST['fono'];
$estado= $_POST['estado'];

$nuevoRecinto = new Recinto();
$nuevoRecinto->setIdRecinto($idRecinto);
$nuevoRecinto->setNombre($nombre);
$nuevoRecinto->setTipo($tipo);
$nuevoRecinto->setSuperficie($superficie);
$nuevoRecinto->setPrecio($precio);
$nuevoRecinto->setDireccion($direccion);
$nuevoRecinto->setHorario($horario);
$nuevoRecinto->setRutaFotografia($rutaFotografia);
$nuevoRecinto->setCantidadCanchas($canchas);
$nuevoRecinto->setPuntuacion($puntuacion);
$nuevoRecinto->setTelefono($telefono);
$nuevoRecinto->setIdEstado($estado);


$jefeRecintos = controlRecintos::obtenerInstancia();
$jefeRecintos->actualizarRecinto($nuevoRecinto);

echo "<script type='text/javascript'>alert('Recinto actualizado!');</script>";
header("Location:pruebas.php");

?>