<?php

include_once('Conexion.php');

class DAOUsuario{
	private $conexionBD;

	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearUsuario($usuario){
		$link = $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO usuario (idUsuario, nickname, nombre, apellido, email, fechaNacimiento, sexo, rutaFotografia, telefono, estadojugador_idestadojugador, perfil_idperfil) 
		VALUES ('".$usuario->getIdUsuario()."',
			'".$usuario->getNombre()."',
			'".$usuario->getApellido()."',
			'".$usuario->getNickname()."',
			'".$usuario->getEmail()."',
			'".$usuario->getFechaNacimiento()."',
			'".$usuario->getSexo()."',
			'".$usuario->getRutaFotografia()."',
			'".$usuario->getTelefono()."',
			'".$usuario->getIdEstado()."',
			'".$usuario->getIdPerfil()."')";
		mysql_query($query,$link) or die(mysql_error());
		mysql_close($link);
	}

	public function leerusuario($idusuario){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM usuario WHERE idUsuario = '$idusuario' ";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			$usuario = new usuario();
			$usuario->setIdusuario($row['idUsuario']);
			$usuario->setNickname($row['nickname']);
			$usuario->setNombre($row['nombre']);
			$usuario->setApellido($row['apellido']);
			$usuario->setEmail($row['email']);
			$usuario->setFechaNacimiento($row['fechaNacimiento']);
			$usuario->setSexo($row['sexo']);
			$usuario->setRutaFotografia($row['rutaFotografia']);
			$usuario->setTelefono($row['telefono']);
			$usuario->setIdEstado($row['estadojugador_idestadojugador']);
			$usuario->setIdPerfil($row['perfil_idperfil']);
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
		$query = "UPDATE usuario SET 
		idUsuario = '".$usuario->getIdUsuario()."',
		nickname = '".$usuario->getNickname()."',
		nombre = '".$usuario->getNombre()."',
		apellido = '".$usuario->getApellido()."',
		email = '".$usuario->getEmail()."',
		fechaNacimiento = '".$usuario->getFechaNacimiento()."',
		sexo = '".$usuario->getSexo()."',
		rutaFotografia = '".$usuario->getRutaFotografia()."',
		telefono = '".$usuario->getTelefono()."',
		estadojugador_idestadojugador = '".$usuario->getIdEstado()."',
		perfil_idperfil = '".$usuario->getIdPerfil()."'
		WHERE idusuario = '".$usuario->getIdusuario()."'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);
	}

	public function eliminarusuario($idusuario){
		$link=$this->conexionBD->obtenerConexion();
		$query="DELETE FROM usuario WHERE idusuario = '$idusuario'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);

	}

}

?>