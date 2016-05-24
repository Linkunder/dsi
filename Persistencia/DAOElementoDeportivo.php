<?php

include_once('Conexion.php');

class DAOElementoDeportivo{
	private $conexionBD;

	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearElementoDeportivo($elementoDeportivo){
		$link = $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO elementodeportivo (nombre, precio) 
		VALUES ('".$elementodeportivo->getNombre()."',
			'".$elementodeportivo->getPrecio()."')";
		mysql_query($query,$link) or die(mysql_error());
		mysql_close($link);
	}

	public function leerElementoDeportivo($idElementoDeportivo){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM elementodeportivo WHERE idElementoDeportivo = '$idElementoDeportivo' ";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			$elementodeportivo = new ElementoDeportivo();
			$elementodeportivo->setNombre($row['nombre']);
			$elementodeportivo->setDescripcion($row['precio']);
			$vectorData[$i]= $elementodeportivo;
			$i++;
		}
		mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;	
	}

	public function actualizarElementoDeportivo($elementoDeportivo){
		$link = $this->conexionBD->obtenerConexion();
		$query = "UPDATE elementodeportivo SET 
		nombre = '".$elementoDeportivo->getNombre()."',
		precio='".$elementoDeportivo->getPrecio()."'
		WHERE idElementoDeportivo = '".$elementoDeportivo->getIdElementoDeportivo()."'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);
	}

	public function eliminarElementoDeportivo($idElementoDeportivo){
		$link=$this->conexionBD->obtenerConexion();
		$query="DELETE FROM elementodeportivo WHERE idElementoDeportivo = '$idElementoDeportivo'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);

	}

}

?>