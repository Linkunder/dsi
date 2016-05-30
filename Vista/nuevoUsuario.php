<?php

include_once('../TO/Usuario.php');
include_once('../Logica/controlUsuarios.php');

session_start();

$nombre = $_POST['nombre'];
$apellido= $_POST['apellido'];
$nickname= $_POST['nickname'];
$email= $_POST['mail'];
$fechaNacimiento= $_POST['fecha'];
$sexo= $_POST['sexo'];
$telefono= $_POST['telefono'];


$nuevoUsuario = new Usuario();
$nuevoUsuario->setNombre($nombre);
$nuevoUsuario->setApellido($apellido);
$nuevoUsuario->setNickname($nickname);
$nuevoUsuario->setEmail($email);
$nuevoUsuario->setFechaNacimiento($fechaNacimiento);
$nuevoUsuario->setSexo($sexo);
$nuevoUsuario->setTelefono($telefono);

$jefeUsuario = controlUsuarios::obtenerInstancia();
$jefeUsuario->crearUsuario($nuevoUsuario);

header("Location:subirImagen.php");

?>