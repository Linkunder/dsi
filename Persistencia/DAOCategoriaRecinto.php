<?php

include_once('Conexion.php');

class DAOcategoriarecinto{
	private $conexionBD;

	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearCategoriaRecinto($categoriaRecinto){
		$link = $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO categoriarecinto (idCategoria, idRecinto) 
		VALUES ('".$categoriaRecinto->getIdCategoria()."',
			'".$categoriaRecinto->getIdRecinto()."')";
		mysql_query($query,$link) or die(mysql_error());
		mysql_close($link);
	}

	public function leercategoriarecinto($idcategoriarecinto){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM categoriarecinto WHERE idcategoriarecinto = '$idcategoriarecinto' ";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			$categoriarecinto = new categoriarecinto();
			$categoriarecinto->setIdcategoriarecinto($row['idcategoriarecinto']);
			$categoriarecinto->setNombre($row['nombre']);
			$categoriarecinto->setDescripcion($row['descripcion']);
			$vectorData[$i]= $categoriarecinto;
			$i++;
		}
		mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;	
	}

	public function actualizarcategoriarecinto($categoriarecinto){
		$link = $this->conexionBD->obtenerConexion();
		$query = "UPDATE categoriarecinto SET 
		idcategoriarecinto = '".$categoriarecinto->getIdcategoriarecinto()."',
		nombre = '".$categoriarecinto->getNombre()."',
		descripcion='".$categoriarecinto->getDescripcion()."'
		WHERE idcategoriarecinto = '".$categoriarecinto->getIdcategoriarecinto()."'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);
	}

	public function eliminarcategoriarecinto($idcategoriarecinto){
		$link=$this->conexionBD->obtenerConexion();
		$query="DELETE FROM categoriarecinto WHERE idcategoriarecinto = '$idcategoriarecinto'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);

	}

}

?>