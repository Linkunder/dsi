<?php

session_start();
include_once('../TO/Partido.php');
include_once('../Logica/controlPartidos.php');
include_once('../TO/Equipo.php');
include_once('../Logica/controlEquipos.php');
include_once('../TO/Recinto.php');
include_once('../Logica/controlRecintos.php');


$jefePartido = controlPartidos::obtenerInstancia(); //Podemos usar control partidos mediante JefePartido



$idUsuario= $_SESSION['idUsuario'];
$idRecinto= $_SESSION['idRecinto']; //Recinto seleccionado
$cantidad = $_SESSION['cantidad']; //Cantidad de jugadores seleccionados
$fecha = $_SESSION['fecha'];
$hora = $_SESSION['hora'];
$idEstado = "3"; //debido a que el partido estara marcado como "agendado pendiente"
$idTercerTiempo = "0"; // Por ahora 0 para representar que no tiene un tercer tiempo asociado

$cuota= 0;
$color = $_SESSION['color'];
//Calculamos la cuota, traemos la informacion del recinto elegido

$jefeRecinto = controlRecintos::obtenerInstancia();
$vectorRecintos = $jefeRecinto->leerRecinto($idRecinto);

	foreach ($vectorRecintos as $Recinto) {
		$cuota= ($Recinto->getPrecio())/$cantidad; //calculamos por personas elegidas.
	}


//Creamos un objeto partido y lo agregamos a la base de datos
$nuevoPartido = new Partido();
$nuevoPartido->setFecha($fecha);
$nuevoPartido->setHora($hora);
$nuevoPartido->setCuota($cuota);
$nuevoPartido->setIdEstado($idEstado);
$nuevoPartido->setIdRecinto($idRecinto);
$nuevoPartido->setIdTercerTiempo($idTercerTiempo);
$nuevoPartido->setIdUsuario($idUsuario);
$jefePartido = controlPartidos::obtenerInstancia();
//Se agrega a la base de datos
$jefePartido->crearPartido($nuevoPartido);

//Recuperamos el id del partido agendado
$vectorPartidos=$jefePartido->leerPartidosUsuario($idUsuario);
$Partido = new Partido();
$Partido= end($vectorPartidos);
$idPartido = $Partido->getIdPartido();
$_SESSION["idPartido"]=$idPartido;


//Traemos las id de los jugadores elegidos
$data= json_decode($_POST['jObject'],true); 
for($i=0; $i<sizeof($data); $i++){
	//id de cada jugador seleccionado
	$id=$data[$i]; 

$jefeEquipo= controlEquipos::obtenerInstancia();
$nuevoEquipo= new Equipo();
$nuevoEquipo->setColor($color);
$nuevoEquipo->setIdUsuario($id);
$nuevoEquipo->setIdPartido($idPartido);

//Creamos el nuevo equipo y lo pasamos al control.
$jefeEquipo->crearEquipo($nuevoEquipo);

}
//AQUI SE AGREGA EL JUGADOR QUE AGENDA
$jefeEquipo= controlEquipos::obtenerInstancia();
$nuevoEquipo= new Equipo();
$nuevoEquipo->setColor($color);
$nuevoEquipo->setIdUsuario($idUsuario);
$idPartido = end($vectorPartidos)->getIdPartido();
$nuevoEquipo->setIdPartido($idPartido);

//Creamos el nuevo equipo y lo pasamos al control.
$jefeEquipo->crearEquipo($nuevoEquipo);


header("Location:inicioJugador.php?accion=notificar");



?>