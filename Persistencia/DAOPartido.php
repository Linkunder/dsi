<?php

include_once('Conexion.php');

class DAOPartido{
	private $conexionBD;

	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearPartido($partido){
		$link = $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO partido (fecha, hora, cuota, idEstado, idRecinto, idTercerTiempo, idUsuario)
		VALUES ('".$partido->getFecha()."',
			'".$partido->getHora()."',
			'".$partido->getCuota()."',
			'".$partido->getIdEstado()."',
			'".$partido->getIdRecinto()."',
			'".$partido->getIdTercerTiempo()."',
			'".$partido->getIdUsuario()."')";
		mysql_query($query,$link) or die(mysql_error());
		mysql_close($link);
	}

	public function leerPartido($idPartido){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM partido WHERE idPartido = '$idPartido' ";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			$partido = new Partido();
			$partido->setFecha($row['fecha']);
			$partido->setHora($row['hora']);
			$partido->setCuota($row['cuota']);
			$partido->setIdEstado($row['idEstado']);
			$partido->setIdRecinto($row['idRecinto']);
			$partido->setIdTercerTiempo($row['idTercerTiempo']);
			$partido->setIdUsuario($row['idUsuario']);
			$vectorData[$i]= $partido;
			$i++;
		}
		mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;	
	}

		public function obtenerPartidos(){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM partido ";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			$partido = new Partido();
			$partido->setIdPartido($row['idPartido']);
			$partido->setFecha($row['fecha']);
			$partido->setHora($row['hora']);
			$partido->setCuota($row['cuota']);
			$partido->setIdEstado($row['idEstado']);
			$partido->setIdRecinto($row['idRecinto']);
			$partido->setIdTercerTiempo($row['idTercerTiempo']);
			$partido->setIdUsuario($row['idUsuario']);
			$vectorData[$i]= $partido;
			$i++;
		}
		mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;	
	}

		public function leerPartidosUsuario($idUsuario){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM partido WHERE idUsuario = '$idUsuario' ";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			$partido = new Partido();
			$partido->setIdPartido($row['idPartido']);
			$partido->setFecha($row['fecha']);
			$partido->setHora($row['hora']);
			$partido->setCuota($row['cuota']);
			$partido->setIdEstado($row['idEstado']);
			$partido->setIdRecinto($row['idRecinto']);
			$partido->setIdTercerTiempo($row['idTercerTiempo']);
			$partido->setIdUsuario($row['idUsuario']);
			$vectorData[$i]= $partido;
			$i++;
		}
		mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;	
	}


	public function actualizarPartido($partido){
		$link = $this->conexionBD->obtenerConexion();
		$query = "UPDATE partido SET 
		fecha = '".$partido->getFecha()."',
		hora='".$partido->getHora()."',
		cuota='".$partido->getCuota()."',
		idEstado='".$partido->getIdEstado()."',
		idRecinto='".$partido->getIdRecinto()."',
		idTercerTiempo='".$partido->getIdTercerTiempo()."',
		idUsuario='".$partido->getIdUsuario()."'
		WHERE idpartido = '".$partido->getidpartido()."'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);
	}

	public function actualizarInformacion($idPartido, $idUltimoTercer){
		$link = $this->conexionBD->obtenerConexion();
		$query = "UPDATE partido SET 
		idTercerTiempo='$idUltimoTercer'
		WHERE idPartido = '$idPartido'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);
	}

	public function obtenerPartidosDisponibles(){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM partido WHERE idEstado = 4 ";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			$partido = new Partido();
			$partido->setIdPartido($row['idPartido']);
			$partido->setFecha($row['fecha']);
			$partido->setHora($row['hora']);
			$partido->setCuota($row['cuota']);
			$partido->setIdEstado($row['idEstado']);
			$partido->setIdRecinto($row['idRecinto']);
			$partido->setIdTercerTiempo($row['idTercerTiempo']);
			$partido->setIdUsuario($row['idUsuario']);
			$vectorData[$i]= $partido;
			$i++;
		}
		mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;	
	}

	public function obtenerPartidosCapitan($idUsuario){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM partido WHERE idEstado = 4 AND idUsuario = '$idUsuario' ";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			$partido = new Partido();
			$partido->setIdPartido($row['idPartido']);
			$partido->setFecha($row['fecha']);
			$partido->setHora($row['hora']);
			$partido->setCuota($row['cuota']);
			$partido->setIdEstado($row['idEstado']);
			$partido->setIdRecinto($row['idRecinto']);
			$partido->setIdTercerTiempo($row['idTercerTiempo']);
			$partido->setIdUsuario($row['idUsuario']);
			$vectorData[$i]= $partido;
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