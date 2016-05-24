<?php

include_once('../TO/Usuario.php');
include_once('../Logica/controlUsuarios.php');


$nombre = $_POST['nombre'];
$apellido= $_POST['apellido'];
$nickname= $_POST['nickname'];
$email= $_POST['mail'];
$fechaNacimiento= $_POST['fecha'];
$sexo= $_POST['sexo'];
$telefono= $_POST['telefono'];
$rutaFotografia = $_POST['foto'];


$nuevoUsuario = new Usuario();
$nuevoUsuario->setNombre($nombre);
$nuevoUsuario->setApellido($apellido);
$nuevoUsuario->setNickname($nickname);
$nuevoUsuario->setEmail($email);
$nuevoUsuario->setFechaNacimiento($fechaNacimiento);
$nuevoUsuario->setSexo($sexo);
$nuevoUsuario->setTelefono($telefono);
$nuevoUsuario->setRutaFotografia($rutaFotografia);

$jefeUsuario = controlUsuarios::obtenerInstancia();
$jefeUsuario->crearUsuario($nuevoUsuario);

echo "<script type='text/javascript'>alert('Jugador agregado!');</script>";
header("Location:plantilla.html");

?>