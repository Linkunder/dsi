<?php
include_once('Conexion.php');


class DAOComentario{

	private $conexionBD;
	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearComentario($comentario){
		$link = $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO comentario (idRecinto,idUsuario, asunto, contenido, fecha, hora)
		VALUES(
			'".$comentario->getIdRecinto()."',
			'".$comentario->getIdUsuario()."', 
			'".$comentario->getAsunto()."', 
			'".$comentario->getContenido()."', 
			'".$comentario->getFecha()."',
			'".$comentario->getHora()."')";

		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);	
	}

	public function actualizarComentario($comentario){
		$link = $this->conexionBD->obtenerConexion();
		$query = "UPDATE comentario SET 
		$idComentario = '".$comentario->getIdComentario()."',
		$idRecinto = '".$comentario->getIdRecinto()."',
		$idUsuario = '".$comentario->getIdUsuario()."',
		$asunto = '".$comentario->getAsunto()."',
		$contenido = '".$comentario->getContenido()."',
		$fecha = '".$comentario->getFecha()."',
		$hora = '".$comentario->getHora()."' 
		WHERE idComentario = '".$comentario->getIdComentario()."'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);

	}

	public function eliminarComentario($idComentario){
		$link= $this->conexionBD->obtenerConexion();
		$query="DELETE FROM comentario WHERE idComentario = '$idComentario'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);
	}

	public function buscarComentario($idComentario){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM comentario WHERE idComentario = '$idComentario'";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i= 0;
		while ($row = mysql_fetch_array($result)){
			$comentario = new Comentario();
			$comentario->setIdComentario($row['idComentario']);
			$comentario->setIdRecinto($row['idRecinto']);
			$comentario->setIdUsuario($row['idUsuario']);
			$comentario->setAsunto($row['asunto']);
			$comentario->setContenido($row['contenido']);
			$comentario->setFecha($row['fecha']);
			$comentario->setHora($row['hora']);
			$vectorData[$i]= $comentario;
			$i++;
		}
		mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;
	}

	public function listarComentarios(){
				$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM comentario";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i= 0;
		while ($row = mysql_fetch_array($result)){
			$comentario = new Comentario();
			$comentario->setIdComentario($row['idComentario']);
			$comentario->setIdRecinto($row['idRecinto']);
			$comentario->setIdUsuario($row['idUsuario']);
			$comentario->setAsunto($row['asunto']);
			$comentario->setContenido($row['contenido']);
			$comentario->setFecha($row['fecha']);
			$comentario->setHora($row['hora']);
			$vectorData[$i]= $comentario;
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