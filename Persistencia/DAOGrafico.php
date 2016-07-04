<?php
	include_once('Conexion.php');

	class DAOGrafico{
		private $conexionBD;

		function __construct(){
		$this->conexionBD = new Conexion();
	}

	public function cantidadHombres(){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT COUNT(sexo) as total FROM usuario WHERE sexo = 'hombre';";
		$result = mysql_query($query,$link) or die(mysql_error());
		$numh=0;
		while($row = mysql_fetch_array($result)){
			$numh = $row['total'];
		}
		mysql_close($link);
		return $numh;
	}
	public function cantidadMujeres(){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT COUNT(sexo) as total FROM usuario WHERE sexo = 'mujer';";
		$result = mysql_query($query,$link) or die(mysql_error());
		$numm=0;
		while($row = mysql_fetch_array($result)){
			$numm = $row['total'];
		}
		mysql_close($link);
		return $numm;
	}
	public function edadJugadores(){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT YEAR(CURDATE())-YEAR(`fechaNacimiento`) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(fechaNacimiento ,'%m-%d'), 0, -1) AS edad , count(*) as cantidad FROM `usuario` WHERE idPerfil = 1 GROUP BY edad ";
		$result = mysql_query($query,$link) or die (mysql_error());
	
		$vectorData= $result;
		mysql_close($link);

		return $vectorData;
	}
	public function recintosSuperficie(){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT superficie, count(*) as cantidad FROM recinto GROUP BY superficie";
		$result = mysql_query($query,$link) or die (mysql_error());
		$vectorData= $result;
		mysql_close($link);
		return $vectorData;
	}
	public function recintosPrecio(){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT precio, count(*) as cantidad FROM recinto GROUP BY precio";
		$result = mysql_query($query,$link) or die (mysql_error());
		$vectorData= $result;
		mysql_close($link);
		return $vectorData;
	}
	public function recintosPartido(){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT nombre AS n, count(*) AS cantidad FROM recinto JOIN partido ON recinto.idRecinto = partido.idRecinto WHERE partido.idEstado= 2 GROUP BY partido.idRecinto ;";
		$result = mysql_query($query,$link) or die (mysql_error());
		$vectorData= $result;
		mysql_close($link);
		return $vectorData;
	}
		public function recintosComentario(){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT nombre, count(*) AS cantidad FROM recinto NATURAL JOIN comentario GROUP BY nombre;";
		$result = mysql_query($query,$link) or die (mysql_error());
		$vectorData= $result;
		mysql_close($link);
		return $vectorData;
	}
		public function jugadoresComentario(){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT usuario.idUsuario , count(*) AS cantidad FROM usuario NATURAL JOIN comentario WHERE usuario.idPerfil = 1 GROUP BY idUsuario;";
		$result = mysql_query($query,$link) or die (mysql_error());
		$vectorData= $result;
		mysql_close($link);
		return $vectorData;
	}

	
		public function partidosHora(){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT hora, count(*) AS cantidad FROM partido group by hora ORDER BY hora;";
		$result = mysql_query($query,$link) or die (mysql_error());
		$vectorData= $result;
		mysql_close($link);
		return $vectorData;
	}
		public function partidosEstado(){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT estadopartido.nombre, partido.idEstado, count(*) as cantidad FROM partido NATURAL JOIN estadopartido group by partido.idestado;";
		$result = mysql_query($query,$link) or die (mysql_error());
		$vectorData= $result;
		mysql_close($link);
		return $vectorData;
	}
			public function jugadoresCapitan(){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT DISTINCT count(idUsuario) as total from usuario NATURAL JOIN Partido where partido.idEstado=2 group by idUsuario;";
		$result = mysql_query($query,$link) or die (mysql_error());
		$numm=0;
		while($row = mysql_fetch_array($result)){
			$numm = $row['total'];
		}
		mysql_close($link);
		return $numm;
	}
		public function jugadores(){
		$link = $this->conexionBD->obtenerConexion();
		$query = "SELECT DISTINCT count(idUsuario) as total from usuario where idPerfil=1";
		$result = mysql_query($query,$link) or die (mysql_error());
		$numm=0;
		while($row = mysql_fetch_array($result)){
			$numm = $row['total'];
		}
		mysql_close($link);
		return $numm;
	}

	

	}


?>