<?php

include_once('../Persistencia/DAOElementoDeportivo.php');

class controlElementosDeportivos{

	private static $instancia;
	private $persistenciaElementoDeportivo;

	private function __construct(){
		$this->persistenciaElementoDeportivo = new DAOElementoDeportivo();
	}

	public function obtenerInstancia(){
		if (!isset(self::$instancia)){
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia;
	}

	public function crearElementoDeportivo($elementoDeportivo){
		$this->persistenciaElementoDeportivo->crearElementoDeportivo($elementoDeportivo);
	}

	public function leerElementoDeportivo($idElementoDeportivo){
		$vectorData = $this->persistenciaElementoDeportivo->leerElementoDeportivo($idElementoDeportivo);
		if (count($vectorData)==0) return null;
		return $vectorData;
	}

	public function actualizarElementoDeportivo($elementoDeportivo){
		$this->persistenciaElementoDeportivo->actualizarElementoDeportivo($elementoDeportivo);
	}

	public function buscarElementoDeportivo($idElementoDeportivo){
		$vectorData = $this->persistenciaElementoDeportivo->buscarElementoDeportivo($idElementoDeportivo);
		if (count($vectorData)==0) return null;
		return $vectorData;
	}

}


?>