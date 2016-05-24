<?php
include_once('Conexion.php');

class DAOPerfil{

	private $conexionBD;
	function __construct(){
		$this->conexionBD = new Conexion();
	}
	public function crearPerfil($perfil){
		$link = $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO perfil (nombre, descripcion) VALUES(
		'".$perfil->getNombre()."',
		'".$perfil->getDescripcion()."')";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);	
	}

	public function actualizarPerfil($perfil){
		$link = $this->conexionBD->obtenerConexion();
		$query = "UPDATE perfil SET
		$nombre = '".$perfil->getNombre()."',
		$descripcion = '".$perfil->getDescripcion()."'
		WHERE idPerfil = '".$perfil->getIdPerfil()."'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);
	}

	public function eliminarPerfil($idPerfil){
		$link= $this->conexionBD->obtenerConexion();
		$query="DELETE FROM perfil WHERE idPerfil = '$idPerfil'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);
	}
	public function buscarPerfil($idPerfil){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM perfil WHERE perfil = '$idPerfil'";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i= 0;
		while($row = mysql_fetch_array($result)){
			$perfil = new Perfil();
			$perfil->setIdPerfil($row['idPerfil']);
			$perfil->setNombre($row['nombre']);
			$perfil->setDescripcion($row['descripcion']);
			$vectorData[$i]=$comentario;
			$i++;
		}
				mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;
	}

	public function listarPerfiles(){
			$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM perfil";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i= 0;
		while($row = mysql_fetch_array($result)){
			$perfil = new Perfil();
			$perfil->setIdPerfil($row['idPerfil']);
			$perfil->setNombre($row['nombre']);
			$perfil->setDescripcion($row['descripcion']);
			$vectorData[$i]=$comentario;
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