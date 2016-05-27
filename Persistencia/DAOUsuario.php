<?php

include_once('Conexion.php');

class DAOUsuario{
	private $conexionBD;

	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearUsuario($usuario){
		$link = $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO usuario (nombre, apellido, nickname, email, fechaNacimiento, sexo, telefono, rutaFotografia) 
		VALUES (
			'".$usuario->getNombre()."',
			'".$usuario->getApellido()."',
			'".$usuario->getNickname()."',
			'".$usuario->getEmail()."',
			'".$usuario->getFechaNacimiento()."',
			'".$usuario->getSexo()."',
			'".$usuario->getTelefono()."',
			'".$usuario->getRutaFotografia()."')";
		mysql_query($query,$link) or die(mysql_error());
		mysql_close($link);
	}

	public function leerUsuario($idUsuario){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM usuario WHERE idUsuario = '$idUsuario' ";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			$usuario = new Usuario();
			$usuario->setIdUsuario($row['idUsuario']);
			$usuario->setNickname($row['nickname']);
			$usuario->setNombre($row['nombre']);
			$usuario->setApellido($row['apellido']);
			$usuario->setEmail($row['email']);
			$usuario->setFechaNacimiento($row['fechaNacimiento']);
			$usuario->setSexo($row['sexo']);
			$usuario->setRutaFotografia($row['rutaFotografia']);
			$usuario->setTelefono($row['telefono']);
			$usuario->setIdEstado($row['idEstadoJugador']);
			$usuario->setIdPerfil($row['idPerfil']);
			$vectorData[$i]= $usuario;
			$i++;
		}
		mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;	
	}

		public function leerUsuarios(){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM usuario";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			$usuario = new Usuario();
			$usuario->setIdUsuario($row['idUsuario']);
			$usuario->setNickname($row['nickname']);
			$usuario->setNombre($row['nombre']);
			$usuario->setApellido($row['apellido']);
			$usuario->setEmail($row['email']);
			$usuario->setFechaNacimiento($row['fechaNacimiento']);
			$usuario->setSexo($row['sexo']);
			$usuario->setRutaFotografia($row['rutaFotografia']);
			$usuario->setTelefono($row['telefono']);
			$usuario->setIdEstado($row['idEstadoJugador']);
			$usuario->setIdPerfil($row['idPerfil']);
			$vectorData[$i]= $usuario;
			$i++;
		}
		mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;	
	}

	public function actualizarusuario($usuario){
		$link = $this->conexionBD->obtenerConexion();
		$query = "UPDATE Usuario SET 
		idUsuario = '".$usuario->getIdUsuario()."',
		nickname = '".$usuario->getNickname()."',
		nombre = '".$usuario->getNombre()."',
		apellido = '".$usuario->getApellido()."',
		email = '".$usuario->getEmail()."',
		fechaNacimiento = '".$usuario->getFechaNacimiento()."',
		sexo = '".$usuario->getSexo()."',
		rutaFotografia = '".$usuario->getRutaFotografia()."',
		telefono = '".$usuario->getTelefono()."',
		idEstadoJugador = '".$usuario->getIdEstado()."',
		idPerfil = '".$usuario->getIdPerfil()."'
		WHERE idUsuario = '".$usuario->getIdUsuario()."'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);
	}

	public function eliminarusuario($idUsuario){
		$link=$this->conexionBD->obtenerConexion();
		$query="DELETE FROM Usuario WHERE idUsuario = '$idUsuario'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);

	}

	public function buscarUsuario($idUsuario){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM usuario WHERE idUsuario = '$idUsuario'";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i= 0;
		while ($row = mysql_fetch_array($result)){
			$usuario= new Usuario();
			$usuario->setIdusuario($row['idUsuario']);
			$usuario->setNickname($row['nickname']);
			$usuario->setNombre($row['nombre']);
			$usuario->setApellido($row['apellido']);
			$usuario->setEmail($row['email']);
			$usuario->setFechaNacimiento($row['fechaNacimiento']);
			$usuario->setSexo($row['sexo']);
			$usuario->setRutaFotografia($row['rutaFotografia']);
			$usuario->setTelefono($row['telefono']);
			$usuario->setIdEstado($row['idEstadoJugador']);
			$usuario->setIdPerfil($row['idPerfil']);
			$vectorData[$i]= $usuario;
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