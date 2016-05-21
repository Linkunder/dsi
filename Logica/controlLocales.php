<?php

include_once('../Persistencia/DAOLocal.php');

class controlLocales{

	private static $instancia;
	private $persistenciaLocal;

	private function __construct(){
		$this->persistenciaLocal = new DAOlocal();
	}

	public function obtenerInstancia(){
		if (!isset(self::$instancia)){
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia;
	}

	public function crearLocal($local){
		$this->persistenciaLocal->crearLocal($local);
	}

	public function leerLocal($idLocal){
		$vectorData = $this->persistenciaLocal->leerLocal($idLocal);
		if (count($vectorData)==0) return null;
		return $vectorData;
	}

	public function actualizarLocal($local){
		$this->persistenciaLocal->actualizarLocal($local);
	}

	public function buscarLocal($idLocal){
		$vectorData = $this->persistenciaLocal->buscarLocal($idLocal);
		if (count($vectorData)==0) return null;
		return $vectorData;
	}

}


?>