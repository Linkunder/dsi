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

	public function eliminarSolicitud($idSolicitud){
		$this->persistenciaListaSolicitudes->eliminarSolicitud($idSolicitud);
	}

	public function buscarSolicitud($idPartido){
		$vectorData = $this->persistenciaListaSolicitudes->buscarSolicitudes($idPartido);
		if (count($vectorData) == 0) return null;
		return $vectorData;
	}

	public function leerSolicitud($idSolicitud){
		$vectorData = $this->persistenciaListaSolicitudes->leerSolicitud($idSolicitud);
		if (count($vectorData) == 0) return null;
		return $vectorData;
	}

	public function verificarSolicitud($idPartido, $idUsuario){
		$vectorData = $this->persistenciaListaSolicitudes->verificarSolicitud($idPartido, $idUsuario); // vector que me traera una relacion
		if (count($vectorData) == 0) { 
			echo count($vectorData);
			echo "Se ha enviado la solicitud.";
			return 1;  // No tiene solicitud en el partido.
		} else {
			echo count($vectorData);
			echo "Ya solicitaste unirte al partido ".$idPartido;
			return 0;
		}
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