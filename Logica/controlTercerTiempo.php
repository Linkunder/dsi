<?php
include_once('../Persistencia/DAOTercerTiempo.php');

	class controlTercerTiempo{

		private static $instancia;
		private $persistenciaTercerTiempo;
	}

	private function __construct(){
		$this->persistenciaTercerTiempo = new DAOTercerTiempo();
	}

	public function obtenerInstancia(){
		if (!isset(self::$instancia)){
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia;
	}

	public function crearTercerTiempo($tercerTiempo){
		$this->persistenciaTercerTiempo->crearTercerTiempo($tercerTiempo);
	}

	public function leerTercerosTiempos(){
		$vectorData =$this->persistenciaTercerTiempo->listarTercerosTiempos();
		if (count($vectorData)==0) return null;
		return $vectorData;
	}

	public function leerTercerTiempo($idTercerTiempo){
		$vectorData =$this->persistenciaTercerTiempo->buscarTercerTiempo($idTercerTiempo);
		if (count($vectorData)==0) return null;
		return $vectorData;
	}

?>