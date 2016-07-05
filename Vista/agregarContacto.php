<?php

session_start();
include_once('../TO/ListaContactos.php');
include_once('../Logica/controlContactos.php');


$idUsuario = $_SESSION['idUsuario'];


$jefeContacto = controlContactos::obtenerInstancia();
$idContacto = $_GET['idContacto'];




$lista = new ListaContactos();
$lista->setIdUsuario($idUsuario);
$lista->setIdContacto($idContacto);

$jefeContacto = controlContactos::obtenerInstancia();
$jefeContacto->crearListaContactos($lista);

header("Location:contactos2.php?accion=contacto");

?>
