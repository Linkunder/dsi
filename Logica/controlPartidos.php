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

	public function actualizarPartido($partido){
		$this->persistenciaPartido->actualizarPartido($partido);
	}

	public function buscarPartido($idPartido){
		$vectorData = $this->persistenciaPartido->buscarPartido($idPartido);
		if (count($vectorData)==0) return null;
		return $vectorData;
	}

}


?>