<?php

include_once('Conexion.php');

class DAOListaContactos{
	private $conexionBD;

	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearListaContactos($lista){
		$link = $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO listacontactos (idUsuario, idContacto) 
		VALUES ('".$lista->getIdUsuario()."',
			'".$lista->getIdContacto()."')";
		mysql_query($query,$link) or die(mysql_error());
		mysql_close($link);
	}

	public function leerContactos($idUsuario){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM listacontactos WHERE idUsuario = '$idUsuario' ";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			$ListaContactos = new ListaContactos();
			$ListaContactos->setIdUsuario($row['idUsuario']);
			$ListaContactos->setIdContacto($row['idContacto']);
			$vectorData[$i]= $ListaContactos;
			$i++;
		}
		mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;	
	}

	public function leerContactosUsuario($idUsuario){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT U.idUsuario, U.nombre, U.apellido, U.rutaFotografia, U.email, U.telefono, U.nickname FROM usuario U INNER JOIN listacontactos L on
		U.idUsuario = L.idContacto WHERE L.idUsuario = '$idUsuario' ";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			$usuario = new Usuario();
			$usuario->setIdUsuario($row['idUsuario']);
			$usuario->setNombre($row['nombre']);
			$usuario->setApellido($row['apellido']);
			$usuario->setRutaFotografia($row['rutaFotografia']);
			$usuario->setEmail($row['email']);
			$usuario->setTelefono($row['telefono']);
			$usuario->setNickname($row['nickname']);
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