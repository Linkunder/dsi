<?php

include_once('../Persistencia/DAOPartido.php');

class controlPartidos{

	private static $instancia;
	private $persistenciaPartido;

	private function __construct(){
		$this->persistenciaPartido = new DAOPartido();
	}

	public function obtenerInstancia(){
		if (!isset(self::$instancia)){
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia;
	}

	public function crearPartido($partido){
		$this->persistenciaPartido->crearPartido($partido);
	}

	public function leerPartido($idPartido){
		$vectorData = $this->persistenciaPartido->leerPartido($idPartido);
		if (count($vectorData)==0) return null;
		return $vectorData;
	}

	public function obtenerPartidos(){
		$vectorData = $this->persistenciaPartido->obtenerPartidos();
		if (count($vectorData)==0) return null;
		return $vectorData;
	}

	public function actualizarPartido($partido){
		$this->persistenciaPartido->actualizarPartido($partido);
	}

	public function buscarPartido($idPartido){
		$vectorData = $this->persistenciaPartido->buscarPartido($idPartido);
		if (count($vectorData)==0) return null;
		return $vectorData;
	}

	public function leerPartidosUsuario($idUsuario){
		$vectorData = $this->persistenciaPartido->leerPartidosUsuario($idUsuario);
				if (count($vectorData)==0) return null;
		return $vectorData;
	}

	public function actualizarInformacion($idPartido, $idUltimoTercer){
		$this->persistenciaPartido->actualizarInformacion($idPartido, $idUltimoTercer);
	}

	public function contarPartidos(){
		$vectorData = $this->persistenciaPartido->obtenerPartidos();
		return count($vectorData);
	}


	public function contarPartidosDisponibles(){
		$vectorData = $this->persistenciaPartido->obtenerPartidosDisponibles();
		return count($vectorData);
	}

	public function contarPartidosCapitan($idUsuario){
		$vectorData = $this->persistenciaPartido->obtenerPartidosCapitan($idUsuario);
		return count($vectorData);
	}
	public function obtenerPartidosCapitan2($idUsuario){
			$vectorData = $this->persistenciaPartido->obtenerPartidosCapitan2($idUsuario);
				if (count($vectorData)==0) return null;
		return $vectorData;

	}


	public function obtenerPartidosDisponibles(){
		$vectorData = $this->persistenciaPartido->obtenerPartidosDisponibles();
		if (count($vectorData)==0) return null;
		return $vectorData;
	}

		public function obtenerPartidosJS(){
		$vectorData = $this->persistenciaPartido->obtenerPartidosJS();
		return $vectorData;
	}

	public function obtenerPartidosJugadorJS($idUsuario){
		$vectorData = $this->persistenciaPartido->obtenerPartidosJugadorJS($idUsuario);
		if (count($vectorData)==0) return null;
		return $vectorData;

	} 
	public function eliminarPartido($idPartido){
		$vectorData = $this->persistenciaPartido->eliminarPartido($idPartido);
		return $vectorData;
	}


}


?>