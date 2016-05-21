<?php

include_once('Conexion.php');

class DAORecinto{
	private $conexionBD;

	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearRecinto($recinto){
		$link = $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO recinto (idRecinto, nombre, precio, direecion, horario, rotaFotografia, linkMapa, cantidadCanchas, puntuacion, telefono, EstadoRecinto_idEstadoRecinto) 
		VALUES ('".$recinto->getIdRecinto()."',
			'".$recinto->getNombre()."',
			'".$recinto->getPrecio()."',
			'".$recinto->getDireccion()."',
			'".$recinto->getHorario()."',
			'".$recinto->getRutaFotografia()."',
			'".$recinto->getLinkMapa()."',
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
			$recinto->setLinkMapa($row['linkMapa']);
			$recinto->setCantidadCanchas($row['cantidadCanchas']);
			$recinto->setPuntuacion($row['puntuacion']);
			$recinto->setTelefono($row['telefono']);
			$recinto->setIdEstado($row['EstadoRecinto_idEstadoRecinto']);
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
		$query = "UPDATE usuario SET 
		idRecinto = '".$usuario->getIdUsuario()."',
		nombre = '".$usuario->getNickname()."',
		precio = '".$usuario->getNombre()."',
		direccion = '".$usuario->getApellido()."',
		horario = '".$usuario->getEmail()."',
		rutaFotografia = '".$usuario->getRutaFotografia()."',
		linkMapa = '".$usuario->getFechaNacimiento()."',
		cantidadCanchas = '".$usuario->getSexo()."',
		puntuacion = '".$usuario->getIdEstado()."',
		telefono = '".$usuario->getTelefono()."',
		EstadoRecinto_idEstadoRecinto = '".$usuario->getIdPerfil()."'
		WHERE idRecinto = '".$usuario->getIdusuario()."'";
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
			$recinto->setLinkMapa($row['linkMapa']);
			$recinto->setCantidadCanchas($row['cantidadCanchas']);
			$recinto->setPuntuacion($row['puntuacion']);
			$recinto->setTelefono($row['telefono']);
			$recinto->setIdEstado($row['EstadoRecinto_idEstadoRecinto']);
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