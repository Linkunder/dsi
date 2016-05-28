<?php


include_once('../TO/ListaContactos.php');
include_once('../Logica/controlContactos.php');

$jefeContacto = controlContactos::obtenerInstancia();
$idContacto = $_GET['idContacto'];


ob_start();
$idUsuario = $_SESSION['idUsuario'];

echo "ID Usuario: $idUsuario <br>";
echo "ID Contacto: $idContacto <br>";


$lista = new ListaContactos();
$lista->setIdUsuario($idUsuario);
$lista->setIdContacto($idContacto);

$jefeContacto = controlContactos::obtenerInstancia();
$jefeContacto->crearListaContactos($lista);

echo "<script type='text/javascript'>alert('Jugador agregado!');</script>";
//header("Location:contactos2.php");

?>