<?php

include_once('../Persistencia/DAORecinto.php');

class controlRecintos{

	private static $instancia;
	private $persistenciaRecinto;

	private function __construct(){
		$this->persistenciaRecinto = new DAORecinto();
	}

	public function obtenerInstancia(){
		if (!isset(self::$instancia)){
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia;
	}

	public function crearRecinto($recinto){
		$this->persistenciaRecinto->crearRecinto($recinto);
	}

	public function leerRecinto($idRecinto){
		$vectorData = $this->persistenciaRecinto->leerRecinto($idRecinto);
		if (count($vectorData)==0) return null;
		return $vectorData;
	}

	public function actualizarRecinto($recinto){
		$this->persistenciaRecinto->actualizarRecinto($recinto);
	}

	public function buscaRecinto($idRecinto){
		$vectorData = $this->persistenciaRecinto->buscarRecinto($idRecinto);
		if (count($vectorData)==0) return null;
		return $vectorData;
	}

	public function obtenerRecintos(){
		$vectorData=$this->persistenciaRecinto->obtenerRecintos();
		if (count($vectorData)==0)
			return null;
		return $vectorData;
	}

}


?>