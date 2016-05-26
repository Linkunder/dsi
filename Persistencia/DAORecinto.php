<?php

include_once('Conexion.php');

class DAORecinto{
	private $conexionBD;

	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearRecinto($recinto){
		$link = $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO recinto (nombre, tipo, superficie, precio, direccion, horario, rutaFotografia, cantidadCanchas, puntuacion, telefono, idEstadoRecinto) 
		VALUES ('".$recinto->getNombre()."',
			'".$recinto->getTipo()."',
			'".$recinto->getSuperficie()."',
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
			$recinto->setTipo($row['tipo']);
			$recinto->setSuperficie($row['superficie']);
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

	public function obtenerRecintos(){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM recinto";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			$recinto = new Recinto();
			$recinto->setIdRecinto($row['idRecinto']);
			$recinto->setNombre($row['nombre']);
			$recinto->setTipo($row['tipo']);
			$recinto->setSuperficie($row['superficie']);
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
		nombre = '".$recinto->getNombre()."',
		tipo = '".$recinto->getTipo()."',
		superficie ='".$recinto->getSuperficie()."',
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
			$recinto->setNombre($row['nombre']);
			$recinto->setTipo($row['tipo']);
			$recinto->setSuperficie($row['superficie']);
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