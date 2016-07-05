<?php
include_once('Conexion.php');

class DAOListaSolicitudes{

	private $conexionBD;
	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearSolicitud($solicitud){
		$link = $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO listasolicitudes (idPartido, idUsuario, idEstado)
		VALUES(
		'".$solicitud->getIdPartido()."',
		'".$solicitud->getIdUsuario()."',
		'2')";

		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);	
	}

	public function buscarSolicitudes($idPartido){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT DISTINCT idSolicitud, idUsuario FROM listasolicitudes WHERE idPartido= '$idPartido' AND idEstado = 2";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i= 0;

		while($row = mysql_fetch_array($result)){
			$listasolicitudes = new ListaSolicitudes();
			$listasolicitudes->setIdSolicitud($row['idSolicitud']);
			$listasolicitudes->setIdUsuario($row['idUsuario']);
			$vectorData[$i]= $listasolicitudes;
			$i++;
		}
		mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;
	}

	public function leerSolicitud($idSolicitud){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM listasolicitudes WHERE idSolicitud= '$idSolicitud'";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i= 0;

		while($row = mysql_fetch_array($result)){
			$listasolicitudes = new ListaSolicitudes();
			$listasolicitudes->setIdSolicitud($row['idSolicitud']);
			$listasolicitudes->setIdPartido($row['idPartido']);
			$listasolicitudes->setIdUsuario($row['idUsuario']);
			$listasolicitudes->setIdEstado($row['idEstado']);
			$vectorData[$i]= $listasolicitudes;
			$i++;
		}
		mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;
	}

	public function verificarSolicitud($idPartido, $idUsuario){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT idUsuario FROM listasolicitudes WHERE idPartido= '".$idPartido."' AND idUsuario = '".$idUsuario."'";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i= 0;

		while($row = mysql_fetch_array($result)){
			$listasolicitudes = new ListaSolicitudes();
			$listasolicitudes->setIdUsuario($row['idUsuario']);
			$vectorData[$i]= $listasolicitudes;
			$i++;
		}
		mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;
	}

	public function eliminarSolicitud($idSolicitud){
		$link= $this->conexionBD->obtenerConexion();
		$query="DELETE FROM listasolicitudes WHERE idSolicitud = '$idSolicitud'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);
	}



}

?>