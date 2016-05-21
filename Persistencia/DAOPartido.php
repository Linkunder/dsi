<?php

include_once('Conexion.php');

class DAOPartido{
	private $conexionBD;

	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearPartido($partido){
		$link = $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO partido (idPartido, fecha, hora, cuota, EstadoPartido_idEstado, Recinto_idRecinto, TercerTiempo_idTercerTiempo)
		VALUES ('".$partido->getIdPartido()."',
			'".$partido->getFecha()."',
			'".$partido->getHora()."',
			'".$partido->getCuota()."',
			'".$partido->getIdEstado()."',
			'".$partido->getIdRecinto()."',
			'".$partido->getIdTercerTiempo()."')";
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
			$partido->setidPartido($row['idPartido']);
			$partido->setFecha($row['fecha']);
			$partido->setHora($row['hora']);
			$partido->setCuota($row['cuota']);
			$partido->setIdEstado($row['EstadoPartido_idEstado']);
			$partido->setIdRecinto($row['Recinto_idRecinto']);
			$partido->setIdTercerTiempo($row['TercerTiempo_idTercerTiempo']);
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
		idpartido = '".$partido->getidpartido()."',
		fecha = '".$partido->getFecha()."',
		hora='".$partido->getHora()."'
		cuota='".$partido->getCuota()."'
		EstadoPartido_idEstado='".$partido->getIdEstado()."'
		Recinto_idRecinto='".$partido->getIdRecinto()."'
		TercerTiempo_idTercerTiempo='".$partido->getIdTercerTiempo()."'
		WHERE idpartido = '".$partido->getidpartido()."'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);
	}



}

?>