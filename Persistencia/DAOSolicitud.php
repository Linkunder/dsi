<?php

include_once('Conexion.php');

class DAOSolicitud{
	private $conexionBD;

	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearSolicitud($solicitud){
		$link = $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO solicitud (nombre, precio, direccion, horario, rutaFotografia, cantidadCanchas, telefono, idUsuario) 
		VALUES (".$solicitud->getNombre()."',
			'".$solicitud->getPrecio()."',
			'".$solicitud->getDireccion()."',
			'".$solicitud->getHorario()."',
			'".$solicitud->getRutaFotografia()."',
			'".$solicitud->getCantidadCanchas()."',
			'".$solicitud->getTelefono()."',
			'".$solicitud->getIdUsuario()."')";
		mysql_query($query,$link) or die(mysql_error());
		mysql_close($link);
	}

	public function leerSolicitud($idSolicitud){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM solicitud WHERE idSolicitud = '$idSolicitud' ";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			$solicitud = new Solicitud();
			$solicitud->setIdSolicitud($row['idSolicitud']);
			$solicitud->setNombre($row['nombre']);
			$solicitud->setPrecio($row['precio']);
			$solicitud->setDireccion($row['direccion']);
			$solicitud->setHorario($row['horario']);
			$solicitud->setRutaFotografia($row['rutaFotografia']);
			$solicitud->setCantidadCanchas($row['cantidadCanchas']);
			$solicitud->setTelefono($row['telefono']);
			$solicitud->setIdUsuario($row['idUsuario']);
			$vectorData[$i]= $solicitud;
			$i++;
		}
		mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;	
	}

	public function actualizarSolicitud($solicitud){
		$link = $this->conexionBD->obtenerConexion();
		$query = "UPDATE idSolicitud SET 
		idSolicitud = '".$solicitud->getIdsolicitud()."',
		nombre = '".$solicitud->getNombre()."',
		precio = '".$solicitud->getPrecio()."',
		direccion = '".$solicitud->getDireccion()."',
		horario = '".$solicitud->getHorario()."',
		rutaFotografia = '".$solicitud->getRutaFotografia()."',
		cantidadCanchas = '".$solicitud->getCantidadCanchas()."',
		telefono = '".$solicitud->getTelefono()."',
		idUsuario = '".$solicitud->getIdUsuario()."'
		WHERE idSolicitud = '".$solicitud->getIdSolicitud()."'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);
	}


	public function eliminarSolicitud($idSolicitud){
		$link=$this->conexionBD->obtenerConexion();
		$query="DELETE FROM solicitud WHERE idSolicitud = '$idSolicitud'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);

	}

	public function buscarSolicitud($idSolicitud){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM solicitud WHERE idSolicitud = '$idSolicitud'";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i= 0;
		while ($row = mysql_fetch_array($result)){
			$solicitud = new Solicitud();
			$solicitud->setIdSolicitud($row['idSolicitud']);
			$solicitud->setNombre($row['nombre']);
			$solicitud->setPrecio($row['precio']);
			$solicitud->setDireccion($row['direccion']);
			$solicitud->setHorario($row['horario']);
			$solicitud->setRutaFotografia($row['rutaFotografia']);
			$solicitud->setCantidadCanchas($row['cantidadCanchas']);
			$solicitud->setTelefono($row['telefono']);
			$solicitud->setIdUsuario($row['idUsuario']);
			$vectorData[$i]= $solicitud;
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