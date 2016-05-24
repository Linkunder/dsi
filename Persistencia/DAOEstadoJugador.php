<?php

class DAOEstadoJugador{

	private $conexionBD;
	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearEstadoJugador($estadoJugador){
		$link = $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO estadojugador (nombre, descripcion) 
		VALUES(
			'".$estadoJugador->getNombre()."',
			'".$estadoJugador->getDescripcion()"')";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);	

	}	

	public function actualizarEstadoJugador($estadoJugador){
		$link = $this->conexionBD->obtenerConexion();
		$query = "UPDATE estadojugador SET 
		$idComentario = '".$estadoJugador->getIdComentario()."',
		$nombre = '".$estadoJugador->getNombre()."',
		$descripcion = '".$estadoJugador->getDescripcion()."'
		WHERE idEstadoJugador = '".$estadoJugador->getIdComentario()."'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);

	}
		public function eliminarEstadoJugador($idEstadoJugador){
		$link= $this->conexionBD->obtenerConexion();
		$query="DELETE FROM estadojugador WHERE idEstadoJugador = '$idEstadoJugador'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);
	}

	public function buscarEstadoJugador($idEstadoJugador){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM estadojugador WHERE idEstadoJugador='$idEstadoJugador'";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i= 0;
		while ($row = mysql_fetch_array($result)){
			$estadoJugador = new EstadoJugador();
			$estadoJugador->setIdEstadoJugador($row['idEstadoJugador']);
			$estadoJugador->setNombre($row['nombre']);
			$estadoJugador->setDescripcion($row['descripcion']);
			$vectorData[$i]= $estadoJugador;
			$i++;			
		}		
				mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;
	}

	public function listarEstadosJugador(){
				$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM estadojugador";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i= 0;
		while ($row = mysql_fetch_array($result)){
			$estadoJugador = new EstadoJugador();
			$estadoJugador->setIdEstadoJugador($row['idEstadoJugador']);
			$estadoJugador->setNombre($row['nombre']);
			$estadoJugador->setDescripcion($row['descripcion']);
			$vectorData[$i]= $estadoJugador;
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