<?php
include_once('../Persistencia/DAOEquipo.php');

class controlEquipos{

	private static $instancia;
	private $persistenciaEquipo;

	private function __construct(){
	$this->persistenciaEquipo = new DAOEquipo();
    }

	public function obtenerInstancia(){
		if (!isset(self::$instancia)){
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia;
	}

	public function crearEquipo($equipo){
		$this->persistenciaEquipo->crearEquipo($equipo);
	}

	public function leerEquipo($idEquipo){
		$vectorData = $this->persistenciaEquipo->buscarEquipo($idEquipo);
				if (count($vectorData)==0) return null;
		return $vectorData;
	}

	public function actualizarEquipo($equipo){
		$this->persistenciaEquipo->actualizarEquipo($equipo);
	}

	public function obtenerJugadores($idPartido){
		$vectorData = $this->persistenciaEquipo->obtenerJugadores($idPartido);
		if (count($vectorData)==0) return null;
		return $vectorData;
	}

	public function contarPartidos($idUsuario){
		$vectorData = $this->persistenciaEquipo->contarPartidos($idUsuario);
		return count($vectorData);
	}

}
?>