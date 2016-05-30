<?php

include_once('../TO/Usuario.php');
include_once('../Logica/controlUsuarios.php');

$idUsuario = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido= $_POST['apellido'];
$nickname= $_POST['nick'];
$email= $_POST['mail'];
$fechaNacimiento= $_POST['fecha'];
$sexo= $_POST['sexo'];
$rutaFotografia= $_POST['ruta'];
$telefono= $_POST['fono'];
$idEstado= $_POST['estado'];
$idPerfil= $_POST['perfil'];

$nuevoUsuario = new Usuario();
$nuevoUsuario->setIdUsuario($idUsuario);
$nuevoUsuario->setNombre($nombre);
$nuevoUsuario->setApellido($apellido);
$nuevoUsuario->setNickname($nickname);
$nuevoUsuario->setEmail($email);
$nuevoUsuario->setFechaNacimiento($fechaNacimiento);
$nuevoUsuario->setSexo($sexo);
$nuevoUsuario->setRutaFotografia($rutaFotografia);
$nuevoUsuario->setTelefono($telefono);
$nuevoUsuario->setIdEstado($idEstado);
$nuevoUsuario->setIdPerfil($idPerfil);

$jefeUsuario = controlUsuarios::obtenerInstancia();
$jefeUsuario->actualizarUsuario($nuevoUsuario);

echo "<script type='text/javascript'>alert('Jugador actualizado!');</script>";
header("Location:pruebas.php");

?>