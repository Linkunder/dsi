<?php

include_once('../Persistencia/DAOSolicitud.php');

class controlSolicitudes{

	private static $instancia;
	private $persistenciaSolicitud;

	private function __construct(){
		$this->persistenciaSolicitud = new DAOSolicitud();
	}

	public function obtenerInstancia(){
		if (!isset(self::$instancia)){
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia;
	}

	public function crearSolicitud($solicitud){
		$this->persistenciaSolicitud->crearSolicitud($solicitud);
	}

	public function leerSolicitud($idSolicitud){
		$vectorData = $this->persistenciaSolicitud->leerSolicitud($idSolicitud);
		if (count($vectorData)==0) return null;
		return $vectorData;
	}

	public function actualizarSolicitud($solicitud){
		$this->persistenciaSolicitud->actualizarSolicitud($solicitud);
	}

	public function buscarSolicitud($idSolicitud){
		$vectorData = $this->persistenciaSolicitud->buscarSolicitud($idSolicitud);
		if (count($vectorData)==0) return null;
		return $vectorData;
	}

}


?>