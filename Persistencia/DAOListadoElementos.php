<?php

include_once('Conexion.php');

class DAOListadoElementos{
	private $conexionBD;

	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearlistadoelementos($estado){
		$link = $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO listadoelementos (idlistadoelementos,nombre,descripcion) 
		VALUES ('".$estado->getIdlistadoelementos()."',
			'".$estado->getNombre()."',
			'".$estado->getDescripcion()."')";
		mysql_query($query,$link) or die(mysql_error());
		mysql_close($link);
	}

	public function leerlistadoelementos($idEstado){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM listadoelementos WHERE idlistadoelementos = '$idEstado'";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			$listadoelementos = new listadoelementos();
			$listadoelementos->setIdlistadoelementos($row['idlistadoelementos']);
			$listadoelementos->setNombre($row['nombre']);
			$listadoelementos->setDescripcion($row['descripcion']);
			$vectorData[$i]= $listadoelementos;
			$i++;
		}
		mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;	
	}

	public function actualizarlistadoelementos($listadoelementos){
		$link = $this->conexionBD->obtenerConexion();
		$query = "UPDATE listadoelementos SET 
		idlistadoelementos = '".$listadoelementos->getIdlistadoelementos()."',
		nombre = '".$listadoelementos->getNombre()."',
		descripcion='".$listadoelementos->getDescripcion()."'
		WHERE idlistadoelementos = '".$listadoelementos->getIdlistadoelementos()."'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);
	}

	public function eliminarlistadoelementos($idlistadoelementos){
		$link=$this->conexionBD->obtenerConexion();
		$query="DELETE FROM listadoelementos WHERE idlistadoelementos = '$idlistadoelementos'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);

	}

}

?>