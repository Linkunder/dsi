<?php
	include_once('Conexion.php');

	class DAOPuntuacion{
		private $conexionBD;

		function __construct(){
			$this->conexionBD= new Conexion();
		}

	public function comprobarPuntuacion($idUsuario, $idRecinto){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT count(*) AS cantidad FROM puntuacion WHERE idUsuario= '$idUsuario' AND idRecinto='$idRecinto'";
		$result = mysql_query($query,$link) or die(mysql_error());
		$i=0;
		while($row = mysql_fetch_array($result)){
			$i= $row['cantidad'];
		}
		mysql_close($link);
		return $i;


	}
	public function crearPuntuacion($idUsuario, $idRecinto, $puntuacion){
		$link =$this->conexionBD->obtenerConexion();
		$query = "INSERT INTO puntuacion (idUsuario, idRecinto, puntuacion) VALUES ('$idUsuario', '$idRecinto', '$puntuacion');";
				mysql_query($query,$link) or die(mysql_error());
		mysql_close($link);

	}
	public function calcularPuntuacionRecinto($idRecinto){

		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT AVG(puntuacion) as promedio from puntuacion WHERE idRecinto = $idRecinto ";
		$result = mysql_query($query,$link) or die (mysql_error());
		$promedio=0;
		while($row = mysql_fetch_array($result)){
			$promedio = $row['promedio'];
		}
		mysql_close($link);
		return $promedio;

	}
	public function valoracionUsuario($idUsuario, $idRecinto){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT puntuacion FROM puntuacion WHERE idUsuario= '$idUsuario' AND idRecinto='$idRecinto'";
		$result = mysql_query($query,$link) or die(mysql_error());
		$i=0;
		while($row = mysql_fetch_array($result)){
			$i= $row['puntuacion'];
		}
		mysql_close($link);
		return $i;


	}


	}


?>