<?php

class DAOEstadoPartido{

	private $conexionBD;
	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearEstadoPartido($estado){
		$link = $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO estadopartido (nombre, descripcion) 
		VALUES(
			'".$estado->getNombre()."',
			'".$estado->getDescripcion()"')";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);	

	}	

	public function actualizarEstadoPartido($estado){
		$link = $this->conexionBD->obtenerConexion();
		$query = "UPDATE estadopartido SET 
		$idEstado = '".$estado->getIdEstadoPartido()."',
		$nombre = '".$estado->getNombre()."',
		$descripcion = '".$estado->getDescripcion()."'
		WHERE idEstado = '".$estado->getIdEstado()."'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);

	}
		public function eliminarEstadoPartido($idEstado){
		$link= $this->conexionBD->obtenerConexion();
		$query="DELETE FROM estadopartido WHERE idEstado = '$idEstado'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);
	}

	public function buscarEstadoPartido($idEstado){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM estadopartido WHERE idEstado='$idEstado'";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i= 0;
		while ($row = mysql_fetch_array($result)){
			$estadoPartido = new EstadoPartido();
			$estadoPartido->setIdEstadoPartido($row['idEstado']);
			$estadoPartido->setNombre($row['nombre']);
			$estadoPartido->setDescripcion($row['descripcion']);
			$vectorData[$i]= $estadoPartido;
			$i++;			
		}		
				mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;
	}

	public function listarEstadosPartido(){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM estadopartido";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i= 0;
		while ($row = mysql_fetch_array($result)){
			$estadoPartido = new EstadoPartido();
			$estadoPartido->setIdEstadoPartido($row['idEstado']);
			$estadoPartido->setNombre($row['nombre']);
			$estadoPartido->setDescripcion($row['descripcion']);
			$vectorData[$i]= $estadoPartido;
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