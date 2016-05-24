<?php

include_once('Conexion.php');

class DAOEstadoRecinto{
	private $conexionBD;

	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearEstadoRecinto($estado){
		$link = $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO estadorecinto (nombre,descripcion) 
		VALUES ('".$estado->getNombre()."',
			'".$estado->getDescripcion()."')";
		mysql_query($query,$link) or die(mysql_error());
		mysql_close($link);
	}

	public function leerEstadoRecinto($idEstado){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM estadorecinto WHERE idEstadoRecinto = '$idEstado'";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			$estadoRecinto = new EstadoRecinto();
			$estadoRecinto->setNombre($row['nombre']);
			$estadoRecinto->setDescripcion($row['descripcion']);
			$vectorData[$i]= $estadoRecinto;
			$i++;
		}
		mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;	
	}

	public function listarEstadoRecinto(){
				$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM estadorecinto";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			$estadoRecinto = new EstadoRecinto();
			$estadoRecinto->setNombre($row['nombre']);
			$estadoRecinto->setDescripcion($row['descripcion']);
			$vectorData[$i]= $estadoRecinto;
			$i++;
		}
		mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;	
	}

	public function actualizarEstadoRecinto($estadoRecinto){
		$link = $this->conexionBD->obtenerConexion();
		$query = "UPDATE estadorecinto SET 
		nombre = '".$estadoRecinto->getNombre()."',
		descripcion='".$estadoRecinto->getDescripcion()."'
		WHERE idEstadoRecinto = '".$estadoRecinto->getIdEstadoRecinto()."'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);
	}

	public function eliminarEstadoRecinto($idEstadoRecinto){
		$link=$this->conexionBD->obtenerConexion();
		$query="DELETE FROM estadorecinto WHERE idEstadoRecinto = '$idEstadoRecinto'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);

	}

}

?>