<?php

include_once('../Persistencia/DAOListaContactos.php');

class controlContactos{

	private static $instancia;
	private $persistenciaContactos;

	private function __construct(){
		$this->persistenciaContactos = new DAOListaContactos();
	}

	public function obtenerInstancia(){
		if (!isset(self::$instancia)){
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia;
	}



	public function leerContactos($idUsuario){
		$vectorData = $this->persistenciaContactos->leerContactos($idUsuario);
		if (count($vectorData)==0) return null;
		return $vectorData;
	}

	public function leerContactosUsuario($idUsuario){
		$vectorData = $this->persistenciaContactos->leerContactosUsuario($idUsuario);
		if (count($vectorData)==0) return null;
		return $vectorData;	
	}



}


?>