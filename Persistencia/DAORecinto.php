<?php

include_once('Conexion.php');

class DAORecinto{
	private $conexionBD;

	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearRecinto($recinto){
		$link = $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO recinto (nombre, tipo, superficie, precio, direccion, horario, cantidadCanchas, telefono, idEstadoRecinto) 
		VALUES ('".$recinto->getNombre()."',
			'".$recinto->getTipo()."',
			'".$recinto->getSuperficie()."',
			'".$recinto->getPrecio()."',
			'".$recinto->getDireccion()."',
			'".$recinto->getHorario()."',
			'".$recinto->getCantidadCanchas()."',
			'".$recinto->getTelefono()."',2)";
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
		$query = "UPDATE recinto SET 
		idRecinto = '".$recinto->getIdRecinto()."',
		nombre = '".$recinto->getNombre()."',
		tipo = '".$recinto->getTipo()."',
		superficie ='".$recinto->getSuperficie()."',
		precio = '".$recinto->getPrecio()."',
		direccion = '".$recinto->getDireccion()."',
		horario = '".$recinto->getHorario()."',
		cantidadCanchas = '".$recinto->getCantidadCanchas()."',	
		telefono = '".$recinto->getTelefono()."'
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

	public function habilitarRecinto($idRecinto){
		$link=$this->conexionBD->obtenerConexion();
		$query = "UPDATE recinto SET idEstadoRecinto='1' WHERE idRecinto = '".$idRecinto."';";
		$result = mysql_query($query,$link) or die(mysql_error());
		mysql_close($link);
	}

	public function inhabilitarRecinto($idRecinto){
		$link=$this->conexionBD->obtenerConexion();
		$query = "UPDATE recinto SET idEstadoRecinto='2' WHERE idRecinto = '".$idRecinto."';";
		$result = mysql_query($query,$link) or die(mysql_error());
		mysql_close($link);
	}

	public function obtenerNombre($idRecinto){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM recinto WHERE idRecinto = '$idRecinto'";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i= 0;
		while ($row = mysql_fetch_array($result)){
			$recinto= new Recinto();
			$recinto->setIdRecinto($row['idRecinto']);
			$recinto->setNombre($row['nombre']);
			$vectorData[$i]= $recinto;
			$i++;
			$nombre = $row['nombre'];
		}
		mysql_close($link);
		return $nombre;   
	}



}

?>