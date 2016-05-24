<?php

include_once('Conexion.php');

class DAOCategoria{
	private $conexionBD;

	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearCategoria($categoria){
		$link = $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO categoria (nombre,descripcion) 
		VALUES ('".$categoria->getNombre()."',
			'".$categoria->getDescripcion()."')";
		mysql_query($query,$link) or die(mysql_error());
		mysql_close($link);
	}

	public function leerCategoria($idCategoria){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM categoria WHERE idCategoria = '$idCategoria' ";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			$categoria = new Categoria();
			$categoria->setNombre($row['nombre']);
			$categoria->setDescripcion($row['descripcion']);
			$vectorData[$i]= $categoria;
			$i++;
		}
		mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;	
	}

	public function actualizarCategoria($categoria){
		$link = $this->conexionBD->obtenerConexion();
		$query = "UPDATE categoria SET 
		nombre = '".$categoria->getNombre()."',
		descripcion='".$categoria->getDescripcion()."'
		WHERE idCategoria = '".$categoria->getIdCategoria()."'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);
	}

	public function eliminarCategoria($idCategoria){
		$link=$this->conexionBD->obtenerConexion();
		$query="DELETE FROM categoria WHERE idCategoria = '$idCategoria'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);

	}

}

?>