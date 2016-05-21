<?php

include_once('Conexion.php');

class DAOSolicitud{
	private $conexionBD;

	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearSolicitud($recinto){
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

	public function leerSolicitud($idRecinto){
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

	public function actualizarSolicitud($usuario){
		$link = $this->conexionBD->obtenerConexion();
		$query = "UPDATE usuario SET 
		idUsuario = '".$usuario->getIdUsuario()."',
		nickname = '".$usuario->getNickname()."',
		nombre = '".$usuario->getNombre()."',
		apellido = '".$usuario->getApellido()."',
		email = '".$usuario->getEmail()."',
		fechaNacimiento = '".$usuario->getFechaNacimiento()."',
		sexo = '".$usuario->getSexo()."',
		rutaFotografia = '".$usuario->getRutaFotografia()."',
		telefono = '".$usuario->getTelefono()."',
		estadojugador_idestadojugador = '".$usuario->getIdEstado()."',
		perfil_idperfil = '".$usuario->getIdPerfil()."'
		WHERE idusuario = '".$usuario->getIdusuario()."'";
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