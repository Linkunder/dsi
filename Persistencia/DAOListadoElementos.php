<?php

include_once('Conexion.php');

class DAOListadoElementos{
	private $conexionBD;

	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearListadoElementos($listado){
		$link = $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO listadoelementos (idRecinto, idElementoDeportivo, cantidad) 
		VALUES ('".$listado->getIdRecinto()."',
			'".$listado->getIdElemento()."',
			'".$listado->getCantidad()."')";
		mysql_query($query,$link) or die(mysql_error());
		mysql_close($link);
	}

	

}

?>