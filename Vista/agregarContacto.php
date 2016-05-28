<?php

session_start();
include_once('../TO/ListaContactos.php');
include_once('../Logica/controlContactos.php');
ob_start();
$idUsuario = $_SESSION['idUsuario'];

$jefeContacto = controlContactos::obtenerInstancia();
$idContacto = $_GET['idContacto'];




$lista = new ListaContactos();
$lista->setIdUsuario($idUsuario);
$lista->setIdContacto($idContacto);

$jefeContacto = controlContactos::obtenerInstancia();
$jefeContacto->crearListaContactos($lista);

$message = "Contacto agregado exitosamente.";
echo "<script type='text/javascript'>alert('$message');</script>";
header("Location:contactos2.php");

?>
