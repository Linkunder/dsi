<?php

include_once('Conexion.php');

class DAOLocal{
	private $conexionBD;

	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearLocal($local){
		$link = $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO local (nombre,direccion, rutaFotografia,linkMapa)
		VALUES (
			'".$local->getNombre()."',
			'".$local->getDireccion()."',
			'".$local->getRutaFoto()."',
			'".$local->getLinkMapa()."')";
		mysql_query($query,$link) or die(mysql_error());
		mysql_close($link);
	}

	public function leerLocal($idLocal){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM local WHERE idLocal = '$idLocal' ";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			$local = new Categoria();
			$local->setNombre($row['nombre']);
			$local->setDireccion($row['direccion']);
			$local->setRutaFoto($row['rutaFotografia']);
			$local->setLinkMapa($row['linkMapa']);
			$vectorData[$i]= $local;
			$i++;
		}
		mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;	
	}

	public function actualizarLocal($local){
		$link = $this->conexionBD->obtenerConexion();
		$query = "UPDATE local SET 
		nombre = '".$local->getNombre()."',
		direccion='".$local->getDireccion()."'
		rutaFotografia='".$local->getRutaFoto()."'
		linkMapa='".$local->getLinkMapa()."'
		WHERE idLocal = '".$local->getidLocal()."'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);
	}

	public function eliminarLocal($idLocal){
		$link=$this->conexionBD->obtenerConexion();
		$query="DELETE FROM local WHERE idLocal = '$idLocal'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);

	}

}

?>