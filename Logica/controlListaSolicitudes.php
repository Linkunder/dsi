<?php
include_once('../Persistencia/DAOListaSolicitudes.php');

class controlListaSolicitudes{

	private static $instancia;
	private $persistenciaListaSolicitudes;

	private function __construct(){
	$this->persistenciaListaSolicitudes = new DAOListaSolicitudes();
    }

	public function obtenerInstancia(){
		if (!isset(self::$instancia)){
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia;
	}

	public function crearSolicitud($solicitud){
		$this->persistenciaListaSolicitudes->crearSolicitud($solicitud);
	}

	public function buscarSolicitud($idPartido){
		$vectorData = $this->persistenciaListaSolicitudes->buscarSolicitudes($idPartido);
		if (count($vectorData) == 0) return null;
		return $vectorData;
	}

/*
	public function leerEquipo($idEquipo){
		$vectorData = $this->persistenciaEquipo->buscarEquipo($idEquipo);
				if (count($vectorData)==0) return null;
		return $vectorData;
	}
*/
}
?>