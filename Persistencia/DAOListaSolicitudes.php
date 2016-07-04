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
		$query = "SELECT DISTINCT idUsuario FROM listasolicitudes WHERE idPartido= '$idPartido' AND idEstado = 2";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i= 0;

		while($row = mysql_fetch_array($result)){
			$listasolicitudes = new ListaSolicitudes();
			//$listasolicitudes->setIdPartido($row['idPartido']);
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



}

?>