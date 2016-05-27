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
		$query = "SELECT U.nombre, U.apellido FROM usuario U INNER JOIN listacontactos L on
		U.idUsuario = L.idContacto WHERE L.idUsuario = '$idUsuario' ";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			$usuario = new Usuario();
			$usuario->setNombre($row['nombre']);
			$usuario->setApellido($row['apellido']);
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