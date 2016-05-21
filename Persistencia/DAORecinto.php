<?php

include_once('Conexion.php');

class DAORecinto{
	private $conexionBD;

	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearRecinto($recinto){
		$link = $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO recinto (idRecinto, nombre, precio, direccion, horario, rutaFotografia, cantidadCanchas, puntuacion, telefono, idEstadoRecinto) 
		VALUES ('".$recinto->getIdRecinto()."',
			'".$recinto->getNombre()."',
			'".$recinto->getPrecio()."',
			'".$recinto->getDireccion()."',
			'".$recinto->getHorario()."',
			'".$recinto->getRutaFotografia()."',
			'".$recinto->getCantidadCanchas()."',
			'".$recinto->getPuntuacion()."',
			'".$recinto->getTelefono()."',
			'".$recinto->getIdEstado()."')";
		mysql_query($query,$link) or die(mysql_error());
		mysql_close($link);
	}

	public function leerRecinto($idRecinto){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM recinto WHERE idRecinto = '$idRecinto' ";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			$recinto = new Recinto();
			$recinto->setIdRecinto($row['idRecinto']);
			$recinto->setNombre($row['nombre']);
			$recinto->setPrecio($row['precio']);
			$recinto->setDireccion($row['direccion']);
			$recinto->setHorario($row['horario']);
			$recinto->setRutaFotografia($row['rutaFotografia']);
			$recinto->setCantidadCanchas($row['cantidadCanchas']);
			$recinto->setPuntuacion($row['puntuacion']);
			$recinto->setTelefono($row['telefono']);
			$recinto->setIdEstado($row['idEstadoRecinto']);
			$vectorData[$i]= $recinto;
			$i++;
		}
		mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;	
	}

	public function actualizarRecinto($recinto){
		$link = $this->conexionBD->obtenerConexion();
		$query = "UPDATE idRecinto SET 
		idRecinto = '".$recinto->getIdRecinto()."',
		nombre = '".$recinto->getNombre()."',
		precio = '".$recinto->getPrecio()."',
		direccion = '".$recinto->getDireccion()."',
		horario = '".$recinto->getHorario()."',
		rutaFotografia = '".$recinto->getRutaFotografia()."',
		cantidadCanchas = '".$recinto->getCantidadCanchas()."',
		puntuacion = '".$recinto->getPuntuacion()."',
		telefono = '".$recinto->getTelefono()."',
		idEstadoRecinto = '".$recinto->getIdEstado()."'
		WHERE idRecinto = '".$recinto->getIdrecinto()."'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);
	}

	public function eliminarRecinto($idRecinto){
		$link=$this->conexionBD->obtenerConexion();
		$query="DELETE FROM recinto WHERE idRecinto = '$idRecinto'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);

	}

	public function buscarRecinto($idRecinto){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM recinto WHERE idRecinto = '$idRecinto'";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i= 0;
		while ($row = mysql_fetch_array($result)){
			$recinto = new Recinto();
			$recinto->setIdRecinto($row['idRecinto']);
			$recinto->setNombre($row['nombre']);
			$recinto->setPrecio($row['precio']);
			$recinto->setDireccion($row['direccion']);
			$recinto->setHorario($row['horario']);
			$recinto->setRutaFotografia($row['rutaFotografia']);
			$recinto->setCantidadCanchas($row['cantidadCanchas']);
			$recinto->setPuntuacion($row['puntuacion']);
			$recinto->setTelefono($row['telefono']);
			$recinto->setIdEstado($row['idEstadoRecinto']);
			$vectorData[$i]= $recinto;
			$i++;
		}
		mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;   
	}

}

?>