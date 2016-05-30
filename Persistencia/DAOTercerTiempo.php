<?php

include_once('Conexion.php');

class DAOTercerTiempo{

	private $conexionBD;
	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearTercerTiempo($tercerTiempo){
		$link= $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO tercertiempo(descripcion, hora, idLocal) VALUES(
		'".$tercerTiempo->getDescripcion()."',
		'".$tercerTiempo->getHora()."',
		'".$tercerTiempo->getIdLocal()."')";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);			
	}

	public function actualizarTercerTiempo($tercerTiempo){
		$link = $this->conexionBD->obtenerConexion();
		$query = "UPDATE tercertiempo SET 
		$idTercerTiempo = '".$tercerTiempo->getIdTercerTiempo()."',
		$descripcion = '".$tercerTiempo->getDescripcion()."',
		$hora = '".$tercerTiempo->getHora()."',
		$idLocal = '".$tercerTiempo->getIdLocal()."'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);

	}
	public function eliminarTercerTiempo($idTercerTiempo){
		$link= $this->conexionBD->obtenerConexion();
		$query="DELETE FROM tercertiempo WHERE idTercerTiempo = '$idTercerTiempo'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);
	}

	public function buscarTercerTiempo($idTercerTiempo){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM tercertiempo WHERE idTercerTiempo='$idTercerTiempo'";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i= 0;
		while ($row = mysql_fetch_array($result)){
			$tercerTiempo = new TercerTiempo();
			$tercerTiempo->setIdTercerTiempo($row['idTercerTiempo']);
			$tercerTiempo->setDescripcion($row['descripcion']);
			$tercerTiempo->setHora($row['hora']);
			$tercerTiempo->setIdLocal($row['idLocal']);
			$vectorData[$i]= $tercerTiempo;
			$i++;			
		}		
				mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;		

	}

	public function listarTercerosTiempos(){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM tercertiempo";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i= 0;
		while ($row = mysql_fetch_array($result)){
			$tercerTiempo = new TercerTiempo();
			$tercerTiempo->setIdTercerTiempo($row['idTercerTiempo']);
			$tercerTiempo->setDescripcion($row['descripcion']);
			$tercerTiempo->setHora($row['hora']);
			$tercerTiempo->setIdLocal($row['idLocal']);
			$vectorData[$i]= $tercerTiempo;
			$i++;			
		}		
				mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;		
	}

	public function leerTercerTiempo($idTercerTiempo){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM tercertiempo WHERE idTercerTiempo = '$idTercerTiempo'";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i= 0;
		while ($row = mysql_fetch_array($result)){
			$tercerTiempo = new TercerTiempo();
			$tercerTiempo->setIdTercerTiempo($row['idTercerTiempo']);
			$tercerTiempo->setDescripcion($row['descripcion']);
			$tercerTiempo->setHora($row['hora']);
			$tercerTiempo->setIdLocal($row['idLocal']);
			$vectorData[$i]= $tercerTiempo;
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