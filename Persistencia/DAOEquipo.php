<?php
include_once('Conexion.php');

class DAOEquipo{

	private $conexionBD;
	function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function crearEquipo($equipo){
		$link = $this->conexionBD->obtenerConexion();
		$query = "INSERT INTO equipo(color, idUsuario, idPartido) 
		VALUES(
		'".$equipo->getColor()."',
		'".$equipo->getIdUsuario()."',
		'".$equipo->getIdPartido()."')";

		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);	
	}

	public function actualizarEquipo($equipo){
		$link = $this->conexionBD->obtenerConexion();
		$query="UPDATE equipo SET
		$color = '".$equipo->getColor()."',
		$idUsuario = '".$equipo->getIdUsuario()."',
		$idPartido = '".$equipo->getIdPartido()."'
		WHERE idComentario = '".$comentario->getIdComentario()."'  
		";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);

	}

	public function eliminarEquipo($idEquipo){
		$link= $this->conexionBD->obtenerConexion();
		$query="DELETE FROM equipo WHERE idEquipo = '$idEquipo'";
		mysql_query($query,$link) or die (mysql_error());
		mysql_close($link);
	}

	public function buscarEquipo($idEquipo){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM equipo WHERE idEquipo= '$idEquipo'";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i= 0;

		while($row = mysql_fetch_array($result)){
			$equipo = new Equipo();
			$equipo->setIdEquipo($row['idEquipo']);
			$equipo->setColor($row['color']);
			$equipo->setIdUsuario($row['idUsuario']);
			$equipo->setIdPartido($row['idPartido']);
			$vectorData[$i]= $equipo;
			$i++;
		}
		mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;
	}

	public function listarEquipos(){
				$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM equipo";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i= 0;

		while($row = mysql_fetch_array($result)){
			$equipo = new Equipo();
			$equipo->setIdEquipo($row['idEquipo']);
			$equipo->setColor($row['color']);
			$equipo->setIdUsuario($row['idUsuario']);
			$equipo->setIdPartido($row['idPartido']);
			$vectorData[$i]= $equipo;
			$i++;
		}
		mysql_close($link);
		if(empty($vectorData)){
			return null;
		}
		return $vectorData;
	}

	public function obtenerJugadores($idPartido){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT U.nombre, U.apellido, U.rutaFotografia, U.email FROM usuario U INNER JOIN equipo E on U.idUsuario = E.idUsuario WHERE E.idPartido = '$idPartido'";
		$result = mysql_query($query, $link) or die (mysql_error());
		$i=0;
		while ($row = mysql_fetch_array($result)) {
			$usuario = new Usuario();
			$usuario->setNombre($row['nombre']);
			$usuario->setApellido($row['apellido']);
			$usuario->setRutaFotografia($row['rutaFotografia']);
			$usuario->setEmail($row['email']);
			$vectorData[$i]= $usuario;
			$i++;
		}
		mysql_close($link);
		if (empty($vectorData)) return null;
		return $vectorData;
	}

	public function contarPartidos($idUsuario){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT * FROM equipo WHERE idUsuario = '".$idUsuario."';";
		$result = mysql_query($query,$link) or die (mysql_error());
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			$equipo = new Equipo();
			$equipo->setIdUsuario($row['idUsuario']);
			$vectorData[$i]= $equipo;
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