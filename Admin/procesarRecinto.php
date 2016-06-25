<?php

include_once('../TO/Recinto.php');
include_once('../Logica/controlRecintos.php');

// Recibir datos formulario editarRecinto.php
$idRecinto = $_POST['idRecinto'];
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$superficie = $_POST['superficie'];
$precio = $_POST['precio'];
$direccion = $_POST['direccion'];
$horario = $_POST['horario'];
$canchas = $_POST['canchas'];
$telefono = $_POST['telefono'];

// Nuevo Recinto
$recinto = new Recinto();
$recinto->setIdRecinto($idRecinto);
$recinto->setNombre($nombre);
$recinto->setTipo($tipo);
$recinto->setSuperficie($superficie);
$recinto->setPrecio($precio);
$recinto->setDireccion($direccion);
$recinto->setHorario($horario);
$recinto->setCantidadCanchas($canchas);
$recinto->setTelefono($telefono);

$controlRecinto = controlRecintos::obtenerInstancia();
$controlRecinto->actualizarRecinto($recinto);


header("Location:gestionRecintos.php");



?>