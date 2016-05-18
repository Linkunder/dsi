<?php

include_once('../Persistencia/DAOUsuario.php');

class controlUsuarios{

	private static $instancia;
	private $persistenciaUsuario;

	private function __construct(){
		$this->persistenciaUsuario = new DAOUsuario();
	}

	public function obtenerInstancia(){
		if (!isset(self::$instancia)){
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia;
	}

	public function crearUsuario($usuario){
		$this->persistenciaUsuario->crearUsuario($usuario);
	}

	public function leerUsuario($idUsuario){
		$vectorData = $this->persistenciaUsuario->leerUsuario($idUsuario);
		if (count($vectorData)==0) return null;
		return $vectorData;
	}

	public function actualizarUsuario($usuario){
		$this->persistenciaUsuario->actualizarUsuario($usuario);
	}

	public function buscarUsuario($idUsuario){
		$vectorData = $this->persistenciaUsuario->buscarUsuario($idUsuario);
		if (count($vectorData)==0) return null;
		return $vectorData;
	}

}


?>