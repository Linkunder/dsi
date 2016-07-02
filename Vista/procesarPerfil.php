<?php

include_once('../TO/Usuario.php');
include_once('../Logica/controlUsuarios.php');

$idUsuario = $_POST['idUsuario'];
$nickname= $_POST['nickname'];
$email= $_POST['mail'];
$telefono= $_POST['fono'];

$nuevoUsuario = new Usuario();
$nuevoUsuario->setIdUsuario($idUsuario);
$nuevoUsuario->setNickname($nickname);
$nuevoUsuario->setEmail($email);
$nuevoUsuario->setTelefono($telefono);

$jefeUsuario = controlUsuarios::obtenerInstancia();
$jefeUsuario->actualizarPerfil($nuevoUsuario);

//header("Location:modificarPerfil.php?idUsuario=".$idUsuario."");
header("Location:perfil.php");
?>